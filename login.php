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
            'email' => $email,
            'password' => $password
        );
        
        if ($connection->select($params)) {
            $_SESSION['username'] = $username;
            echo "<div class='alert alert-success' role='alert'>User Logged in successfully!</div>";
        }else{
            $fmsg = "Incorrect email or password!";
        }
        if(isset($_SESSION['username'])){
            $smsg =  "User already logged in!";
        }
        header("Location: home.php");
    }
}
?>