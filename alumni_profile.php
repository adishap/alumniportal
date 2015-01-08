<?php
session_start();
ob_start();

//if user is not logged in
if(!isset($_SESSION['user_email']) || (trim($_SESSION['user_email']) == '')) {
 	header('location: log_in.php');
}
else{
 ?>

 <!--code -->
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
  

    <?php
		include('header.php');
	?>
	
	<!--contents-->
	<?php

	//include database file
	include 'db_connect.php';

	//setting user_email variable
	if(!empty($_GET['user_email'])){
		$user_email = mysql_real_escape_string(htmlentities($_GET['user_email']));
	}
	else{
		$user_email = $_SESSION['user_email'];
	}
	
	$query = "SELECT * FROM `alum_master_table` WHERE `user_email` = '$user_email'";
	$result = mysqli_query($con , $query);
	if(mysqli_num_rows($result)>0){
	 	while($row = mysqli_fetch_array($result)) {
	
			$name = $row['first_name']." ".$row['middle_name']." ".$row['last_name'];
			$date_of_birth = $row['date_of_birth'];
			$course = $row['course'];
			$roll_no = $row['roll_no'];
			$admission_year = $row['admission_year'];
			$passing_year = $row['passing_year'];
			$local_address = $row['loc_starting_address']." ".$row['loc_city']." ".$row['loc_pincode']." ".$row['loc_state']." ".$row['loc_country']." ".$row['loc_country_code'];
			$per_address = $row['per_starting_address']." ".$row['per_city']." ".$row['per_pincode']." ".$row['per_state']." ".$row['per_country']." ".$row['per_country_code'];
			$mobile_no = $row['mobile_no'];
			$martial_status = $row['martial_status'];
			if($martial_status == "Married"){
				$date_of_anniversary = $row['date_of_anniversary'];
			}
	    }
	}
?>
 <div class="container">
    <div class="row">

    <div class="col-md-2">
    <!--Space for image-->
     <img src="..." alt="Display picture" height="200" width="200" border="1px">
     </div>

     <div class="col-md-10">
     <br>
     <!--Name-->
     <h2><?php echo $name; ?></h2>
     <!--Course-->
     <h4><?php echo $course; ?></h4>
     <!--Admission_year - Passing year-->
     <h4><?php echo $admission_year."-".$passing_year; ?></h4>
     </div>

     </div>
     <br>
     

    <h3>Personnal Information</h3>
    <!--Print RollNumber if exists-->
    <?php 
	if($roll_no != NULL){
		echo '<div class="row">
    	<div class="col-sm-3">
    	<strong>Roll Number</strong>
    	</div>
     
     	<div class="col-sm-9">'.$roll_no." </div>
     	</div>
     	<br>";
	} 
	?>
    
    <!--Date Of Birth-->
    <div class="row">
    <div class="col-sm-3">
    <strong>Date Of Birth</strong>
    </div>
    <div class="col-sm-9">
    <?php echo $date_of_birth; ?>
    </div>
    </div>
     <br>

    <!--Martial Status-->
	<div class="row">
    <div class="col-sm-3">
    <strong>Martial Status</strong>
    </div>
    <div class="col-sm-9">
    <?php echo $martial_status; ?>
    </div>
    </div>
    <?php 
    //if married echo DATE OF ANNIVERSARY
    if($martial_status == "Married"){
   	?>
    <div class="row">
    <div class="col-sm-3">
    <strong>Date Of Anniversary</strong>
    </div>
    <div class="col-sm-9">
    <?php echo $date_of_anniversary; ?>
    </div>
    </div>
    <br>
    <?php
    }
    ?>

    <h3>Contact Information</h3>

     <!--Mobile No-->
     <div class="row">
     <div class="col-sm-3">
     <strong>Mobile Number</strong>
     </div>
     <div class="col-sm-9">
     <?php echo $mobile_no;?>
     </div>
     </div>
     <br>

     <!--Email Address-->
     <div class="row">
     <div class="col-sm-3">
     <strong>Email Address</strong>
     </div>
     <div class="col-sm-9">
     <?php echo $user_email;?>
     </div>
     </div>
     <br>
    

     <!--Local Address-->
     <div class="row">
     <div class="col-sm-3">
     <strong>Local Address</strong>
     </div>
     <div class="col-sm-9">
     <?php echo $local_address;?>
     </div>
     </div>
     <br>
     
     <!--Permanent Address-->
     <div class="row">
     <div class="col-sm-3">
     <strong>Permanent Address</strong>
     </div>
     <div class="col-sm-9">
     <?php echo $per_address;?>
     </div>
     </div>
     <br>

     <!--ProfessionalInformation-->

     <?php
     $query = "SELECT * FROM `alum_career_info` WHERE `user_email` = '$user_email'";
	 $result = mysqli_query($con , $query);
	 if(mysqli_num_rows($result)>0){
	 	while($row = mysqli_fetch_array($result)) {
	 		$org_name = $row['organisation_name'];
	 		$job_title = $row['job_title'];
	 		$org_address = $row['starting_address']." ".$row['city']." ".$row['pincode']." ".$row['state']." ".$row['country'];
	 		if($row['self_employed'] == 1){
	 			$self_employed = "Yes";
	 		}
	 		else{
	 			$self_employed = "No";
	 		}
	 	}
	 ?>

     <h3>Professional Information</h3>

	 <!--Company Name-->
     <div class="row">
     <div class="col-sm-3">
     <strong>Works In </strong>
     </div>
     <div class="col-sm-9">
     <?php echo $org_name;?>
     </div>
     </div>
     <br>

	 <!--Job Title-->
     <div class="row">
     <div class="col-sm-3">
     <strong>Works As</strong>
     </div>
     <div class="col-sm-9">
     <?php echo $job_title; ?>
     </div>
     </div>
     <br>

     <!--Organisation Address-->
     <div class="row">
     <div class="col-sm-3">
     <strong>Organisation Address</strong>
     </div>
     <div class="col-sm-9">
     <?php echo $org_address; ?>
     </div>
     </div>
     <br>

     <!--business man-->
     <div class="row">
     <div class="col-sm-3">
     <strong>Owns A Business</strong>
     </div>
     <div class="col-sm-9">
     <?php echo $self_employed;?>
     </div>
     </div>
     <br>

	 <?php
	 }
     ?>

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
 <?php	
 }
 ?>