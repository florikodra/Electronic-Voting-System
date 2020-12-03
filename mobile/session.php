<?php
//Start session
if(!isset($_SESSION)) 
    {
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['idvot']) || (trim($_SESSION['idvot']) == '')) {
    header("location: login.php");
    exit();
}
$session_idvot=$_SESSION['idvot'];
}?>