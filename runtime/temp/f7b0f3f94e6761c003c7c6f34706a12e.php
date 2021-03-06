<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:30:"./themes/home/index/index.html";i:1504353477;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>山东管理学院联通选号系统</title>
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/easyui.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/mobile.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/icon.css">
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/weui.css"/>
        <link rel="stylesheet" type="text/css" href="__STYLE__/css/example.css"/>
        <script type="text/javascript" src="__STYLE__/js/jquery.min.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.easyui.min.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.easyui.mobile.js"></script>
        <script type="text/javascript" src="__STYLE__/js/jquery.form.js"></script>
        <style>
        	.pager li{
        		    position: relative;
				    display: block;
				    margin-left: auto;
				    margin-right: auto;
				    padding-left: 14px;
				    padding-right: 14px;
				    box-sizing: border-box;
				    font-size: 18px;
				    text-align: center;
				    text-decoration: none;
				    color: #FFFFFF;
				    line-height: 2.55555556;
				    border-radius: 5px;
				    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
				    overflow: hidden;
				    color: #000000;
    				background-color: #F8F8F8;
    				border-radius: 10px;
					
					
        	}
        	.pager li a{
        			color: #000;
        	}
    	</style>
    </head>
    <body>
	<div class="page input js_show">
	    <div class="page__hd" style="text-align:center">
	        <h1 class="page__title">姓名:<?php echo $username; ?></h1>
	        <p class="page__desc">请选择您中意的手机号</p>
	    </div>
		<form action="/index/index/add" method="post">
	    <div class="page__bd">
			<!-- 号码展示 start -->
			<div class="weui-cells weui-cells_radio" >
				<?php foreach($phone_list as $k=>$vo): ?>
			    <label class="weui-cell weui-check__label" for="x<?php echo $k; ?>" >
			        <div class="weui-cell__bd"   style="text-align:center">
			            <p><?php echo $vo['phone']; ?></p>
			        </div>
			        <div class="weui-cell__ft">
			            <input type="radio" class="weui-check" name="phone" id="x<?php echo $k; ?>" value="<?php echo $vo['phone']; ?>">
			            <span class="weui-icon-checked"></span>
			        </div>
			    </label>
			   	<?php endforeach; ?>
			   	<?php echo $phone_list->render(); ?>
			   	<!-- <a href="javascript:;" class="weui-btn weui-btn_default weui-btn_loading">
			   		更换一批
			   	</a> -->
			</div>
			<!-- 号码展示 end -->
			<!-- 验证码 start-->
			<div class="weui-cell weui-cell_vcode">
			    <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
			    <div class="weui-cell__bd">
			        <input name="verify" class="weui-input" type="text" placeholder="请输入验证码">
			    </div>
			    <div class="weui-cell__ft">
			        <img class="weui-vcode-img" src="<?php echo captcha_src(); ?>" alt="点击更换" title="点击更换" onclick="this.src='<?php echo captcha_src(); ?>?time='+Math.random()">
			    </div>
			</div>
			<input type="hidden" name="username" value="<?php echo $username; ?>">
			<!-- 验证码 end-->
			<button  class="weui-btn weui-btn_primary">确认选择</button>
		</div>
		</form>
	</div>   
    </body>
</html>