<?php
class Book
{
    #Begin properties

    var $id;
    var $title;
    var $price;
    var $author;
    var $year;
    #end properties

    #Construct function
    function __construct($id, $title, $price, $author, $year)
    {
        $this->id = $id;
        $this->price = $price;
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    #Member function
    function display()
    {
        echo "Price: " . $this->price . "<br>";
        echo "Title: " . $this->title . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
    #Mock data
    /**
     * Lấy toàn bộ cuốn sách trong dữ liệu
     */
    static function getList()
    {
        $listBook = array();
        array_push($listBook, new Book(1, "OOp in php", 5, "ddung", 2019));
        array_push($listBook, new Book(2, "OOp in c++", 5, "nhoang", 2013));
        array_push($listBook, new Book(3,  "OOp in c#", 5, "hhung", 2016));
        array_push($listBook, new Book(4,  "OOp in java", 5, "hhue", 2019));
        array_push($listBook, new Book(5, "OOp in kotlin", 5, "nquy", 2012));

        return $listBook;
    }
    /**
     * Lấy dữ liệu từ file
     */
    static function getListFromFile($search = null)
    {
        $arrData = file("data/book.txt");
        $listBook = array();
        // echo "<ul>";
        foreach ($arrData as $key => $value) {
            //     echo "<li>" . $value . "</li>";
            $arrItem = explode("#", $value);
            if (count($arrItem) == 5) {
                $book = new Book($arrItem[0], $arrItem[1], $arrItem[2], $arrItem[3], $arrItem[4]);
                array_push($listBook, $book);
            }
        }
        // echo "</ul>";
        return $listBook;
    }

    static function addBook($id, $title, $price, $year, $author)
    {
        $same = 0;
        $listBook = Book::getListFromFile();
        foreach ($listBook as $key => $value) {
            if ($value->id == $id)
                $same++;
        }
        if ($same == 0) {
            $file = fopen("data/book.txt", "a");

            // echo $id."#".$title."#".$price."#".$author."#".$year;
            fwrite($file, $id . "#" . $title . "#" . $price . "#" . $author . "#" . $year . "\n");
            fclose($file);
        }
    }

    static function deleteBook($id)
    {
        $write_file = "";
        $listBook = Book::getListFromFile();
        $data_file = [];
        foreach ($listBook as $key => $value) {
            if ($value->id != $id) {
                $data_file[] = $value;
            }
        }
        $file = fopen("data/book.txt", "w");
        foreach ($data_file as $key => $value) {
            $write_file .= $value->id . "#" . $value->title . "#" . $value->price . "#" . $value->author . "#" . $value->year;
        }
        fwrite($file, $write_file);
        fclose($file);
    }

    static function editBook($id, $title, $price, $author, $year)
    {
        $write_file = "";
        $listBook = Book::getListFromFile();
        $data_file = [];
        $file = fopen("data/book.txt", "w");
        foreach ($listBook as $key => $value) {
            if ($value->id != $id) {
                $write_file .= $value->id . "#" . $value->title . "#" . $value->price . "#" . $value->author . "#" . $value->year . "\n";
            } else {
                $write_file .= $id . "#" . $title . "#" . $price . "#" . $author . "#" . $year . "\n";
            }
        }
        fwrite($file, $write_file);
        fclose($file);
    }
}
