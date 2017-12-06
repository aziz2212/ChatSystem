<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 11/18/17
 * Time: 3:30 PM
 */

include "pages/DBconnect.php";
session_start();

$errormsg="";
// ------ Another way of Validation ------------
// username and password sent from form
//if($_SERVER["REQUEST_METHOD"]=="POST")
if(!isset($_POST["regi"])) {

    if ((!empty($_POST["logusername"])) && (!empty($_POST["logpassword"]))) {
        $loginusername = mysqli_real_escape_string($dbconnect, $_POST['logusername']);
        $loginpwd = mysqli_real_escape_string($dbconnect, $_POST['logpassword']);

        $sql_query = "SELECT id FROM userRegister WHERE username='$loginusername' AND password='$loginpwd'";
        // query to perform
        $result_query = mysqli_query($dbconnect, $sql_query);
        // Check the row count
        $row_count = mysqli_num_rows($result_query);

        // If the count ==1 and username and password matches
        if ($row_count == 1) {
            $_SESSION['login_usr'] = $loginusername; //store the login username to the session
        }
        // redirect it to homepage
        header("location:chat_Main.php");
    } // If cookies are already set then redirect it to the homepage
    elseif ((isset($_SESSION['login_usr'])) && ($_SESSION['login_usr'] == true)) {
        // redirect it to homepage
        header("location:chat_Main.php");
    }
    else {
        $errormsg = "Username or Password is empty";
    }
}
else {
    header("location:registration.php");
}


?>

<!-- Bootstrap -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css"></link>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<html>
<head>
    <title>
        LoginPage
    </title>
</head>
<body class="container">
<!--Background Image-->
<div class = "container">
    <div class="login-box">
        <h2>Login</h2>
        <form class = "form-signin" method = "POST" action="#">
            <h4 class = "form-signin-heading"></h4>
            <input type = "text" class = "form-control"
                   name = "logusername" placeholder = "username" autofocus> <!-- Check if username cookie is set-->
            <br>
            <input type = "password" class = "form-control"
                   name = "logpassword" placeholder = "password"> <!-- Check if password cookie is set-->

            <input class = "btn btn-lg btn-primary btn-block" type = "submit"
                   value="Login" name = "login" id="signIn_button"/><br>
            <input class = "btn btn-lg btn-primary btn-block" type = "submit" value="Signup"
                   name = "regi" id="signUp_button"/><br>
            <?php if((isset($_POST["login"]))&&(!empty($_POST["logusername"]))){
                echo "
                        
                        <div class=\"alert alert-danger\">".'Wrong Username or Password'."
                        <br>
                    ";
            }?>
        </form>
    </div>
</div>

</body>
</html>
