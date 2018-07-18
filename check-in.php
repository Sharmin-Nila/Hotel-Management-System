<?php
	include('db.php');
	session_start();
	if($_POST){
		$select = mysqli_query($connection, "select * from room order by 'room_no'");
    	$num_row = mysqli_num_rows($select);
		$userrow = mysqli_fetch_array($select);
		
		
		if($_POST['uname']){
			$uname = mysqli_real_escape_string($connection, $_POST['uname']);
			$email = mysqli_real_escape_string($connection, $_POST['email']);
			$address = mysqli_real_escape_string($connection, $_POST['address']);
			$country = mysqli_real_escape_string($connection, $_POST['country']);
			$mobile = mysqli_real_escape_string($connection, $_POST['mobile']);
			$type = mysqli_real_escape_string($connection, $_POST['type']);
			$id = mysqli_real_escape_string($connection, $_POST['id']);
	
			$update1 = mysqli_query($connection, "insert into guestTable(name, email, address, country, mobile, id_type, id)
									values ('$uname', '$email', '$address', '$country', '$mobile', '$type', '$id')");
		}
									
		if($_POST['rnum']){
			$uname = mysqli_real_escape_string($connection, $_POST['uname']);
			$rnum = mysqli_real_escape_string($connection, $_POST['rnum']);
			$din = mysqli_real_escape_string($connection, $_POST['din']);
			$dout = mysqli_real_escape_string($connection, $_POST['dout']);
			$rtype = mysqli_real_escape_string($connection, $_POST['rtype']);
			$nadults = mysqli_real_escape_string($connection, $_POST['nadults']);
			$nchildrens = mysqli_real_escape_string($connection, $_POST['nchildrens']);

			$diff = abs(strtotime($dout) - strtotime($din));
			$years   = floor($diff / (365*60*60*24)); 
			$months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days    = floor(($diff - $years * 365*60*60*24 - $months * 30*60*60*24)/ (60*60*24));

			$update2 = mysqli_query($connection, "insert into bookingTable(guest_name, room_number, check_in, check_out, room_type, num_days,
					num_adult, num_children) values ('$uname', '$rnum', '$din', '$dout', '$rtype', '$days', '$nadults', '$nchildrens')");
		}
		
		$_SESSION['temp1'] = $uname;
		$_SESSION['temp2'] = $rnum;
		
		header('Location:show.php');
	}

?>

<!DOCTYPE>
<html>
    <head>
        <title>Check-in</title>
		<link href="css/s4.css" rel="stylesheet" type="text/css"/>
		
		<script>		
		function ValidateBookingForm()
		{
    		var name1 = booking.uname;
    		var em = booking.email;
			var add = booking.address;
			var cn = booking.country;
			var mob = booking.mobile;
			var typ1 = booking.type;
			var id1 = booking.id;
			
		    if (name1.value == "")
    		{
        		window.alert("Please enter your name.");
        		name1.focus();
        		return false;
    		}
		
    		if (add.value == "")
    		{
        		window.alert("Please enter your address.");
        		add.focus();
        		return false;
    		}

    		if (cn.value == "null1")
    		{
        		window.alert("Please select your country name.");
        		cn.focus();
        		return false;
    		}
			
			if (mob.value == "")
    		{
        		window.alert("Please enter your mobile number.");
        		mob.focus();
        		return false;
    		}
			
			var name3 = booking.rnum;
			var day1 = booking.din;
			var day2 = booking.dout;
			var typ2 = booking.rtype;
			var adult = booking.nadults;
			var child = booking.nchildrens;
			
			if (name3.value == "")
    		{
        		window.alert("Please enter the room number.");
        		name3.focus();
        		return false;
    		}
			
			if (day1.value == "")
    		{
        		window.alert("Please enter the check-in date.");
        		day1.focus();
        		return false;
    		}
			
			if (day2.value == "")
    		{
        		window.alert("Please enter the check-out date.");
        		day2.focus();
        		return false;
    		}
			
			if (typ2.value == "null3")
    		{
        		window.alert("Please enter the room type.");
        		typ2.focus();
        		return false;
    		}
			
			if (adult.value == "")
    		{
        		window.alert("Please enter the adult number.");
        		adult.focus();
        		return false;
    		}
			
			if (child.value == "")
    		{
        		window.alert("Please enter the children number.");
        		child.focus();
        		return false;
    		}
			
   			return true;
		}
		</script>
	</head>

    <body>
		<div class="container">		
			<div class="top">
				<h1 id="title" class="hidden">Check In</h1>
			</div>
	       
		   <form method="post" name="booking" onSubmit="return ValidateBookingForm()";>
	            <div style="width:100%">   
					<div class="login-box animated fadeInUp" style="float:left; margin-left:190px; width:80% ">
						<div class="box-header">
						   <h2>Guest Information</h2>
						</div>
					
					<div style="padding-left:20px;">   
			   			<p>
                 		<label for="uname"> Name </label>
                 		<input type="text" name="uname"/> 
						</p>
			   
 	           			<p>
                 		<label  for="email"> Email </label>
                 		<input type="email" name="email"/>
               			</p>
			   
			   			<p>
                		<label for="address"> Address </label>
                 		<input type="text" name="address"/>
               			</p>
	           
			   			<p>
                 		<label for="country"> Country </label>
				 		<select name="country">
				 			<option value="null1"> Select Country</option>
				 			<option value="bangladesh"> Bangladesh</option>
				 			<option value="india"> India</option>
				 			<option value="pakistan"> Pakistan</option>
				 			<option value="srilanka"> Srilanka</option>
				 			<option value="nepal"> Nepal</option>
				 			<option value="australia"> Australia</option>
				 			<option value="newzeland"> Newzeland</option>
				 			<option value="bhutan"> Bhutan</option>
				 			<option value="maldip"> Maldip</option>
				 			<option value="afganistan"> Afganistan</option>
				 		</select>
               			</p>
			   
			   			<p>
                		<label  for="mobile"> Mobile No </label>
                 		<input type="text" name="mobile"/>
               			</p>
				
						<p>
				 		<label for="type"> ID Type: </label>
				 		<select name="type">
				 			<option value="null2"> Select ID Type</option>
				 			<option value="nid"> NID</option>
				 			<option value="driving"> Driving License</option>
				 			<option value="school"> School/College</option>
				 			<option value="ssid"> SSID</option>
				 		</select> 
           	   			</p>
			   
			   			<p>
                	 	<label  for="id"> ID </label>
                 		<input type="text" name="id"/>
               			</p>
					</div>
				</div>	
				
				<div class="login-box animated fadeInUp" style="float:right; margin-right:200px; width:80% ">
					<div class="box-header">
					   <h2>Rate Information</h2>
					</div>
			
					<div style="padding-left:20px;">   
						<p>
            			<label for="rnum"> Room Number </label>
                	 	<input type="text" name="rnum"/> 
			  			</p>
				
						<p> 
                 		<label for="din"> Date In </label>
				 		<input type="date" name="din"/>
			   			</p>
			   
			   			<p>
			   	 		<label for="dout"> Date Out </label>
				 		<input type="date" name="dout"/>
			   			</p>
	           
			   			<p>
                	 	<label for="rtype"> Rate Type </label>
				 		<select name="rtype">
				 			<option value="null3"> Select Room Type</option>
				 			<option value="single"> Single</option>
				 			<option value="double"> Double</option>
				 		</select>
               			</p>
			   
			   			<p>
                 		<label  for="nadults"> No. of Adults </label>
                 		<input type="number" name="nadults"/>
               			</p>
				
						<p>
                	 	<label  for="nchildrens"> No. of Childrens </label>
                 		<input type="number" name="nchildrens"/>
               			</p>
				
			  		</div>
				</div>
			</div>
			
			<div style="clear:both"></div>
			
			<br><br>
			
			<div style="text-align:center; " >
				<p>
                <input type="submit" name="update" value="Update" style="font-size:15px"/> &nbsp
               	<a href="userpage.php" style="font-size:12px">Cancel</a> 
			   </p>
			</div>   
		   </form>
		</div>
    </body>
</html>