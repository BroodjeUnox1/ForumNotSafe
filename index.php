<?php 

include 'db.php';

// logout
if (isset($_POST['logout'])) {
	session_unset();
    session_destroy(); 
}

if (isset($_POST['make-thread'])) {
	$username = $_GET['username'];
	header("Location: thread.php?username=$username");
}



//login logout session
 if($_SESSION == true){
		echo '<div class="col-md-12">
				<div class="col-md-11">
		
				</div>
				<div class="col-md-1 row">
					<form method="POST">
						<div onclick="Thread()" onclick="test2()">
							<button class="btn btn-md" style="margin-top: -1px;" type="submit" name="make-thread">Make Thread</button>
						</div>
					</form>
					<form method="POST">	
						<div>
							<button class="btn btn-md" style="margin-top: -1px;" type="submit" name="logout">logout</button>
						</div>
					</form>
					</div>
				</div>';

    }else{
		
		echo'<div class="col-md-12">
				<div class="col-md-11"></div>
				<div class="col-md-1 lgn2" onclick="test()" style="color: black;">
					 <h1 class="">Login</h1>
			 	</div>
			 	</div>';
    }
?>

<?php
 if (isset($_GET['username'])) {
 	$username = $_GET['username'];
 	$connection = new mysqli("localhost", "root", "", "winkelusers");
 	$sql = "SELECT * FROM users WHERE username = '$username' AND admin = '1'";
 	$sqll = "SELECT id, title, thread, likes, dislikes FROM threads";
 	$result = $connection->query($sql);
 	$resultt = $connection->query($sqll);
	if($result->num_rows == 0) {
     	if ($resultt->num_rows > 0) {
    		while($row = $resultt->fetch_assoc()) {
                $postid = $row['id'];
                $likes = $row['likes'];
                $dislikes = $row['dislikes'];
                echo '<div class="col-md-12 threadself '. $row['id'] . '" style="color: white; left: 10%; top: 5%; width: 80%;">
                <div class="col-md-1" style="left: 50%;"><h3>' . $row['title'] . '</div>
                <div class="col-md-12">
                	<form method="POST"> 
                	<div class="col-md-1">
						<button class="btn btn-outline-secondary btn-sm" onclick="upvote(this, \''. $row['id'] .'\')" type="button" name="like"><i class="far fa-thumbs-up"></i></button>
						<span id="like'. $row['id'] .'">'. $row['likes'] .'</span>
                	</div>           
                	<div class="col-md-1">
						<button class="btn btn-outline-secondary btn-sm"  onclick="downvote(this, \''. $row['id'] .'\')" type="button" name="dislike"><i class="far fa-thumbs-down"></i></button>
						<span id="dislike'. $row['id'] .'">'. $row['dislikes'] .'</span>
                	</div>
                	</form>
                </div>
                <hr class="col-md-12" style="left: -1%; top: -10%;">
                <div class="col-md-12" style="left: -1%;"></h3>' . nl2br($row['thread']). '</div>
                </div> ';
            }
}
} else {
	if ($resultt->num_rows > 0) {
    		while($row = $resultt->fetch_assoc()) {
    echo '<div class="col-md-12 threadself" style="color: white; left: 10%; top: 5%; width: 80%;">
                <div class="col-md-1" style="left: 50%;"><h3>' . $row['title'] . '</div>
                <div class="col-md-12">
                	<form method="POST"> 
                	<div class="col-md-1">
						<button class="btn btn-outline-secondary btn-sm" onclick="upvote(this, \''. $row['id'] .'\')" type="button" name="like"><i class="far fa-thumbs-up"></i></button>
						<span id="like'. $row['id'] .'">'. $row['likes'] .'</span>
                	</div>           
                	<div class="col-md-1">
						<button class="btn btn-outline-secondary btn-sm"  onclick="downvote(this, \''. $row['id'] .'\')" type="button" name="dislike"><i class="far fa-thumbs-down"></i></button>
						<span id="dislike'. $row['id'] .'">'. $row['dislikes'] .'</span>
                	</div>
                	</form>
                	<div class="col-md-9"></div>
                	<form method="POST">
                		<div class="col-md-1"><button class="btn btn-outline-secondary btn-sm btn-danger" type="button" onclick="remove(\''. $row['id'] .'\')" style="margin-top: -20%;">delete</button></div>
                	</form>
                </div>
                <hr class="col-md-12" style="left: -1%; top: -10%;">
                <div class="col-md-12" style="left: -1%;"></h3>' . nl2br($row['thread']). '</div>
                </div> ';
}
}
}
}
?>


