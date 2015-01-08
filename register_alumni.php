<!--back-end for registration begins-->
<?php 

require 'db_connect.php';
$email_err = '';
$pwd_err = '';

if(isset($_POST['register'])){

	$first_name = $_POST['first_name'];
	$middle_name = $_POST['middle_name'];
	$last_name = $_POST['last_name'];
	$gender = $_POST['sex'];
	$birth_date = $_POST['birth_date'];
	$birth_month = $_POST['birth_month'];
	$birth_year = $_POST['birth_year'];
	$date_of_birth = $birth_year."-".$birth_month."-".$birth_date;
	$course = $_POST['course'];
	$admission_year = $_POST['admission_year'];
	$passing_year = $_POST['passing_year'];
	$roll_no = $_POST['roll_no'];
	$mobile_no = $_POST['mobile_no'];
	$user_email = $_POST['email_id'];
	$city = $_POST['city'];	
	$new_password = $_POST['new_password'];
	$entered_password = $_POST['entered_password'];

	//checks new password and reentered password
	if($new_password == $entered_password){
		$password = md5($new_password);//md5()conversion of password
		
		//checks if email exists in database or not 
		$check_email_query = "SELECT * FROM alum_master_table WHERE `user_email` = '".$user_email."'";
		if($query_run = mysqli_query($con,$check_email_query)){
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows == 0){//if no then register the user
		
				$insert_query = "INSERT INTO `alum_master_table`(`user_email`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `admission_year`, `passing_year`, `course`,`loc_city`,`mobile_no`,`roll_no`) 
								VALUES ('$user_email','$first_name','$middle_name','$last_name','$gender','$date_of_birth','$admission_year','$passing_year','$course','$city','$mobile_no','$roll_no')";
				if($query_run = mysqli_query($con,$insert_query)){
				
					//now we will store password and email in alum login table
					$login_detail_query = "INSERT INTO `alum_login`(`user_email`, `password`) VALUES ('$user_email','$password')";
					if($query_run = mysqli_query($con,$login_detail_query)){//successful then redirect it to log-in
						header('location:alumni_profile.php');
					}
					else{
						//error in inserting login details in database
						$email_err = "error in registering login details";
					}
				}
				else{//error in inserting user details in database
					$email_err = "error in inserting data in master table";
				}
			}
			else{//error as email already exists in database
				$email_err = "This email id is already registered.";
			}
		}
		else{//error in query for checking email in database
			$email_err = "Error in checking email_id";
		}
	}
	else{//error as passwords don't match 
		$pwd_err = "Passwords don't match.";
	}
}
?>
<!--back-end for registration ends-->

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
		include('datepicker.php');
	?>
	<style type="text/css">
		
	</style>
	

  </head>

  <body>
  
     <?php
	 	include('header.php');
	 ?>
 	<div class="container">
	<form action="#" method="post" style="text-align:left;margin-left:5%">
	<h3>Register</h3>

	<div class="row">
	<!--Form input for name-->
	<label style="margin-left:20px">Name </label><br>

	<!--Input for first_name-->
	<div class="col-sm-3"  >
	<input name="first_name" type="text" placeholder="First Name"required />
	</div>
	
	<!--Input for middle_nume-->
	<div class="col-sm-3"  >
	<input name="middle_name" type="text" placeholder="Middle Name" />
	</div>

	<!--Input for last_name-->
	<div class="col-sm-3"  >
	<input name="last_name" type="text" placeholder="Last Name" required />
	</div>

	<div class="col-sm-3"  >
	<!--intentionally blank-->
	</div>

	</div >
	<br>

	<!--Input for gender-->
	<label>Gender</label><br>
	<div class="row">

	<!--Input for male-->
	<div class="col-sm-2"  >
	<input type="radio" name="sex" value="male" checked>Male
	</div>
	
	<!--Input for female-->
	<div class="col-sm-2"  >
	<input type="radio" name="sex" value="female">Female
	</div>

	<!--Input for other-->
	<div class="col-sm-2"  >
	<input type="radio" name="sex" value="other">other
	</div>
	
	<div class="col-sm-6"  >
	<!--intentionally blank-->
	</div>
	
	</div>
	<br>

	<!--Input for date of birth-->
	<label>Date of Birth</label><br>
    <div class="row">
    
    <!-- Input for date-->
    <div class="col-md-1">
    <label>Date</label><br>
    <select name="birth_date" value ="<?php echo $birth_date ;?>">
	<script>var i;for(i=01; i<=31; i++) {document.write("<option>"+i + "</option>");}</script>
	</select>
    </div>

    <!--Input for month-->
    <div class="col-md-1">
    <label>Month</label><br>
    <select name="birth_month" value ="<?php echo $birth_month ;?>">
	<script>var i;for(i=01; i<=12; i++) {document.write("<option>"+i + "</option>");}</script>
	</select>
    </div>

    <!--Input for Year-->
    <div class="col-md-1">
    <label>year</label><br>
    <select name="birth_year" value ="<?php echo $birth_year ;?>">
	<script>var i;for(i=1970; i<=new Date().getFullYear(); i++) {document.write("<option>"+i + "</option>");}</script>
	</select>
    </div>
    
    <div class="col-md-9">
    <!--Intentionally Blank -->
    </div>

    </div>
	<br>

	<!--Input for course-->
	<label>Course</label><br>
	<select name="course" >
	  <option value="M.Tech(IT)">M.Tech(IT)</option>
  	  <option value="B.com(Hons)">B.com(Hons)</option>
      <option value="MCA (6 Years)">MCA (6 Years)</option>
  	  <option value="MBA(Management Science)-5 Yrs">MBA(Management Science)-5 Yrs</option>
	  <option value="MBA(Management Science)-2 Yrs">MBA(Management Science)-2 Yrs</option>
	  <option value="MBA(Tourism Administration)">MBA(Tourism Administration)</option>
	  <option value="MBA(APR)">MBA(APR)</option>
	</select>
	<br>
	<br>

	<div class="row">

	<div class="col-sm-3">
	
	<!--Input for Admission year-->
	<label>Admission Year</label><br>
	<select name="admission_year" value ="<?php echo $year ;?>">
	<script>var i;for(i=1990; i<=new Date().getFullYear(); i++) {document.write("<option>"+i + "</option>");}</script>
	</select>
	
	</div>
	
	<!--Input for Passing Year-->
	<div class="col-sm-3">
	<label>Passing Year</label><br>
	<select name="passing_year" value ="<?php echo $year ;?>">
	<script>var i;for(i=1991; i<=new Date().getFullYear(); i++) {document.write("<option>"+i + "</option>");}</script>
	</select>
	</div>

	<!--Input for Roll no-->
	<div class="col-sm-3">
	<label>Roll Number:</label><br>
	<input type="text" name="roll_no" placeholder="IT-2K11-02"/>
	</div>
	
	<div class="col-sm-3">
	<!--blank-->
	</div>
	
	</div>
	<br>


	<div class="row">

	<!--Input for Mobile No-->	
	<div class="col-sm-4">
	<label>Mobile Number</label><br>
	<input name="mobile_no" type="text" placeholder="+91-9876543210"required />
	</div>

	<!--Input for Email id-->
	<div class="col-sm-8">
	<label>Email</label><br>
	<input name="email_id" type="email" placeholder="abc@de.f"required /><br>
	<?php
	if(trim($email_err)!= ''){
		echo $email_err;
	}
	?>
	</div>
	
	</div>
	<br>

	<!--Input for Local City-->
	<label>Current City</label><br>
	<input name="city" type="text" placeholder="Mumbai" required />
	<br>
	<br>

	<!--Input for Password-->
	<label>Choose Password</label><br>
	<input type="password" name="new_password" placeholder="Password" required>
	<br>
	<!--Input for Re-entered Password-->
	<label>Re-enter Password</label><br>
	<input type="password" name="entered_password" placeholder="Re-enter Password" required>
	<br>
	<?php
	//echo error occured
	if(trim($pwd_err)!= ''){
		echo $pwd_err;
	}
 	?>
	<br>

	<!--Submit button-->
    <input type="hidden" name="register" value="register">
	<button type="submit" class="btn btn-primary" >Register</button><br>
	
	Already registered?
	<a href="log_in.php">Sign in</a> now.
	
	</form>
	</div>
	<br>

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

