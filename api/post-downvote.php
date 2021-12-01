<?php

$downvotes = $_POST['downvotes'];
$downvotes = $downvotes+ '1';
$id = $_POST['thread'];

$connection = new mysqli("localhost", "root", "", "winkelusers");
$sql = "UPDATE threads SET dislikes=$downvotes WHERE id=$id";
$result = mysqli_query($connection, $sql);
if ($connection->query($sql) === TRUE) {
	echo $downvotes;
} else {
	echo "Error updating record: " . $connection->error;
}
	$connection->close();

?>