<?php 
session_start();
if(isset($_SESSION['txtun'])){
    unset($_SESSION['txtun']);
}
header('Location: login.php');
?>