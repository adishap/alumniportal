<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>IIPS | Alumni</title>

    <!-- Bootstrap core CSS -->
    <?php
		include('cssLinks.php');
		include('slider_cssLinks.php');
	?>
	<style type="text/css">
		
	</style>
  </head>

  <body>
  <script>
    $('#sandbox-container input').datepicker({
    });
</script>

     <?php
	 	include('header.php');
	 ?>
 
<form action="#" method="post" style="text-align:left;margin-left:5%">
<h3>Register</h3>

<div class="row">
<label>Name </label><br>
<div class="col-sm-3"  >	
<input name="first_name" type="text" placeholder="First Name" disabled/>
</div>
<div class="col-sm-3"  >
<input name="middle_name" type="text" placeholder="Middle Name" />
</div>
<div class="col-sm-3"  >
<input name="last_name" type="text" placeholder="Last Name"/>
</div>
<div class="col-sm-3"  >
<!--intentionally blank-->
</div>
</div >
<br><br>
<div class="row">
<div class="col-sm-4">
<label>Mobile Number</label><br>
<input name="mobile_no" type="text" placeholder="+91-9876543210"required />
</div>
<div class="col-sm-8">
<!--Intentionally Left blank-->
</div>
</div>
<br><br>
<div class="row">
<label>Current City</label><br>
<input name="city" type="text" placeholder="Mumbai" required />
</div>
<br><br>
Change Password:
<label>Present Password</label>
<input type="password" name="present_password" style="margin-left:2%" placeholder="Password" >
<br>
<label>New Password</label>
<input type="password" name="new_password" style="margin-left:2%" placeholder="New Password" >
<br>
<label>Re-enter Password</label>
<input type="password" name="entered_password" style="margin-left:1%" placeholder="Re-enter Password" >
<br><br>
 <input type="hidden" name="register" value="register">
<button type="submit" class="btn btn-primary" >Register</button><br><br>
Already registered?
<a href="log_in.php">Sign in</a> now.
</form>
<!--back-end for registration begins-->
<?php 

 require 'db_connect.php';

if(isset($_POST['register'])){
	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$gender = $_POST['sex'];
	$date_of_birth = $_POST['date_of_birth'];
	$course = $_POST['course'];
	$admission_year = $_POST['admission_year'];
	$passing_year = $_POST['passing_year'];
	$mobile_no = $_POST['mobile_no'];
	$user_email = $_POST['email_id'];
	$city = $_POST['city'];	
	$new_password = $_POST['new_password'];
	$entered_password = $_POST['entered_password'];

	if($new_password == $entered_password){
	$password = md5($new_password);
	$check_email_query = "SELECT * FROM alum_master_table WHERE `user_email` = '".$user_email."'";
	if($query_run = mysql_query($check_email_query)){
		$query_num_rows = mysql_num_rows($query_run);
		if($query_num_rows == 0){
			echo $insert_query = "INSERT INTO `alum_master_table`(`user_email`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `admission_year`, `passing_year`, `course`,`loc_city`,`mobile_no`) VALUES ('$user_email','$first_name','$middle_name','$last_name','$gender','$date_of_birth','$admission_year','$passing_year','$course','$city','$mobile_no')";
			if($query_run = mysql_query($insert_query)){
				//now we will store password and email in alum login table
				echo $login_detail_query = "INSERT INTO `alum_login`(`user_email`, `password`) VALUES ('$user_email','$password')";
				if($query_run = mysql_query($login_detail_query)){
					$_SESSION['user_email'] = $user_email;
					header('location:alumni_profile.php');
				}
				else{
					echo "error in registering login details";
				}
			}
			else{
				echo "error in inserting data in master table";
			}
		}
		else{
			echo "This email id is already registered.";
		}
	}
	else{
		echo "Error in checking email_id";
	}

}else{
echo "Passwords don't match.";
}
}
?>
<!--back-end for registration ends-->
<!--footer-->
<?php
		include('footer.php');
		include('jsLinks.php');
		include('slider_jsLinks.php');
	 ?>
	 
	
	
	<!-- Script for "News/Events" tab -->
	<script src="assets/js/holder.js"></script>
	<?php 

		$browser = get_browser(null, true) ;
		$browser =  strtolower($browser['browser']) ; 

		if ($browser == 'ie') {
		echo " 
			<script>
 		 $(function () {
  			$('#myTab a').click(function (e) {
    			e.preventDefault();
  				$(this).tab('show');
			})

    	    $('#myTab a:first').tab('show');

 			$(window).load(function(){
 			        $('#myModal').modal('show');
 			    });	   	    
 		 })
	</script>

		";


		}
				else {
					echo " 
					<script>
		 		 $(function () {
		  			$('#myTab a').click(function (e) {
		    			e.preventDefault();
		  				$(this).tab('show');
					})

		    	    $('#myTab a:first').tab('show');

		 				   	    
		 		 })
			</script>

				";
			}
	?>
	


  <!-- Script for testimonial -->
	<script>
	$(document).ready(function() {
            $('ul#quotes').quote_rotator();
            $('ul#button_quotes').quote_rotator();
        });


   </script>

   <script src="https://www.surveymonkey.com/jsPop.aspx?sm=mM0njMJ6P3CyzaMh0OhMew_3d_3d"> </script>
  
  </body>
</html>
  </body>
</html>
