<?php
/**
 * Created by PhpStorm.
 * User: SMITDOSHI
 * Date: 11/22/17
 * Time: 9:53 PM
 */



session_start();

session_destroy();
header("location:login.php");

?>