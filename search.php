<style>
.subdata{
    border-bottom:solid 1px green;
    margin-top:5px;
}
</style>
<?php 
	include 'conec.php';
		$search = $_POST['search'];
		$que = "SELECT * FROM `users` where uname LIKE '%".$search."%'";
		$run = mysqli_query($con,$que);
		if (mysqli_num_rows($run) >0) {
			while ($row=mysqli_fetch_row($run)) {
				$uname = $row[1];
				$fname = $row[3];
				$lname = $row[4];
			?>
			<div class="subdata"><a href="text.php?reciver=<?php echo $uname ?>"><?php echo $fname," ",$lname;?></a><br> </div>
			<?php
			}
		}
		else {
			echo "Oopps...No Record Found..";
		}
?>