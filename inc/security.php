<?php
SESSION_start();
include"connection.php";
if(!isset($_SESION["Email"])){
    header("location:login.php");
}
else{
    echo"you are logged in as:" . $_SESION["Email"];
echo"<a href=logout.php>log out</a>";
}