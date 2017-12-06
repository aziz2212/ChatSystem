<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 12/5/17
 * Time: 3:49 PM
 */

//    Function to getMsg()

    function get_msg(){
        require "pages/DBconnect.php";
        $sqlQuery = "SELECT `sender`, `message` FROM chatLog ORDER BY `msg_id` DESC";
        $result = mysqli_query($dbconnect, $sqlQuery);
        $messages = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $messages[] = array('sender'=>$row['sender'],
                    'message'=>$row['message']);
            }
            return $messages;
        }
    }

//  Function to send_msg
    function send_msg($senderName, $senderMsg){
        require "pages/DBconnect.php";
        if(!empty($senderName)&&!empty($senderMsg)) {

            // If the session is set
            $senderName = $_SESSION['login_usr'];
            if (!empty($_POST['messageArea'])) {
                $senderMsg = $_POST['messageArea'];
            }

            if ($senderName != '' && $senderMsg != '') {
//                print_r($senderName);
//                print_r($senderMsg);
//                die("Reached here");
                // insert query in our chatLog table
                $msgQuery = mysqli_query($dbconnect, "INSERT INTO chatLog (message,sender) VALUES 
                ('" . $senderMsg . "','" . $senderName . "')");
            }
        }
    }
?>