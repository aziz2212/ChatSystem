<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 11/18/17
 * Time: 3:57 PM
 */

include "pages/DBconnect.php";

$bool1 = FALSE;
$bool2 = FALSE;
$bool3 = FALSE;
$errorFlag = TRUE;


if(isset($_POST["register"])) {
    $username = " ";
    $email = " ";
    $password = " ";

    // Username Validation

    if (empty($_POST["user_name"])) {
        $bool1 = FALSE;
        $errorFlag = FALSE;
    } else {
        $username = $_POST["user_name"];
        $bool1 = TRUE;
    }

    // Password Validation

    if ((empty($_POST["user_name"]))&&($_POST["password"]<5)) {
        $bool3 = FALSE;
        $errorFlag=FALSE;
    } else {
        $password = $_POST["password"];
        $bool3 = TRUE;
    }

    // Email Validation

    if (empty($_POST["email"])) {
        $bool2 = FALSE;
        $errorFlag=FALSE;
    } else {
        $email_valid = $_POST["email"];
        if (!filter_var($email_valid, FILTER_VALIDATE_EMAIL)) {
            $bool2 = FALSE;
            $errorFlag=FALSE;
        } else {
            $email = $_POST["email"];
            $bool2 = TRUE;
        }
    }

    if($errorFlag===TRUE){

        $username = mysqli_real_escape_string($dbconnect,$username);
        $email = mysqli_real_escape_string($dbconnect,$email);
        $password = mysqli_real_escape_string($dbconnect,$password);
        $query = mysqli_query($dbconnect,"INSERT INTO userRegister (username,email,password) VALUES 
          ('".$username."','".$email."','".$password."')");

        header("location: login.php");

    }
}
?>


<!-- First Let's create Login Form -->

<!-- Bootstrap -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/resgistration.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<html>
<head>
    <title>
        Registration Form
    </title>
</head>
<body>

<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Registration Form </h3>
                </div>
                <div class="panel-body">

                    <form role="form" class="form" method="post" action="">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" name="user_name" id="user_name" class="form-control input-sm" placeholder="User Name">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                </div>
                            </div>

                        </div>

                        <input type="submit" value="GET STARTED" class="btn btn-info btn-block" name="register">
                        </br>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        <?php if(((isset($_POST["register"]))&&($errorFlag===FALSE))){
                            echo "
                                <div class=\"alert alert-danger\">".'Error in Registering'."
                            <br>
                    ";
                        } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>


