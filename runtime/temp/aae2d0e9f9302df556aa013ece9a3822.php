<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:33:"./themes/admin/weixin/index1.html";i:1504360942;s:24:"./themes/admin/base.html";i:1504353925;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>青年有话说</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="__JS__/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="__CSS__/font-awesome.min.css">
    <!--CSS引用-->
    
    <link rel="stylesheet" href="__CSS__/admin.css">
    <!--[if lt IE 9]>
    <script src="__CSS__/html5shiv.min.js"></script>
    <script src="__CSS__/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <!--头部-->
    <div class="layui-header header">
        <a href=""><img class="logo" src="__STATIC__/images/admin_logo.png" alt=""></a>
        <ul class="layui-nav" style="position: absolute;top: 0;right: 20px;background: none;">
            <li class="layui-nav-item"><a href="<?php echo url('/'); ?>" target="_blank">前台首页</a></li>
            <li class="layui-nav-item"><a href="" data-url="<?php echo url('admin/system/clear'); ?>" id="clear-cache">清除缓存</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;"><?php echo session('admin_name'); ?></a>
                <dl class="layui-nav-child"> <!-- 二级菜单 -->
                    <dd><a href="<?php echo url('admin/change_password/index'); ?>">修改密码</a></dd>
                    <dd><a href="<?php echo url('admin/login/logout'); ?>">退出登录</a></dd>
                </dl>
            </li>
        </ul>
    </div>

    <!--侧边栏-->
    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-nav-tree">
                <li class="layui-nav-item layui-nav-title"><a>管理菜单</a></li>
                <li class="layui-nav-item">
                    <a href="<?php echo url('admin/index/index'); ?>"><i class="fa fa-home"></i> 网站信息</a>
                </li>
                <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): if( count($menu)==0 ) : echo "" ;else: foreach($menu as $key=>$vo): if(isset($vo['children'])): ?>
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="<?php echo $vo['icon']; ?>"></i> <?php echo $vo['title']; ?></a>
                    <dl class="layui-nav-child">
                        <?php if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): if( count($vo['children'])==0 ) : echo "" ;else: foreach($vo['children'] as $key=>$v): ?>
                        <dd><a href="<?php echo url($v['name']); ?>"> <?php echo $v['title']; ?></a></dd>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </dl>
                </li>
                <?php else: ?>
                <li class="layui-nav-item">
                    <a href="<?php echo url($vo['name']); ?>"><i class="<?php echo $vo['icon']; ?>"></i> <?php echo $vo['title']; ?></a>
                </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>

                <li class="layui-nav-item" style="height: 30px; text-align: center"></li>
            </ul>
        </div>
    </div>

    <!--主体-->
    
<div class="layui-body">
    <!--tab标签-->
    <div class="layui-tab layui-tab-brief">
        <ul class="layui-tab-title">
            <li ><a href="<?php echo url('admin/weixin/index'); ?>">所有用户</a></li>
            <li class="layui-this">已经办卡用户</li>
            <li ><a href="<?php echo url('admin/weixin/index2'); ?>">未办卡用户</a></li>
            <li ><a href="<?php echo url('admin/weixin/index3'); ?>">sdmu开通状态</a></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">

                <form class="layui-form layui-form-pane" action="<?php echo url('admin/weixin/index1'); ?>" method="get">
                    <div class="layui-inline">
                        <label class="layui-form-label">关键词</label>
                        <div class="layui-input-inline">
                            <input type="text" name="keyword" value="<?php echo $keyword; ?>" placeholder="请输入姓名或sdmu" class="layui-input">
                        </div>
                    </div>
                      <div class="layui-inline">
                        <label class="layui-form-label">手机号码</label>
                        <div class="layui-input-inline">
                            <input type="text" name="phone" value="<?php echo $phone; ?>" placeholder="请输入手机号码" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn">搜索</button>
                    </div>
                </form>
                <hr>

                <table class="layui-table">
                    <thead>
                    <tr>
                        <th style="width: 30px;">ID</th>
                        <th>姓名</th>
                        <th>sdmu</th>              
                        <th>状态</th>
                        <th>手机号码</th>
                        <th>手机串号</th>
                        <th>手机开通状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($weixin_list) || $weixin_list instanceof \think\Collection || $weixin_list instanceof \think\Paginator): if( count($weixin_list)==0 ) : echo "" ;else: foreach($weixin_list as $key=>$vo): ?>
                    <tr>
                        <td class="myid"><?php echo $vo['id']; ?></td>
                        <td><?php echo $vo['username']; ?></td>
                        <td><?php echo $vo['sdmu']; ?></td>                       
                        <td><?php echo $vo['status']==1 ? '启用' : '禁用'; ?></td>
                        <td><?php echo $vo['phone']; ?></td>
                        <td><?php echo $vo['phoneid']; ?></td>
                        <td ><?php if($vo['open']=='1'): ?>
                        	<div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em>ON</em><i></i></div>
                        	<?php else: ?>
                        	<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div>
                        	<?php endif; ?>
           	
						</td>
                        <td>
                            <a href="<?php echo url('admin/weixin/edit',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-normal layui-btn-mini">编辑</a>
                            <a href="<?php echo url('admin/weixin/delete',['id'=>$vo['id']]); ?>" class="layui-btn layui-btn-danger layui-btn-mini ajax-delete">删除</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <!--分页-->
                <?php echo $weixin_list->render(); ?>
            </div>
        </div>
    </div>
</div>


    <!--底部-->
    <div class="layui-footer footer">
        <div class="layui-main">
            <p>2016-2017 &copy; 青年有话说</p>
        </div>
    </div>
</div>

<script>
    // 定义全局JS变量
    var GV = {
        current_controller: "admin/<?php echo (isset($controller) && ($controller !== '')?$controller:''); ?>/",
        base_url: "__STATIC__"
    };
</script>
<!--JS引用-->
<script src="__JS__/jquery.min.js"></script>
<script src="__JS__/layui/lay/dest/layui.all.js"></script>
<script src="__JS__/admin.js"></script>

<!--页面JS脚本-->

<script>
	$('.layui-unselect').click(function(){
		// 获取用户id
		myid = $(this).parent().siblings('.myid').text();
		//是否打开
		opentype = $(this).children('em').text();

		if(opentype == 'ON'){
			open = '0';
		}else{
			open = '1';
		}

		 $.ajax({  
                type : "POST",  //提交方式  
                url : "/admin/weixin/ajax",//路径  
                data : { 'open' : open ,'id':myid },
                 success:function(result){
					if(result){
						alert('修改成功！');
						refresh();
					}else{
						alert('联系管理员');
					}
				}
            }); 


	})
	function refresh(){
	    window.location.reload();//刷新当前页面.
	     
	    //或者下方刷新方法
	    //parent.location.reload()刷新父亲对象（用于框架）--需在iframe框架内使用
	    // opener.location.reload()刷新父窗口对象（用于单开窗口
	  //top.location.reload()刷新最顶端对象（用于多开窗口）
	}

</script>	

</body>
</html>