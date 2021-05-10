<?php
	session_start();
	include 'conec.php';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$que = "INSERT INTO `users` (`uname`,`pass`,`fname`,`lname`) VALUES ('$uname','$pass','$fname','$lname')";
	$que2 = "SELECT * FROM users where uname='$uname'";
	$check = mysqli_query($con,$que2);
	if (mysqli_fetch_array($check) !=0) {
				echo "<script>alert('Username Alredy Exist');window.location.href='index.php'</script>";
	}
	else{
		$run = mysqli_query($con,$que);
		$_SESSION ['sender']= $uname ;
        echo "<script>window.location.href='home.php'</script>";
}
?>