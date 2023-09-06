<?php
include"connection.php";
if(!isset($_SESSION["user_email"])){
    header("location:login.php");
}