<?php

$votes = $_POST['votes'];
$votes = $votes+ '1';
$id = $_POST['thread'];

$connection = new mysqli("localhost", "root", "", "winkelusers");
$sql = "UPDATE threads SET likes=$votes WHERE id=$id";
$result = mysqli_query($connection, $sql);
if ($connection->query($sql) === TRUE) {
	echo $votes;
} else {
	echo "Error updating record: " . $connection->error;
}
	$connection->close();

?>