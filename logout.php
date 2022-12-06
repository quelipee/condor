<?php
session_start(); 
if(isset($_SESSION['email'])){

    //unset($_SESSION["login"]);
    //session_unset();
    session_destroy();//destruimos a sessão;
}

header('location:condor.php');
?>