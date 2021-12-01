<?php
$id = $_GET['postId'];



$connection = new mysqli("localhost", "root", "", "winkelusers");
$sql = "DELETE FROM threads WHERE id=$id";
$result = mysqli_query($connection, $sql);
if ($connection->query($sql) === TRUE) {
	echo "removed";
} else {
	echo "Error deleting record: " . $connection->error;
}
	$connection->close();

?>