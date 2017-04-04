<?php
session_start();
require_once(__DIR__ . "/classes/DBConnect.php");

if(isset($_POST['submit'])) {
    if(isset($_POST) && !empty($_POST)) {
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = md5($_POST['password']);

        $connection = new DBConnect;
        $params = array(
            'username' => $username,
            'email' => $email,
            'password' => $password
        );
        
        if ($connection->select($params)) {
            $_SESSION['username'] = $username;
            echo "<div class='alert alert-success' role='alert'>User Logged in successfully!</div>";
            print_r('bla');
        }else{
            $fmsg = "Incorrect email or password!";
            print_r('ce');
        }
        if(isset($_SESSION['username'])){
            $smsg =  "User already logged in!";
            print_r('nu');
        }
        header("Location: home.php");
    }
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
    <link href="assets/style.css" type="text/css" rel="stylesheet">
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
        <!-- navbar -->
        <nav class="navbar navbar-default" role="navigation" id="top">
          <div class="nav-container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><img src="img/logo.gif" id="logo"></img></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="http://tratamentnaturist.epizy.com" target="_blank">Demo website 1</a></li>
                <li><a href="http://mydemo2.epizy.com" target="_blank">Demo website 2</a></li>
                <li><a href="http://mydemo1.epizy.com" target="_blank">Demo website 3</a></li>
                <li><a href="http://admin-panel.epizy.com" target="_blank">Demo Admin</a></li>
                <li><a href="http://tickets-demo.epizy.com" target="_blank">Demo Tickets</a></li>
                <li><a href="http://email-demo.epizy.com" target="_blank">Demo E-mail</a></li>
                <li><a href="register.php">REGISTER</A></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.nav-container-fluid -->
        </nav><!-- end navbar -->
        <div id="id02" class="container-fluid">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" id="login" role="form" data-toggle="validator">
        <!-- confirmation/error message -->
        <?php if(isset($smsg)){ ?><div class="alert alert-success alert-dismissable container-fluid col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12" role="alert"><b><?php echo $smsg; ?></b>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div><?php } ?>
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger alert-dismissable container-fluid col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12" role="alert"><b><?php echo $fmsg; ?></b>
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        </div><?php } ?><!-- end confirmation/error message -->
            <div class="img_container col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h4>Login to your account</h4>
              <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            <div class="container-fluid col-lg-8 col-lg-offset-2 col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" id="username" class="form-control" required>
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label><b>E-mail</b></label>
                <input type="email" placeholder="Enter e-mail" name="email" id="email" class="form-control" required>
                <div class="help-block with-errors"></div>
              </div>
              <div class="form-group">
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" class="form-control" data-minlength="5" required>
                <div class="help-block">Minimum 5 characters</div>
              </div>
              <div class="form-group">
                <button type="submit" class="login_btn btn btn-success gradient pull-right" name="submit" id="submit" value="login">Login</button>
                <a type="button" class="cancel_btn btn btn-danger gradient" href="index.php">Cancel</a>
              </div>
            </div>
          </form>
        </div>
    </div><!-- end main-wrapper -->
</body>
<script src="js/default.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
</html> 