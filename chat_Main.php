<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 12/5/17
 * Time: 3:56 PM
 */

include "pages/DBconnect.php";
include "session.php";
require "chatFunction.php";

    // Check if the message button is pressed

    if(isset($_POST['messageBox'])) {

        $senderName =  '';
        $senderMsg = '';
        // If the session is set
        $senderName = $_SESSION['login_usr'];
        if (!empty($_POST['messageArea'])) {
            $senderMsg = $_POST['messageArea'];
        }

        if ($senderName != '' && $senderMsg != '') {
            // insert query in our chatLog table
            send_msg($senderName,$senderMsg);
            }
        else{
            echo 'Message Failed';
        }
    }


?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>CHAT</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--- Meta tag to referesh the page every 2 seconds-->
    <!--    ================================================== -->
    <!--    <meta http-equiv="refresh", content="2">-->

    <!--- Linking Bootstrap
   ================================================== -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <!-- CSS
   ================================================== -->
    <!-- Reference our CHAT SYSTEM CSS FIle -->
    <link rel="stylesheet" type="text/css" href="css/index.css">

</head>

<body>

<section class="intro">
    <div class="inner">
        <div class="content">
            <h1>Chat System</h1>
            <a class="btn portBtn" href="https://smitdoshi.github.io/smitdoshi-portfolio/">Portfolio</a>
        </div>
    </div>
</section>

<div class="container">

    <div class="alignChatBox">
        <div class="panel panel-primary">
            <!-- Heading to our chatbox outline design -->
            <div class="panel-heading" id="accordion">

                <span class="glyphicon glyphicon-comment"></span>
                CHAT
                <!-- A collapsible button -->
                <div class="btn-group pull-right">
                    <a href="session_destroy.php" class="glyphicon glyphicon-off logout"id="logOut"></a>
                    <a type="button" class="btn btn-default btn-xs" data-toggle="collapse"
                       data-parent="#accordion" href="#collapseOne">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>

                </div>

            </div>

            <div class="panel-collapse collapse in" id="collapseOne">
                <form class="panel-body" action="" method="post" name="chatForm" id="autoUpdateForm">
                    <div class="panel-footer">

                        <div class="input-group">

                            <input id="btn-input" type="text" class="form-control input-sm" placeholder="type your message here."
                                   name="messageArea">
                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-sm" id="btn-chat" name="messageBox">Send</button></span>
                        </div>
                    </div>
                    <ul class="chat" id="chatDisplay">

                    </ul>
                </form>
            </div>
        </div>
        
        
    </div>
</div>

<!--- jQuery library
  ================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!--- Latest compiled JavaScript
  ================================================== -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--- AutoChat Update Ajax
  ================================================== -->
<script src="js/autoChatUpdate.js" type="text/javascript"></script>

</body>

</html>