<?php
//display van de threads
	//$connection = new mysqli("localhost", "root", "", "winkelusers");
	//$sql = "SELECT id, title, thread, likes, dislikes FROM threads";
	//$result = mysqli_query($connection, $sql);
	//if ($result->num_rows > 0) {
    //while($row = $result->fetch_assoc()) {
            //    $postid = $row['id'];
           //     $likes = $row['likes'];
           //     $dislikes = $row['dislikes'];
           //     echo '<div class="col-md-12 threadself" style="color: white; left: 15%; top: 5%; width: 80%;">
            //    <div class="col-md-1" style="left: 50%;"><h3>' . $row['title'] . '</div>
            //    <div class="col-md-12">
             //   	<form method="POST"> 
             //   	<div class="col-md-1">
			//			<button class="btn btn-outline-secondary btn-sm" onclick="upvote(this, \''. $row['id'] .'\')" type="button" name="like"><i class="far fa-thumbs-up"></i></button>
			//			<span id="like'. $row['id'] .'">'. $row['likes'] .'</span>
            //    	</div>           
              //  	<div class="col-md-1">
			//			<button class="btn btn-outline-secondary btn-sm"  onclick="downvote(this, \''. $row['id'] .'\')" type="button" name="dislike"><i class="far fa-thumbs-down"></i></button>
			//			<span id="dislike'. $row['id'] .'">'. $row['dislikes'] .'</span>
            //    	</div>
           //     	</form>
           //     </div>
            //    <hr class="col-md-12" style="left: -1%; top: -10%;">
            //    <div class="col-md-12" style="left: -1%;"></h3>' . nl2br($row['thread']). '</div>
            //    </div> ';
     //       }
//} else {
 //   echo "0 results";
//}

//$connection->close();
?>


<?php 
		if (isset($_POST['like'])) {
			$postidd = $postid;
			$likess = ++$likes;
			$connection = new mysqli("localhost", "root", "", "winkelusers");
			$sql = "UPDATE threads SET likes=$likess WHERE id=$postidd";
			$result = mysqli_query($connection, $sql);
			if ($connection->query($sql) === TRUE) {
    			
			} else {
    			echo "Error updating record: " . $connection->error;
			}
				$connection->close();
		}
?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Forum</title>
</head>
<body>
	<!-- <div class="col-md-12 bg">
			
		</div> -->
	<div class="header" style="height: 80px; width: 100%; background-color: #232323;">
		<header>
			<div class="dropdown">
				<button class="btn btn-outline-secondary" style="background-color: #ccc">Info</button>
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
	</div>
		
			
		<script>
			function test() {
    			window.open("./login.php", "_self");
			}

			function test2() {
    			window.open("./thread.php", "_self");
			}

			function upvote(value, id){
				// $(value).parent().css('border', '1px solid red')
				console.log( $(value).parent().find('[id^=like]').text() )
				var currentVotes = $(value).parent().find('[id^=like]').text();
				var thread = "";

				$.post('./api/post-vote.php', {thread: id, votes: currentVotes}, function(response) {
					console.log(response)
					console.log("Changing id: "+ "like"+id)
					$("#like"+id).text(response);
				});
			}

			function downvote(value, id){
				// $(value).parent().css('border', '1px solid red')
				console.log( $(value).parent().find('[id^=dislike]').text() )
				var currentdownVotes = $(value).parent().find('[id^=dislike]').text();
				var thread = "";

				$.post('./api/post-downvote.php', {thread: id, downvotes: currentdownVotes}, function(response) {
					console.log(response)
					console.log("Changing id: "+ "dislike"+id)
					$("#dislike"+id).text(response);
				});
			}

			function remove(id){
				$.post('./api/delete-post.php?postId='+id, {postId: id}, function(response) {
					if(response == "removed"){
						location.reload();
					}
				});
			}

		</script>

</body>
</html>
