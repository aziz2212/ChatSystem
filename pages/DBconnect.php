<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 11/18/17
 * Time: 3:22 PM
 */

// This file is used for Database connection
// We will need 4 variables that will store the Database Details



$dbconnect = mysqli_connect('localhost','root','','simpleChatDB')
or
die("Error" .mysqli_error($dbconnect));

?>
