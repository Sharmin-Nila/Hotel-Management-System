<?php
	include('db.php');
	if($_POST)
	{			
		$name = mysqli_real_escape_string($connection, $_POST['FullName']);
		$uname = mysqli_real_escape_string($connection, $_POST['UserName']);
		$password = mysqli_real_escape_string($connection, $_POST['Password']);
		$age = mysqli_real_escape_string($connection, $_POST['Age']);
		$mobile = mysqli_real_escape_string($connection, $_POST['Mobile']);
		$address = mysqli_real_escape_string($connection, $_POST['Address']);
		$email = mysqli_real_escape_string($connection, $_POST['Email']);
		$gen = mysqli_real_escape_string($connection, $_POST['gender']);
		$update = mysqli_query($connection, "INSERT INTO Register(name, username, password, age, mobile, address, email, gender, usertype) values
										  ('$name', '$uname', '$password', '$age', '$mobile', '$address', '$email', '$gen', 'receptionist')");
		  
	}
?>

<!Doctype html>
<html>
	<head>
		<title>Registration form</title>
		<link rel="stylesheet" href="css/style1.css">

		<script>
		function ValidateContactForm()
		{
		    var fname = ContactForm.FullName;
			var uname = ContactForm.UserName;
			var pass = ContactForm.Password;
			var cpass = ContactForm.ConPass;
			var age = ContactForm.Age;
			var address = ContactForm.Address;
			var mob = ContactForm.Mobile;
    		var email = ContactForm.Email;	
	    
			if (fname.value == "")
			{
        		window.alert("Please enter your full name.");
        		fname.focus();
        		return false;
    		}
    
			if (uname.value == "")
    		{
        		window.alert("Please enter your user name.");
        		uname.focus();
        		return false;
    		}
	
			if (pass.value == "")
			{
    	    	window.alert("Please enter your password.");
    	    	pass.focus();
   		     	return false;
   		 	}
	
			if (cpass.value == "")
	    	{
	        	window.alert("Please confirm your password.");
	        	cpass.focus();
	        	return false;
	    	}
    
			if (pass.value != cpass.value)	
    		{
    	    	window.alert("Password not matched.");
   		     	cpass.focus();
   		     	return false;
   		 	}
	
    		if (age.value == "")
    		{
       		 	window.alert("Please enter your Age.");
       		 	age.focus();
       		 	return false;
    		}
    	
    		if (address.value == "")
    		{
        		window.alert("Please enter your Address.");
        		address.focus();
        		return false;
    		}
	
			if (mob.value == "")
    		{
        		window.alert("Please enter your mobile number.");
        		mob.focus();
        		return false;
    		}
    
    		if (email.value == "")
    		{
    		    window.alert("Please enter a valid e-mail address.");
    		    email.focus();
       			return false;
    		}
		
	    	if (email.value.indexOf("@", 0) < 0)
    		{
        		window.alert("Please enter a valid e-mail address.");
        		email.focus();
        		return false;
    		}
		
    		if (email.value.indexOf(".", 0) < 0)
    		{
        		window.alert("Please enter a valid e-mail address.");
        		email.focus();
        		return false;
    		}
		}
		</script>
	</head>

	<body>
		<div class="container">
			<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>Sign Up</h2>
				</div>
				
				<div style="padding-left:20px;">
					<form method="post" name="ContactForm" onSubmit="return ValidateContactForm();">
						
						<p>
						<label for="FullName">Full Name:</label>
						<input type="text" name="FullName">
						</p>
	
						<p>
						<label for="UserName">User Name:</label>
						<input type="text" name="UserName">
						</p>	

						<p>
						<label for="Password">Password:</label>
						<input type="password" name="Password" />
						</p>
	
						<p>
						<label for="ConPass">Retype:</label>
						<input type="password" name="ConPass"/>
						</p>
					
						<p>
						<label for="Age">Age:</label>
						<input type="text" name="Age"/>
						</p>
	
						<p>
						<label for="Address">Address:</label>
						<input type="text" name="Address"/>
						</p>
	
						<p>
						<label for="Mobile">Mobile Number:</label>
						<input type="text" name="Mobile"/>
						</p>

						<p>
						<label for="Email">Email:</label>
						<input type="email" name="Email"/>
						</p>
			
						<p>
						<label for="gender">Gender:</label>
						<select name="gender">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						</p>

						<p>
						<input type="submit" name="reg" value="Register"/>
						<a href="userpage.php">Go Home</a></p>			
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
</html>