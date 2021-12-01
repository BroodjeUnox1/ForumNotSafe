<?php  
	include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Forum-Login</title>
</head>
<body>
	<div class="header" style="height: 80px; width: 100%; background-color: #232323; ">
		<header>
			<div class="for">
				<i>For</i>	
			</div>
			<div class="um">
				<i>um</i>
			</div>
		</header>
	</div>
		<div class="login">
				<h1 class="login2">Login</h1>			
		</div>
		<div class="register">
				<h1 class="register2">Register</h1>			
		</div>
		<div class="hrdiv" style="width: 50%;">
			<hr class="hr">
		</div>

		<div class="loginreg"  style="width: 40%; height: 29%;">
			<form method="POST" class="form2">
				<input type="text" name="username" placeholder="Enter Username" required="">
				<br>
				<input type="password" name="password" placeholder="Enter Password" required="">
				<br>
				<button type="submit" name="submit" class="lgn"><i>Login</i></button>
			</form>
		</div>
		<div class="regritratie" style="width: 40%; height: 29%;">
			<form method="POST" class="form">
				<input type="text" name="username" placeholder="Enter Username" required="">
				<br>
				<input type="email" name="email" placeholder="Enter Email" required="">
				<br>
				<input type="password" name="password" placeholder="Enter Password" required="">
				<br>
				<input type="password" name="cpassword" placeholder="Comfirm Password" required="">
				<br>
				<button type="submit" name="signup" class="signup2"><i>Sign Up</i></button>
			</form>
		</div>	


		<script type="text/javascript">
			$(document).ready(() => {
				$('.regritratie').hide();

				 $(".register").click(function(){
       				 $(".loginreg").fadeOut(900);
       				 $(".regritratie").fadeIn(900);
    			});

    			 $(".login").click(function(){
       				 $(".regritratie").fadeOut(900);
       				 $(".loginreg").fadeIn(900);
    			});


			});
		</script>
</body>
</html>