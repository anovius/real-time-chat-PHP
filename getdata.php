<style type="text/css">
	.right{
		color: white;
		background-color: gray;
		width:300px;
		padding : 10px;
		border-radius:10px;
		text-align: right;
		position: relative;
		right:-50px;
	}
	.left{
		color: white;
		background-color: rgb(14, 212, 97);
		width:300px;
		padding : 10px;
		border-radius:10px;
		text-align: left;position: relative;
		left:-50px;
	}
</style>
<?php
	session_start();
	include 'conec.php';
	$uname = $_SESSION['sender'];
	$reciver = $_POST['reciver'];
	$que = "select * from chat where uname='$uname' && reciver='$reciver' || uname='$reciver' && reciver='$uname' order by `id`";
	$run = mysqli_query($con,$que);
	while($row = mysqli_fetch_row($run)){
		$name = $row[1];
		$msg = $row[3];
		if ($name==$uname) {
			?>
			<p  class="right"><?php echo $msg;?></p><br>
			<?php
		}
		else{
			?>
			<p class="left"><?php echo $msg;?></p><br>
			<?php
		}
		}
?>