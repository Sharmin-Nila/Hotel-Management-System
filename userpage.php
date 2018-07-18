<?php
	include('db.php');
	
	session_start();
		if(isset($_SESSION['uname']))
		{
			$user_name =$_SESSION['uname'];
		}
		$sql = "select * from register where username = '$user_name';";
		$select = mysqli_query($connection, $sql);
		$result = mysqli_fetch_assoc($select);
		$_SESSION['result'] = $result;

?>


<!doctype html>
<html>
	<head>
		<title>Home</title>
		<link href="css/style5.css" rel="stylesheet" type="text/css" />	
	</head>
	
	<body>
		<div class="container">
			<div class="top">
				<h1 id="title" class="hidden" style="font-size:40px">Welcome <?php echo($result['name']);?></h1>
			</div>
			
			<div class="login-box animated fadeInUp">
				<div style="padding-left:20px;">
	
				<a href = "#">Home</a> &nbsp
				<a href="profile.php">Profile</a> &nbsp
				<?php if($result['usertype']=="admin")
					  {
						 echo("<a href = 'registration.php'>Receptionist Register</a> &nbsp");
					   	 echo("<a href = 'list.php'>User List</a> &nbsp");
						 echo("<a href = 'room.php'>New Room Register</a> &nbsp");	
					  }
					  
					  if($result['usertype']=="receptionist")
					  {
						 echo("<a href ='check-in.php'>Check in</a> &nbsp");
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
		 		<br>
		 		<br>
				</div>
				</div>
			</div>
	
			<div class="slideshow-container">
				<div class="mySlides fade">
	  				<img src="images/11.jpg" style="width:100%">
				</div>
	
				<div class="mySlides fade">
					<img src="images/12.jpg" style="width:100%">
				</div>

				<div class="mySlides fade">
			  		<img src="images/13.jpg" style="width:100%">
				</div>
			
				<div class="mySlides fade">
				  	<img src="images/14.jpg" style="width:100%">
				</div>
			
				<div class="mySlides fade">
				  	<img src="images/15.jpg" style="width:100%">
				</div>
			
				<div class="mySlides fade">
				  	<img src="images/16.jpg" style="width:100%">
				</div>
			
				<div class="mySlides fade">
			  		<img src="images/17.jpg" style="width:100%">
				</div>
			</div>
			<br>

			<div style="text-align:center">
				<span class="dot"></span> 
  				<span class="dot"></span> 
  				<span class="dot"></span> 
  				<span class="dot"></span> 
  				<span class="dot"></span> 
  				<span class="dot"></span> 
  				<span class="dot"></span> 
			</div>

		<script>
			var slideIndex = 0;
			showSlides();

			function showSlides() {
   	 			var i;
    			var slides = document.getElementsByClassName("mySlides");
    			var dots = document.getElementsByClassName("dot");
    			
				for (i = 0; i < slides.length; i++) {
       				slides[i].style.display = "none";  
    			}
    		
				slideIndex++;
    		
				if (slideIndex> slides.length) {slideIndex = 1}    
    		
				for (i = 0; i < dots.length; i++) {
        			dots[i].className = dots[i].className.replace(" active", "");
    			}
    		
				slides[slideIndex-1].style.display = "block";  
    			dots[slideIndex-1].className += " active";
    			setTimeout(showSlides, 2000); // Change image every 2 seconds
			}
		</script>
	</body>
</html>