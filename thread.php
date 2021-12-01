 <?php  
    $connection = new mysqli("localhost", "root", "", "winkelusers");
    if (isset($_POST['thread-submit'])) {
        $title = $_POST['title'];
        $threadtext = $_POST['thread-text'];
        $sql = "INSERT INTO threads (title, thread)VALUES ('$title', '$threadtext')";
        if ($connection->query($sql) === TRUE) {
            header("Location: index.php?username=$username");;
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

    $connection->close();
 }
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Forum</title>
</head>
<body>
	<div class="header" style="height: 80px; width: 100%; background-color: #232323;">
		<header>
			<div class="dropdown">
				<button class="dropdown-button">Info</button>
				<div class="dropdown-list">
					<a href="#" class="dropdown-text-color">Info</a>
					<a href="#" class="dropdown-text-color">Info</a>
					<a href="#" class="dropdown-text-color">Info</a>
					<a href="#" class="dropdown-text-color">Info</a>
				</div>
			</div>
			<div class="for">
				<i>For</i>	
			</div>
			<div class="um">
				<i>um</i>
			</div>
		</header>
			<div class="thread">
				<form method="POST" id="no-enter">
					<input type="text" name="title" placeholder="Enter Title" class="thread-margin thread-title" maxlength="70">
					<br>
					<textarea cols="120" rows="10" class="thread-margin thread-text" maxlength="4000" name="thread-text"></textarea>
					<br>
					<button type="submit" name="thread-submit" class="thread-margin thread-button">Submit thread</button>
				</form>
			</div>
			<div class="sidebar">
				<h1>test</h1>
			</div>
			<div class="page">
				<h1>page</h1>
			</div>
		<script>
			function test() {
    			window.open("./login.php", "_self");
			}

$("#no-enter").keydown(function(event){
    if((event.which== 13) && ($(event.target)[0]!=$("textarea")[0])) {
      event.preventDefault();
      return false;
    }
  });
		</script>
</body>
</html>