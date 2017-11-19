<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 11/18/17
 * Time: 3:22 PM
 */

include "session.php";
include "pages/DBconnect.php";
?>
<?php

    function get_msg(){
        $queryMsg = "SELECT `SENDER` , `MESSAGE` FROM chatLog";
        $runQry = mysqli_query($dbconnect,$queryMsg);

        $messages = array();
        while($message = mysqli_fetch_array($runQry)){
            $messages[] = array('sender'=>$message['sender'],
                'message'=>$message['message']);
        }

        return $messages;

    }

    // This function will have two parameter Sender and Message
    function send_msg($message){
        $sender = $_SESSION['login_usr'];
        if(!empty($sender) && !empty($message)){
            $sender = mysqli_real_escape_string($_SESSION['login_usr']);
            $message = mysqli_real_escape_string($message);

            // Query to insert into database
            mysqli_query($dbconnect,"INSERT INTO chatLog (sender,message) VALUES 
          ('".$sender."','".$message."')");

        }
    }
?>

<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <title>Chat Header</title>

    <!--- basic page needs
   ================================================== -->
    <meta charset="utf-8">
    <title>Lhander</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!--- Linking Bootstrap
   ================================================== -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            <a class="btn portBtn" href="#">Portfolio</a>
        </div>
    </div>
</section>

<div class="container">

    <!-- Use Bootstrap for desiging -->
    <div class="alignChatBox">

        <div class="panel panel-primary">

            <!-- Heading to our chatbox outline design -->
            <div class="panel-heading" id="accordion">

                <span class="glyphicon glyphicon-comment"></span>
                WELCOME,
                <?php
                    echo strtoupper($_SESSION['login_usr']);
                ?>
                <span class="logout"><a id="exit" href="#">EXIT CHAT</a></span>
                <!-- A collapsible button -->
                <div class="btn-group pull-right">

                    <a type="button" class="btn btn-default btn-xs" data-toggle="collapse"
                       data-parent="#accordion" href="#collapseOne">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>

                </div>

            </div>

            <!-- Chat Box -->

            <div class="panel-collapse collapse in" id="collapseOne">

                <div class="panel-body">

                    <ul class="chat">

                        <!-- User 1 Chat Dialog Design -->
                        <li class="left clearfix">

                            <!-- Self User Chat Dialog Design -->
                            <div class="row setMargin justify-content-center">

                                <!-- Header -->
                                <!-- User's Image -->
                                <span class="chat-img pull-left">
                                <img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar"
                                     class="img-circle">
                                </span>

                                <div class="header">
                                    <!-- display User's Name -->

                                    <strong class="primary-font">Dummy SelfUser</strong>

                                    <!-- Display Text Posting Time -->
                                    <small class="pull-right text-muted">
                                        <!-- Time Icon -->
                                        <span class="glyphicon glyphicon-time"></span>
                                        20mins
                                    </small>

                                </div>

                            </div>

                            <div class="row">

                                <!-- TextDisplay-->
                                <p id="displayText">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                    took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                    like Aldus PageMaker including versions of Lorem Ipsum.
                                </p>

                            </div>

                        </li>

                        <li class="right clearfix">
                            <!-- Self User Chat Dialog Design -->
                            <div class="row setMargin justify-content-center">

                                <!-- Header -->
                                <span class="chat-img pull-right">
                                <img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar"
                                     class="img-circle">
                            </span>

                                <div class="header">
                                    <!-- display User's Name -->

                                    <strong class="pull-right primary-font">Dummy SelfUser</strong>

                                    <!-- Display Text Posting Time -->
                                    <small class="pull-left text-muted">
                                        <!-- Time Icon -->
                                        <span class="glyphicon glyphicon-time"></span>
                                        12mins
                                    </small>

                                </div>

                            </div>

                            <div class="row">

                                <!-- TextDisplay-->
                                <p id="displayselfText">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                    took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                                    like Aldus PageMaker including versions of Lorem Ipsum.
                                </p>

                            </div>
                        </li>

                    </ul>

                    <!-- Text Area to Type and Send Button -->

                    <div class="panel-footer">

                        <div class="input-group">

                            <input id="btn-input" type="text" class="form-control input-sm" placeholder="type your message here.">

                            <span class="input-group-btn">

                                <button class="btn btn-warning btn-sm" id="btn-chat">Send</button>
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- Script to Unset when clicked Exit-->
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function(){
        //If user wants to end session
        $("#exit").click(function(){
            var exit = confirm("Are you sure you want to end the session?");
            if(exit==true){
                <?php
                session_unset();
                ?>
                window.location = 'index.php?logout=true';

            }
        });
    });
</script>
</body>

</html>


