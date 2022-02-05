<?php
$update = false;
$book_name = "";
$book_author = "";
$book_ref_link = "";
$id = 0;
if (isset($_GET['edit_id'])) {
	$id = $_GET['edit_id'];
	$update = true;
	include 'C:\xampp\htdocs\PHP Programming\Book_Details\php\database.php';
	$sql = "SELECT * FROM book_details WHERE id='$id'";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_assoc($result);
	$book_name = $row['book_name'];
	$book_author = $row['book_author'];
	$book_ref_link = $row['book_ref_link'];
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Book Details</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
	<div class="heading">
		<h2>Book Library Details</h2>
	</div>
	<form method="post" action="../php/submit.php" class="input_form">
		<input type="hidden" value="<?php echo $id ?>" name="id">
		<div>
			<input type="text" name="book_name" class="task_input" value="<?php echo $book_name; ?>" placeholder="Enter Book Name">
		</div>
		<div>
			<input type="text" name="book_author" class="task_input" value="<?php echo $book_author; ?>" placeholder="Enter Book Author Name">
		</div>
		<div>
			<input type="text" name="book_ref_link" class="task_input" value="<?php echo $book_ref_link; ?>" placeholder="Enter Book Ref Link">
		</div>
		<?php
		if ($update == true) :
		?>
			<button formaction="../php/update.php" value="update" type="submit" name="update" id="add_btn" class="add_btn">Update</button>
		<?php else : ?>
			<button value="submit" type="submit" name="submit" id="add_btn" class="add_btn">Add Book</button>
		<?php endif; ?>
	</form>
	<table>
		<thead>
			<tr>
				<th>Book Name</th>
				<th>Book Author</th>
				<th>Book Ref Link</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
			include 'C:\xampp\htdocs\PHP Programming\Book_Details\php\database.php';
			// select all tasks if page is visited or refreshed
			$sql = "SELECT * FROM book_details";
			$result = mysqli_query($connection, $sql);
			while ($row = mysqli_fetch_array($result)) { ?>
				<tr>
					<td class="book_name"> <?php echo $row['book_name']; ?> </td>
					<td class="book_author"> <?php echo $row['book_author']; ?> </td>
					<td class="book_ref_link"> <?php echo $row['book_ref_link']; ?> </td>
					<td class="edit_delete">
						<a href="home_page.php?edit_id=<?php echo $row['id'] ?>">Edit</a>
						<a href="../php/delete.php?delete_id=<?php echo $row['id'] ?>">X</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</body>

</html>