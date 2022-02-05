<?php
$errors = "";
include 'C:\xampp\htdocs\PHP Programming\Book_Details\php\database.php';
if (isset($_POST['submit'])) {
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];
    $book_ref_link = $_POST['book_ref_link'];
    // echo "Book_Name: " . $book_name;
    // echo "Book_Author: " . $book_author;
    // echo "Book_Ref_Link: " . $book_ref_link;
    $sql = "INSERT INTO book_details (book_name, book_author, book_ref_link) VALUES ('$book_name', '$book_author', '$book_ref_link')";
    $result = mysqli_query($connection, $sql);
    //mysqli_query($connection, "INSERT INTO book_details (book_name, book_author, book_ref_link) VALUES ('$book_name, $book_author, $book_ref_link')");
    if ($result) {
        header('location: ../pages/home_page.php');
    }
}
