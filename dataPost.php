<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 11/30/17
 * Time: 2:14 AM
 */


// Below Code will Store written Data in MYSQL

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
        $msgQuery = mysqli_query($dbconnect, "INSERT INTO chatLog (message,sender) VALUES 
          ('" . $senderMsg . "','" . $senderName . "')");
    }
}

?>