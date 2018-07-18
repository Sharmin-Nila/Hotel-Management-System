<?php
    include('db.php');
	session_start();
		
	$errors = array();
	$result = "";
	$result = $_SESSION['result'];
		
	if($_POST){
		if(($_POST['repass']) != ($_POST['newpass']))
        {
	 	    $errors['rpass2'] = "Password must be correct";
    	}

		if(count($errors) == 0)
		{
			$npass = $_POST['newpass'];
			$nm = $_POST['name'];
			$ag = $_POST['age'];
			$mb = $_POST['mob'];
			$ad = $_POST['add'];
			$em = $_POST['eml'];
			$gn = $_POST['gen'];
			$ut = $_POST['typ'];
			$un = $result['username'];
				
			if(empty($_POST['newpass']))
        	{
				$sql = "update Register set name = '$nm', age = '$ag', mobile = '$mb', address = '$ad', email = '$em', gender = '$gn', 
				usertype = '$ut' where username ='$un';";
				$update = mysqli_query($connection, $sql);
					
				if($update){
					$result['name'] = $nm;
					$result['age'] = $ag;
					$result['mobile'] = $mb;
					$result['address'] = $ad;
					$result['email'] = $em;
					$result['gender'] = $gn;
					$result['usertype'] = $ut;
					
					$_SESSION['result']= $result;
				}
				
			}
				
			else{
				$sql = "update Register set password = '$npass', name = '$nm', age = '$ag', mobile = '$mb', address = '$ad', email = '$em', 
				gender = '$gn', usertype = '$ut' where username ='$un';";
				$update = mysqli_query($connection, $sql);
				
				if($update){
					$result['password'] = $npass;
					$result['name'] = $nm;
					$result['age'] = $age;
					$result['mobile'] = $mb;
					$result['address'] = $ad;
					$result['email'] = $em;
					$result['gender'] = $gn;
					$result['usertype'] = $ut;
						
					$_SESSION['result']= $result;
				}
			}	
		}
	}
?>

<!DOCTYPE>
<html>
    <head>
        <title>Profile page</title>
		<link href="css/style1.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
		<center>
			<a href = "userpage.php">Home</a> &nbsp
			<a href="#">Profile</a> &nbsp
			
			<?php
				if($result['usertype']=="admin")
				{
					echo("<a href = 'registration.php'>Receptionist Register</a> &nbsp");
					echo("<a href = 'list.php'>User List</a> &nbsp");
					echo("<a href = 'room.php'>New Room Register</a> &nbsp");	
				}
			
				if($result['usertype']=="receptionist")
				{
					echo("<a href ='check-in.php'>Check In</a> &nbsp");
					echo("<a href ='check-out.php'>Check out</a> &nbsp");
				}	
			?>
			
			<div class="dropdown">
				<span><a href="#">Search</a></span>
            	<div class="dropdown-content">
					<br>
               		<a href="customer_search.php">Customer</a>
					<a href="room_search.php">Room</a>
            	</div>
			</div>
			
			<a href = "logout.php">Logout</a>
		</center>
		
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Profile</h2>
			</div>
			
			<div style="padding-left:20px;">
				<form method="post" name="proform">
		 			
					<p>
         			<label for="name">Name: </label>
		 			<?php $uname = '';
		 				$uname = $result['name'];
		 			?>
					<?php echo '<input type="text" name="name" value="' .  $uname . '">';?>
         			</p>
					
					<p>
         			<label for="uname"> User Name: </label>
		 			<?php $un = '';
		 				$un = $result['username'];
		 			?>
					<?php echo '<input type="text" name="uname" value="' .  $un . '" disabled>';?>
         			</p>
			        
					<p>
         			<label  for="newpass"> New Password: </label>
         			<input type="password" name="newpass"/>
         			</p>

					<p>
         			<label  for="repass"> Retype: </label>
         			<input type="password" name="repass"/>
         			</p>
			        
					<p><?php if(isset($errors['rpass1'])) echo $errors['rpass1']; ?></p>
				   
					<p>
         			<label for="age"> Age: </label>
		 			<?php $ag = '';
		 				$ag = $result['age'];
		 			?>
		 			<?php echo '<input type="text" name="age" value="' .  $ag . '">';?>
         			</p>
		 
		 			<p>
         			<label for="mob"> Mobile: </label>
		 			<?php $mb = '';
		 				$mb = $result['mobile'];
		 			?>
		 			<?php echo '<input type="text" name="mob" value="' .  $mb . '">';?>
         			</p>
					
					<p>
         			<label for="add"> Address: </label>
		 			<?php $ad = '';
		 				$ad = $result['address'];
		 			?> 
		 			<?php echo '<input type="text" name="add" value="' .  $ad . '">';?>
         			</p>
		 
		 			<p>
         			<label for="eml"> Email: </label>
		 			<?php $em = '';
		 				$em = $result['email'];
		 			?> 
		 			<?php echo '<input type="email" name="eml" value="' .  $em . '">';?>
         			</p>
		 
		 			<p>
         			<label for="gen"> Gender: </label>
		 			<?php $gn = '';
		 				$gn = $result['gender'];
		 			?> 
		 			<?php echo '<input type="text" name="gen" value="' .  $gn . '">';?>
         			</p>
			
		 			<p>
         			<label for="typ"> User Type: </label>
		 			<?php $ut = '';
		 				$ut = $result['usertype'];
		 			?> 
		 			<?php echo '<input type="text" name="typ" value="' . $ut . '" disabled>';?>
         			</p>
		 	
		 			<p>
         			<input type="submit" name="save" value="Save"/>
 	     			</p>
				</form>
			</div>
		</div>
	</body>
</html>
