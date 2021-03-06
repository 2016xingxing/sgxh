<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:28:"./themes/admin/data/out.html";i:1504360461;s:24:"./themes/admin/base.html";i:1504353925;}*/ ?>
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
            <li ><a href="<?php echo url('admin/data/in'); ?>">导入</a></li>
            <li class="layui-this">导出</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <form class="layui-form form-container" action="<?php echo url('admin/data/download'); ?>" method="post">
                   <!--  <div class="layui-form-item">
                        <label class="layui-form-label">导出字段</label>
                        <div class="layui-input-block">

                          <input type="checkbox" name="name[id]" lay-skin="primary" title="id" checked="">
                          <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>id</span><i class="layui-icon"></i></div>

                          <input type="checkbox" name="name[username]" lay-skin="primary" title="姓名" checked="">
                          <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>姓名</span><i class="layui-icon"></i></div>


                          <input type="checkbox" name="name[sdmu]" lay-skin="primary" title="sdmu" checked="">
                          <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>sdmu</span><i class="layui-icon"></i></div>

                          
                           <input type="checkbox" name="name[sdopen]" lay-skin="primary" title="姓名" checked="">
                          <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>sdmu开通状态</span><i class="layui-icon"></i></div>

                          <input type="checkbox" name="name[phone]" lay-skin="primary" title="手机号码" checked="">
                          <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>手机号码</span><i class="layui-icon"></i></div>

                          <input type="checkbox" name="name[phoneid]" lay-skin="primary" title="手机串号" checked="">
                          <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>手机串号</span><i class="layui-icon"></i></div>
                          <input type="checkbox" name="name[open]" lay-skin="primary" title="手机开通状态" checked="">
                          <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span>手机开通状态</span><i class="layui-icon"></i></div>




                        </div>
                    </div> -->
                    <div class="layui-form-item">
                        <label class="layui-form-label">表格格式</label>
                        <div class="layui-input-block">
                            <select name="type" lay-verify="required">
						        <option value="xls">xls</option>
						        <option value="xlsx">xlsx</option> 
						    </select>
                        </div>
                    </div>	             
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                           <button class="layui-btn" type="submit" lay-filter="*">导出</button>
                        </div>
                    </div>
                </form>
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

</body>
</html>