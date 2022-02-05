<?php
// Update the edited task
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];
    $book_ref_link = $_POST['book_ref_link'];
    include 'C:\xampp\htdocs\PHP Programming\Book_Details\php\database.php';
    $sql = "UPDATE book_details SET book_name='$book_name', book_author='$book_author', book_ref_link='$book_ref_link' WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header('location: ../pages/home_page.php');
    }
}
