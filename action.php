<?php
    session_start() ;
    include 'conec.php';
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $query = "select * from `users` where `uname` = '$uname' && `pass` = '$pass'";
    $run = mysqli_query($con,$query);
    $check = mysqli_num_rows($run) ;
    if($check>0){
        $_SESSION ['sender']= $uname ;
        echo "<script>window.location.href='home.php'</script>";
    }
    else{
        echo "<script>alert('Incorrect Username or Password');window.location.href='index.php'</script>";
    }
?>