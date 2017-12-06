<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 11/18/17
 * Time: 5:51 PM
 */

// This is a session file
include('DBconnect.php');

session_start();

$user_check = $_SESSION['login_usr'];
// query to get the username
$ses_sql = mysqli_query($dbconnect,"select username from userRegister WHERE username = '$user_check'");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

// If the session is not SET
if(!isset($_SESSION['login_usr'])){
    header("location: login.php");
}


?>