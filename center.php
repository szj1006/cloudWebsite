<?php
require 'Lib/mysql.class.php';
require 'config.php';
if(!$M->iCookie()){
	header('Location:login.php');
	exit();
}
$siteinfo = $M->getAll("select sitename,sitetype from user where username = '".$M->deStr($_COOKIE['username'])."'");
$sitename = $siteinfo['0']['sitename'];
$sitetype = $siteinfo['0']['sitetype'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>棒棒鸡 - 云網站</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="//v3.bootcss.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="//v3.bootcss.com/assets/js/ie-emulation-modes-warning.js"></script>
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">棒棒鸡 - 云網站</h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><a href="index.php">Home</a></li>
                  <li class="active"><a href="center.php">Center</a></li>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="reg.php">Signup</a></li>
                  <li><a href="about.php">About</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="inner cover">
            <h1 class="cover-heading">親爱的<?=$_COOKIE['username'];?>，欢迎登录！【<a href="logout.php">退出登录</a>】</h1>
            <form class="form-horizontal" method="post">
            <div class="lead"><div class="form-group"><label for="sitename" class="col-sm-3 control-label">网站名称：</label>
            <div class="col-sm-9"><input type="text" class="form-control" id="sitename" name="sitename" value="<?=$sitename;?>"></div></div></div>
            <div class="lead"><div class="form-group"><label for="sitetype" class="col-sm-3 control-label">网站类型：</label>
            <div class="col-sm-9"><select class="form-control" id="sitetype" name="sitetype"><?php switch($sitetype){case 1: echo '<option value="1" selected>熱點新聞</option><option value="2">天氣預報</option><option value="3">成人網站</option>'; break; case 2: echo '<option value="1">熱點新聞</option><option value="2" selected>天氣預報</option><option value="3">成人網站</option>'; break; case 3: echo '<option value="1">熱點新聞</option><option value="2">天氣預報</option><option value="3" selected>成人網站</option>'; break;}?></select></div></div></div>
            <div class="lead"><div class="form-group"><label for="domain" class="col-sm-3 control-label">绑定域名：</label>
            <div class="col-sm-9"><input type="text" class="form-control" id="domain" name="domain"></div></div></div>
            <div class="lead"><div class="form-group"><label for="top_ad" class="col-sm-3 control-label">顶部广告：</label>
            <div class="col-sm-9"><input type="text" class="form-control" id="top_ad" name="top_ad"></div></div></div>
            <div class="lead"><div class="form-group"><label for="footer_ad" class="col-sm-3 control-label">底部广告：</label>
            <div class="col-sm-9"><input type="text" class="form-control" id="footer_ad" name="footer_ad"></div></div></div>
            <p class="lead">
              <input type="submit" class="btn btn-lg btn-default" value="保存設置"></input>
            </p>
            </form>
          </div>
          <div class="mastfoot">
            <div class="inner">
              <p>Copyright &copy; 2016 SangSir.Com</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>