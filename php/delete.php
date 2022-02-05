<?php
// Delete Book Details related to Particular Id
include 'C:\xampp\htdocs\PHP Programming\Book_Details\php\database.php';
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM book_details WHERE id=$id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header('location: ../pages/home_page.php');
    }
}
