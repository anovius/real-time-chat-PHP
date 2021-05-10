<?php
  session_start();
  if(isset($_SESSION ['sender'])){
    echo "<script>window.location.href='home.php'</script>";
  }
  ?>
<html>
<head>
   <title>ChatBox</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
</head>
<body>
   <center>
   <h2>ChatBox</h2>
   <div class="container">
      <div class="row">
         <h3>LOGIN</h3>
            <form method="post" action="action.php">
               <div class="form-group">
                  <input type="text" class ="form-control" name="uname"placeholder="Enter Username">
               </div>
               <div class="form-group">
                     <input type="password" class ="form-control" name="pass"placeholder="Enter Password">
               </div>
               <div class="form-group">
                  <input type="submit" class="btn btn-success" value="Login">
               </div>
            </form>
         <h3>SIGNUP</h3>
            <form method="post" action="signup.php">
               <div class="form-group">
                  <input type="text" class ="form-control" name="fname"placeholder="Enter First Name ">
               </div>
               <div class="form-group">
                  <input type="text" class ="form-control" name="lname"placeholder="Enter Last Name">
               </div>
               <div class="form-group">
                  <input type="text" class ="form-control" name="uname"placeholder="Enter Username">
               </div>
               <div class="form-group">
                     <input type="password" class ="form-control" name="pass"placeholder="Enter Password">
               </div>
               <div class="form-group">
                  <input type="submit" class="btn btn-success" value="Signup for Chat">
               </div>
            </form>
   </div>
   </center>
</body>
   <script src="js/jquery.js"></script>
   <script src="js/bootstrap.min.js"></script>
</html>