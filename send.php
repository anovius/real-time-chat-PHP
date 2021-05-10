<?php
	include 'conec.php';
	session_start();
	$uname = $_SESSION['sender'];
	$reciver = $_POST['reciver'];
	$msg = $_POST['msg'];
	$que = "INSERT INTO `chat` (`uname`,`reciver`,`msg`) VALUES ('$uname','$reciver','$msg')";
	$run = mysqli_query($con,$que);
?>