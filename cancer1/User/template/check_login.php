<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {

    $uname = $_SESSION['username'];
    $UID = $_SESSION['id'];

}else{

header("location:../index.php");

}

?>