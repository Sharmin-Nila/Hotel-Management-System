<!DOCTYPE>
<html>
	<head>
		<title>Room Search</title>
		<link rel="stylesheet" href="css/style3.css">
	</head>
	
	<body>
		<div class="container">
			<div class="top">
				<h1 id="title" class="hidden">Search</h1>
				<br>
			</div>
		
			<?php
	    		include('db.php');
				session_start();
	
				$select = mysqli_query($connection, "SELECT * FROM room order by room_no;");
				$num_row = mysqli_num_rows($select);
		
    			if( $num_row ) {
			?>
	
			<a href="userpage.php">Home</a>
		
			<table>
				<tr>
					<th>Room No.</th>
					<th>Room Type</th>
					<th>Floor No.</th>
					<th>Room Status</th>
				</tr>
			
				<?php while($userrow = mysqli_fetch_array($select)){ ?>
			
				<tr>
					<td> <?php echo $userrow['room_no']; ?></td>
					<td> <?php echo $userrow['room_type']; ?></td>
					<td> <?php echo $userrow['floor_no']; ?></td>
					<td>  <?php if($userrow['room_booked'] == 0)
								{
									echo("Free");
								}
								else
								{
									echo("Not Available");
								}?></td>
				</tr>
		
				<?php } ?>
        
			</table>

			<?php } ?>
		</div>
	</body>
</html>