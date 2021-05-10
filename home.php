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
<html>
<head>
  <title>My Chatbook</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="functions.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
</head>
<body>
	<center>
		<br>
		<div class="container">
		<h1 style="text-transform: uppercase;">Welcome <?php echo $uname?></h1>
            <form method="post" align="center">
               <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">Search</span>
                  <input type="text" class ="form-control" id="search"placeholder="Enter Username Here">
               </div>
               </div>
            </form>
            <div align="left" id="result" class="results"></div>
            <div class="data">
            <h3>Recent Chats</h3>
            <?php
              include 'conec.php';
              $recentchats = "SELECT distinct `reciver` from `chat` WHERE `uname` = '$uname' ";
              $run = mysqli_query($con,$recentchats);
              while($row = mysqli_fetch_array($run)){
                $receiver = $row[0];
            ?>
              <a class= "recentdata" href="text.php?reciver=<?php echo $receiver ?>"><?php echo $receiver?></a><br><br>
              <?php }?>
            </div>
            </div>
            <a href="logout.php" class="logout">Logout</a>
	</center>
</body>
<script type="text/javascript">
  $(document).ready(function () {
    $('#search').keyup(function(){
      var text = $('#search').val();
      if(text == ''){
        $('#result').html('');
      }
      else{
        $.ajax({
          url : "search.php",
          method : "post",
          data : {search : text},
          dataType : "text",
          success:function(data)
          {
            $('#result').html(data);  
          }
        });
      }
    });
  })
</script>
</script>
</html>