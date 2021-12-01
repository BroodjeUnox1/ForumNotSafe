<!--login -->
<?php 
    session_start();
    if (isset($_POST['submit'])) {
        $connection = new mysqli("localhost", "root", "", "winkelusers");
        $username = $_POST['username']; 
        $password = md5($_POST['password']); 
        $sql = "SELECT * from users where password = '$password' AND username = '$username'";
        $sqll = "SELECT * FROM users WHERE username = '$username' AND admin = '1'";
        $result = $connection->query($sql);
        $resultt = $connection->query($sqll);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($row == 0) {
            echo "<script type='text/javascript'>alert('Wrong password or username!');</script>";
            session_unset();
            session_destroy(); 
        } else {

            if ($count == 1) {
                $_SESSION['loged_in'] = $username;
                
                header("Location: index.php?username=$username");
            } else {
                if ($count == 1) {
                    
                }

            }
        }        
    }
?>




<!--signup -->
<?php 
 	if (isset($_POST['signup'])) {
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);
        $username = $_POST['username'];
        $email = $_POST['email'];
        if ($password==$cpassword) {
		        $connection = new mysqli("localhost", "root", "", "winkelusers");
				$sql = "INSERT INTO users (username, email, password)VALUES('$username', '$email', '$password')";
				if ($connection->query($sql) === TRUE) {
   					 echo "<script type='text/javascript'>alert('Account has been made');</script>";
					} else {
   						 echo "Error: " . $sql . "<br>" . $connection->error;
					}
 			}else{
 				echo "<script type='text/javascript'>alert('Password doesn't match.');</script>";
 			}
		}
?>



<!--thread -->
<?php  
    $connection = new mysqli("localhost", "root", "", "winkelusers");
    if (isset($_POST['thread-submit'])) {
        $title = $_POST['title'];
        $threadtext = $_POST['thread-text'];
        $sql = "INSERT INTO threads (title, thread)VALUES ('$title', '$threadtext')";
        if ($connection->query($sql) === TRUE) {
            header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }

    $connection->close();
 }
?>