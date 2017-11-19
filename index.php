<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 11/18/17
 * Time: 3:22 PM
 */

include "pages/DBconnect.php";
include "session.php";

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


    <!-- Javascript with xml http request
    ================================================== -->
    <script>
        function submitChat(){
            //message variable
            senderMsg = $('input#btn-input').val();
            //alert(senderMsg);

            // Checking Send Input Box is not empty
            if($.trim(senderMsg)!=''){

            }
        }

    </script>

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

    <!-- Use Bootstrap for desiging -->
    <div class="alignChatBox">

        <div class="panel panel-primary">

            <!-- Heading to our chatbox outline design -->
            <div class="panel-heading" id="accordion">

                <span class="glyphicon glyphicon-comment"></span>
                CHAT
                <!-- A collapsible button -->
                <div class="btn-group pull-right">
                    <a class="glyphicon glyphicon-off logout"id="logOut"></a>
                    <a type="button" class="btn btn-default btn-xs" data-toggle="collapse"
                       data-parent="#accordion" href="#collapseOne">
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>

                </div>

            </div>

            <!-- Chat Box -->

            <div class="panel-collapse collapse in" id="collapseOne">

                <form class="panel-body" action="" method="post" name="chatForm">

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

                        <?php
                        $sqlQuery = "SELECT * FROM chatLog LIMIT 10";
                        $result = mysqli_query($dbconnect,$sqlQuery);

                        if(mysqli_num_rows($result)>0){
                            while ($row = mysqli_fetch_assoc($result)){
                                echo '
                                        <!-- User 1 Chat Dialog Design -->
                                           <li class="left clearfix">
                                               <!-- Self User Chat Dialog Design -->
                                                   <div class="row setMargin justify-content-center">
                                                       <div class="header">
                                                        <!-- display User\'s Name -->
                                                            <strong class="primary-font">'.strtoupper($row['sender']). ' :</strong>
                                                        </div>
                                     ';
                                echo '
                                                        <div class="row">
                                                            <!-- TextDisplay-->
                                                            <p id="displayText">'.$row['message'].'</p>
                                                    </div>
                                            </li>
                                     ';
                            }
                        }
                        ?>

                            </div>
                        </li>
                    </ul>

                    <!-- Text Area to Type and Send Button -->

                    <div class="panel-footer">

                        <div class="input-group">

                            <input id="btn-input" type="text" class="form-control input-sm" placeholder="type your message here."
                            name="messageArea">

                            <span class="input-group-btn">

                                <button class="btn btn-warning btn-sm" id="btn-chat" name="messageBox"
                                onclick="submitChat()">Send</button>
                            </span>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>
<!-- Javascript to unset the session
    ================================================== -->
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function(){
        //If user wants to end session
        $("#logOut").click(function(){
            var exit = confirm("Are you sure you want to LOG OUT?");
            if(exit==true){
                window.location = 'index.php?logout=true';
                <?php session_unset();?>
            }
        });
    });
</script>

</body>

</html>

<!--Below Code will Store written Data in MYSQL-->
<?php
    $senderName =  '';
    $senderMsg = '';
    // If the session is set
    $senderName = $_SESSION['login_usr'];
     if(isset($_POST['messageBox'])){
         if(!empty($_POST['messageArea'])){
            $senderMsg = $_POST['messageArea'];
         }
     }
    if($senderName!=''&&$senderMsg!=''){
        // insert query in our chatLog table
        $msgQuery = mysqli_query($dbconnect,"INSERT INTO chatLog (message,sender) VALUES 
          ('".$senderMsg."','".$senderName."')");
    }


?>

