<?php include_once("header.php") ?>
<?php include_once("nav.php") ?>

<?php
#Code bài số 4
include_once("model/book.php");
$book = new Book(1,50, "OOP in PHP", "ndungithue", 2019);
$book->display();
// $book::Book();
// $ls = $book::getListFromFile();
?>

<?php include_once("footer.php") ?>