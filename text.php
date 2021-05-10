<style>
	a{
		padding:10px;
		border-radius:0px;
		background-color:green;
	}
</style>
<?php
  session_start();
  if(isset($_SESSION ['sender'])){
    $uname = $_SESSION ['sender'];
  }
  else{
    echo "You are not logged in. Click <a href='index.php'>here</a> to login in.<br/> ";
    exit();
  }
?>
<?php
	include 'conec.php';
	$reciver= $_GET['reciver'];
	$_SESSION['reciver'] = $reciver;
	$que = "SELECT * FROM users where uname='$reciver'";
	$run = mysqli_query($con,$que);
	while($row=mysqli_fetch_row($run)){
		$fname=$row[3];
		$lname=$row[4];
	}
?>
<input type="text" id="reciver" style="display: none;" value="<?php echo $reciver;?>">
<head>
  <title>My Chatbook</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet"><script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
</head>
		<br>
	<a href="home.php" style="margin-left: 110px; padding:10px; background-color:green; color: white;">Back</a>
<center>
	<div class="container">
		<h2 style="text-transform: uppercase;"><?php echo $fname," ",$lname;?></h2><br><br>
			<div id="getdata"></div>
				<form method="post">
					<div class="form-group">
						<input type="text" value="" class="form-control" id="msg" placeholder="Type..." autocomplete="off"><br>
						<div class="btn btn-success" id="send">SEND <span class="glyphicon glyphicon-send"></span></div>
					</div>
				</form>
			</div>
		</div>
</center>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		var reciver = $('#reciver').val();
		setInterval(function(){
		$.ajax ({
				url : "getdata.php",
				method : "post",
				data : {reciver:reciver},
				dataType : "Text",
				success:function(data)
				{
					$('#getdata').html(data);
				}
			});
		$(document).scrollTop($(document).height());
	},500);
		$('#send').click(function(){
			var msg = $('#msg').val();
			$.ajax ({
				url : "send.php",
				method : "post",
				data : {msg:msg,reciver:reciver},
				dataType : "Text",
				success:function(data)
				{
					
				}
			});	
			document.getElementById("msg").value ="";
		});
	})
</script>