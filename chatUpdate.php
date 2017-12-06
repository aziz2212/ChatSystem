<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 12/6/17
 * Time: 2:02 AM
 */

require "chatFunction.php";

    $messages = get_msg();
    foreach ($messages as $message){
        echo '
            <!-- User 1 Chat Dialog Design -->
            <li class="left clearfix">
            <!-- Self User Chat Dialog Design -->
            <div class="row setMargin justify-content-center">
            <div class="header">
            <!-- display User\'s Name -->
            <strong class="primary-font">' . strtoupper($message['sender']) . ' :</strong>
            </div>
        ';
        echo '
            <div class="row">
            <!-- TextDisplay-->
            <p id="displayText">' . $message['message'] . '</p>
            </div>
            </li>
        ';
    }
?>