<?php
    include('db.php');
		if($_POST){
        $uname = $_POST['uname'];
	
		$select = mysqli_query($connection, "SELECT * FROM guestTable where name = '$uname'");
		$select1 = mysqli_query($connection, "SELECT * FROM bookingTable where guest_name = '$uname'");

?>

	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Country</th>
			<th>Mobile</th>
			<th>Room Number</th>
			<th>Check In</th>
			<th>Check Out</th>
			<th>Number of Days</th>
			<th>Balance</th>	
		</tr>

		<?php while($userrow = mysqli_fetch_array($select)) {?>
 
		<tr>
			<td><?php echo $userrow['name']; ?></td>
			<td><?php echo $userrow['email']; ?></td>
			<td><?php echo $userrow['address']; ?></td>
			<td><?php echo $userrow['country']; ?></td>
			<td><?php echo $userrow['mobile']; ?></td>
	
			<?php } ?>

			<?php while($userrow1 = mysqli_fetch_array($select1)) {?>
 
			<td><?php echo $userrow1['room_number']; ?></td>
			<td><?php echo $userrow1['check_in']; ?></td>
			<td><?php echo $userrow1['check_out']; ?></td>
			<td><?php echo $userrow1['num_days']; ?></td>
			<td><?php echo $userrow1['balance']; ?></td>
		</tr>
	
		<?php } ?>
	
	</table>

<?php } ?>



<!doctype html>
<html>
<head>
<title>Search Customer</title>
<link rel="stylesheet" href="css/s4.css">
</head>

<body>
<div class="container">
	<div class="login-box animated fadeInUp">
		<div class="box-header">
				<h2>Search</h2>
		</div>
		<div style="padding-left:20px;">
		
<form method="post">
<p>
<label for="uname">Name:</label>
<input type="text" name="uname" />
</p>

<p>
<input type="submit" name="search" value="Go" />
<a href="userpage.php">Back</a></p>
</form>
</div>
</div>
</div>
</body>
</html>