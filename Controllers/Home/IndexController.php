<?php
namespace Controllers\Home;

use Libs\Controller;
use Models\VoteRecord;
use Models\Work;

class IndexController extends Controller {

    public function index() {
        $workModel = new Work();
        $works = $workModel->get('', 'vote_count desc, id asc');
        return $this->response('home/index/index', ['works' => $works]);
    }


    public function vote() {

        $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
        if ($id <= 0) {
            return $this->responseJson(400, '作品参数错误');
        }
        $workModel = new Work();
        $work = $workModel->first('id = ' . $id);
        if (empty($work)) {
            return $this->responseJson(400, '作品不存在或者已删除');
        }
        $current_ip = $this->getIp();
        if (empty($current_ip)) {
            return $this->responseJson(400, '网络繁忙稍后重试');
        }

        $voteRecordModel = new VoteRecord();
        $where = 'ip = "' . $current_ip . '" and work_id = ' . $id . ' and create_date = "' . date('Y-m-d')  .'"';
        $voteRecord = $voteRecordModel->first($where);

        if ($voteRecord) {
            return $this->responseJson(400, '今天您已为该作品投票，请明天再来');
        }
        $workModel->beginTransaction();
        $voteCount = $work['vote_count'] + 1;
        $data = [
            'vote_count' => $voteCount
        ];
        $result = $workModel->update($data, 'id = ' . $id);
        if (!$result) {
            $workModel->rollback();
            return $this->responseJson(400, '投票失败+1');
        }

        $data = [
            'work_id' => $id,
            'ip' => $current_ip,
            'create_date' => date('Y-m-d')
        ];
        $result = $voteRecordModel->create($data);
        if (empty($result)) {
            $workModel->rollback();
            return $this->responseJson(400, '投票失败+2');
        }
        $workModel->commit();
        return $this->responseJson(200, '投票成功', ['vote_count' => $voteCount]);
    }

    private function getIp() {
        if (getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } else if (getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } else if (getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
            $ip = getenv('REMOTE_ADDR');
        } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $res =  preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
        return $res;
    }
}