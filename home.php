<?php session_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['username'])) {
	$emsg = "You do not have an account! Please login or register in order to access this area!";
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Demo website</title>
    <link rel="shortcut icon" href="favicon.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <!-- Styles -->
    <link href="assets/admin_style.css" type="text/css" rel="stylesheet">
    <link href="assets/buttons.css" type="text/css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- Font awesome -->
    <link href="assets/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="register-container main-wrapper">
        <!-- Top navbar -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="nav-container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li><a href="#">Menu 1</a></li>
                <li><a href="#">Menu 2</a></li>
                <li><a href="#">Menu 3</a></li>
                <li><a href="#">Menu 4</a></li>
                <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="logout.php" id="logout" name="logout">LOG OUT</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Profile<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-menu-right" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </li>
                <?php }
                else { ?>
                <li><a href="login.php" id="login" name="login">LOGIN</a></li><?php } ?>
                
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.nav-container-fluid -->
        </nav><!-- end navbar -->
    <div id="wrapper" class="active">
      <!-- Sidebar -->
      <div id="sidebar-wrapper">
        <ul id="sidebar_menu" class="sidebar-nav active">
            <li class="sidebar-brand">
              <a href="index.php" id="logo"><img id="logo" src="img/logo_white.png">
              </a>
            </li>
            <li class="sidebar-brand">
              <a id="menu-toggle">Menu
                <span id="main_icon" class="glyphicon glyphicon-chevron-left"></span>
              </a>
            </li>
        </ul>
        <ul class="sidebar-nav" id="sidebar" role="navigation">     
          <li><a class="active" href="#">Link1<span class="sub_icon glyphicon glyphicon-file"></span></a></li>
          <li><a href="#">link2<span class="sub_icon glyphicon glyphicon-signal"></span></a></li>
          <li><a href="#">Link3<span class="sub_icon glyphicon glyphicon-file"></span></a></li>
          <li><a href="#">link4<span class="sub_icon glyphicon glyphicon-signal"></span></a></li>
          <li><a href="#">Link5<span class="sub_icon glyphicon glyphicon-file"></span></a></li>
          <li><a href="#">link6<span class="sub_icon glyphicon glyphicon-signal"></span></a></li>
        </ul>
      </div>
      <!-- Page content -->
      <div class="page-content-wrapper col-md-12">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
            <div class="row">
                <div class="col-md-12">
                     <?php if (isset($_SESSION['username'])) { ?>
                    <div><h1>Hello <?php echo $_SESSION['username'];?></h1></div><?php } ?>
                    <!-- error message -->
                    <?php if(isset($emsg)){ ?><div class="alert alert-danger alert-dismissable container-fluid col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12" role="alert" style="margin-top: 50px;"><b><?php echo $emsg; ?></b>
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    </div><?php } ?><!-- end /error message -->
                </div>
            </div>
        </div>
      </div>
</div>
</body>
<script src="js/default.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
</html>