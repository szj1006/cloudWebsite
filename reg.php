<?php
require 'Lib/mysql.class.php';
require 'config.php';
if($_POST){
	if($M->register($_POST['username'],md5($_POST['password']),$_POST['sitetype'],$_POST['sitename'],$_POST['email'])){
		setcookie('username',$_POST['username']);
		setcookie('password',md5($_POST['password']));
		header('Location:center.php');
		exit();
	}
}else if($M->iCookie()){
	header('Location:center.php');
	exit();
}
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
                  <li><a href="center.php">Center</a></li>
                  <li><a href="login.php">Login</a></li>
                  <li class="active"><a href="reg.php">Signup</a></li>
                  <li><a href="about.php">About</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="inner cover">
            <h1 class="cover-heading">註冊自己的云網站</h1>
            <form class="form-horizontal" method="post">
            <div class="lead"><div class="form-group"><label for="username" class="col-sm-3 control-label">用戶名称：</label>
            <div class="col-sm-9"><input type="text" class="form-control" id="username" name="username"></div></div></div>
            <div class="lead"><div class="form-group"><label for="email" class="col-sm-3 control-label">邮　　箱：</label>
            <div class="col-sm-9"><input type="email" class="form-control" id="email" name="email"></div></div></div>
            <div class="lead"><div class="form-group"><label for="password" class="col-sm-3 control-label">密　　碼：</label>
            <div class="col-sm-9"><input type="password" class="form-control" id="password" name="password"></div></div></div>
            <div class="lead"><div class="form-group"><label for="sitename" class="col-sm-3 control-label">網站名称：</label>
            <div class="col-sm-9"><input type="text" class="form-control" id="sitename" name="sitename"></div></div></div>
            <div class="lead"><div class="form-group"><label for="sitetype" class="col-sm-3 control-label">網站类型：</label>
            <div class="col-sm-9"><select class="form-control" id="sitetype" name="sitetype"><option value="1">熱點新聞</option><option value="2">天氣預報</option><option value="3">成人網站</option></select></div></div></div>
            <p class="lead">
              <input type="submit" class="btn btn-lg btn-default" value="立即註冊"></input>
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