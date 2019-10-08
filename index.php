<?php
session_start();
// if(User($_SESSION['txtun'],$_SESSION['txtun']))
include_once("header.php");
include_once("nav.php"); ?>
<?php
//Mã php của trang chủ
echo "Xin chào!" . $_SESSION['txtun'];
?>

<?php include_once("footer.php") ?>