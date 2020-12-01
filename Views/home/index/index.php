<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>在线投票</title>
		<style type="text/css">
			*{
				margin: 0;
				padding: 0;
				color: #555555;
				font-size: 1rem;
			}
			img {
				border: none;
			}
			.box{
				max-width: 640px;
				margin: 0 auto;
				
			}
			.image-list{
				display: -webkit-flex;
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
				/* flex-direction: column; */
			}
			
			.image-item {
				width: 45%;
				/* flex: 1; */
				
				margin: 0 2%;
				margin-top: 1.25rem;
				
				border-bottom: 1px solid #DDDDDD;
				padding-bottom: 1.25rem;
				background-color: #F9F9F9;
			}
			.image-item .image {
				position: relative;
			}
			.image-item .image .count {
				position: absolute;
				top: 0px;
				left: 0px;
				padding: 0.3125rem;
				background-color: chartreuse;
				color: #ffffff;
				font-weight: bold;
			}
			.image-item .image img {
				width: 99%;
				border: 0.0625rem solid #ddd;
                min-height: 120px;
                max-height: 200px;
			}
			
			.title {
				text-align: center;
			}
			
			.vote {
				display: flex;
				justify-content: space-between;
				margin-top: 0.625rem;
			}
			
			.vote-count {
				padding-left: 0.625rem;
				color: #9400D3;
				font-weight: bold;
			}
			.vote-btn a{
				padding: 0.1875rem 0.625rem;
				background-color: darkviolet;
				color: #FFFFFF;
				border-radius: 0.625rem;
				margin-right: 0.625rem;
                text-decoration: none;
			}

            .info{
                position: fixed;
                top: 50%;
                left: 25%;
                width: 50%;
                background-color: #000000;
                color: #ffffff;
                text-align: center;
                padding: 0.625rem;
                opacity: 0.8;
                display: none;
                border-radius: 1.25rem;
            }
		</style>
	</head>
	<body>
		<div class="box">
			<div class="image-list">
                <?php foreach ($works as $val):?>
				<div class="image-item">
					<div class="image">
						<img src="/uploads/<?php echo $val['id']?>.png" >
						<div class="count">
							<?php echo $val['id'];?>号
						</div>
					</div>
					<div class="title">
						<?php echo $val['title'];?>
					</div>
					<div class="vote">
						<div class="vote-count" id="vote-count-<?php echo $val['id'];?>">
							<?php echo $val['vote_count'];?>
						</div>
						<div class="vote-btn">
							<a href="javascript:vote(<?php echo $val['id'];?>)">投票</a>
						</div>
					</div>
				</div>
                <?php endforeach;?>
			</div>
		</div>
        <div class="info">
            fdafdafdaf
        </div>
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script>
            function vote(id) {
                jQuery.post('/index.php?c=index&a=vote', {id: id}, function(data) {
                    if (data.status == 200) {
                        jQuery('#vote-count-' + id).html(data.data.vote_count);
                    }
                    showInfo(data.message);
                }, 'json');
            }

            function showInfo(message) {
                jQuery('.info').show();
                jQuery('.info').html(message);
                setTimeout(function () {
                    jQuery('.info').hide();
                }, 3000)
            }
        </script>
	</body>
</html>
