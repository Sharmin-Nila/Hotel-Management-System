<?php
    include('db.php');
	
	session_start();
	if($_POST){
		$uname = $_POST['username'];
		$password = $_POST['password'];
		$sql = "select * from Register where username = '$uname' and password='$password';";
		$select = mysqli_query($connection, $sql);
		$numrow = mysqli_num_rows($select);
		
		if($numrow >0){
			$_SESSION['uname'] = $uname;
				header("Location: userpage.php");
				exit();
		}
	}
?>

<!doctype html>
<html>
	<head>
		<title>Login Page</title>
		
		<script>
		function ValidateLoginForm(){
			var uname = ContactForm.username;
			var pass = ContactForm.password;

			if(uname.value == ""){
				window.alert("Please enter your user name");
				uname.focus();
				return false;
			}

			if(pass.value == ""){
				window.alert("please enter your password");
				pass.focus();
				return false;
			}
		}
		</script>
		
		<link rel="stylesheet" href="css/style1.css">
	</head>

	<body>
		<div class="container">	
			<div class="top">
				<h1 id="title" class="hidden">Hotel Atlas</h1>
			</div>

			<div class="login-box animated fadeInUp">
				<div class="box-header">
					<h2>Log In</h2>
				</div>
	
				<div style="padding-left:20px;">
					<form method="post" name="ContactForm" onSubmit="return ValidateLoginForm();">
						<p>
						<label for="username">User Name</label>
						<input type="text" name="username" />
						</p>
		
						<p>
						<label for="password">Password</label>
						<input type="password" name="password" />
						</p>
	
						<p>
						<input type="submit" name="login" value="Login"/>
						</p>
					</form>
				</div>
			</div>		
		</div>
	</body>
</html>