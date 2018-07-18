<?php
	include('db.php');
	if($_POST){
		$rn = $_POST['rnum'];
		$update = mysqli_query($connection, "update room set room_booked = '0'  where room_no = '$rn'");
	}
	
?>


<!DOCTYPE>
<html>
    <head>
        <title>Check-out</title>
		<link href="css/s4.css" rel="stylesheet" type="text/css"/>
	</head>

    <body>
		<div class="container">
			<div class="top">
				<h1 id="title" class="hidden">Check Out</h1>
			</div>

			<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>Name & Room No.</h2>
				</div>
			
				<div style="padding-left:20px;">
	        		<form method="post" name="out" target="">
						<p>
                		<label for="rnum"> Room Number </label>
                		<input type="text" name="rnum"/> 
			   			</p>
			   	
			   			<p>
                	 	<label for="gname"> Guest Name </label>
                	 	<input type="text" name="gname"/> 
						</p>
				
 		        	    <p>
                	 	<input type="submit" name="check" value="Check-Out"/>
					 	<a href="userpage.php">Go Back</a>			   </p>
		   			</form>
				</div>
			</div>
		</div>
    </body>
</html>