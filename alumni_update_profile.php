<?php
session_start();
ob_start();
 if(!isset($_SESSION['user_email']) || (trim($_SESSION['user_email']) == '')) {
 	header('location: log_in.php');
 }else{
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
<!--Update name form-->
<form action="#" method="post" style="text-align:left;margin-left:5%">
<legend>Update Name</legend>
<div class="row">
<label>Name </label><br>
<div class="col-sm-3"  >	
<input name="first_name" type="text" placeholder="First Name" disabled />
</div>
<div class="col-sm-3"  >
<input name="middle_name" type="text" placeholder="Middle Name" />
</div>
<div class="col-sm-3"  >
<input name="last_name" type="text" placeholder="Last Name" required />
</div>
<div class="col-sm-3"  >
<!--intentionally blank-->
</div>
</div >
<br>

<input type="hidden" name="update_name" value="update_name">
<button type="submit" class="btn btn-primary" >Update Name</button><br><br>
</form>

<!--Update password -->
<form action="#" method="post" style="text-align:left;margin-left:5%">
<fieldset>

<!-- Form Name -->
<legend>Change Password:</legend>
<div class='row'>
<div class='col-md-3'>
<!-- Password input-->
  <label>Present Password</label><br>
    <input id="old_password" name="old_password" required=""  placeholder="Password" type="password">
</div>
<div class='col-md-3'>
<!-- Password input-->
  <label >New Password</label><br>
    <input id="new_password" name="new_password" required=""  placeholder="New Password" type="password">
 </div>
<!-- Password input-->
<div class='col-md-3'>
  <label>Re-enter Password</label><br>
    <input id="re_password" name="re_password" required="" placeholder="Re-enter Password" type="password">
</div>
<div class='col-md-3'>
<!--blank-->
</div>
</div><br>
<input type="hidden" name="update_password" value="update_password">
<button type="submit" class="btn btn-primary" >Update Password</button><br><br>


</fieldset>
</form>

<!--Update martialstatus-->
<form action="#" method="post" style="text-align:left;margin-left:5%">
<fieldset>

<!-- Form Name -->
<legend>Update Martial Status</legend>

<!-- Multiple Radios -->
<div class="row">
  <div class="col-md-2">
      <input name="radios" id="radios-0" value="married" checked="checked" type="radio">
      Married
	</div>
  <div class="col-md-2">
    <input name="radios" id="radios-1" value="unmarried" type="radio">
      Unmarried
	</div>
	<div class="col-md-8">
	<!--intentionally blank-->
	</div>
	</div>
  <br>
<!-- Text input-->
  <label>Date of Anniversary</label><br>  
  <input id="date_of_anniversary" name="date_of_anniversary" placeholder="date" type="text"> <br><br>

<!-- Button -->
<input type="hidden" name="update_martial_status" value="update_martial_status">
<button type="submit" class="btn btn-primary" >Update</button><br><br>
</fieldset>
</form>
<!--Update permenentand local add -->
<div class="row">
<div class="col-md-6">
<!--per add-->
<form action="#" method="post" style="text-align:left;margin-left:10%">
<fieldset>

<!-- Form Name -->
<legend>Change Permanent Address</legend>
  <label>Starting Address</label><br>
  <textarea class="form-control" id="per_starting_address" name="per_starting_address"></textarea>
  <br>
  <label >City</label> <br> 
  <input id="per_city" name="per_city" placeholder="Indore" required="" type="text">
 <br> <br>
  <label>State</label> <br> 
  <input id="per_state" name="per_state" placeholder="MP"required="" type="text">
 <br> <br>
  <label>Country</label>  <br>
 <input id="per_country" name="per_country" placeholder="India" required="" type="text">
<br> <br>
  <label>Pincode</label> <br> 
<input id="per_pincode" name="per_pincode" placeholder="452010" type="text">
<br><br><!-- Button -->
<input type="hidden" name="update_per_address" value="update_per_address">
<button type="submit" class="btn btn-primary" >Update Address</button><br><br>
</fieldset>
</form>

</div>
<div class="col-md-6">
<!--local add-->
<form action="#" method="post" style="text-align:left">
<fieldset>

<!-- Form Name -->
<legend>Change Local Address</legend>
  <label>Starting Address</label><br>
  <textarea class="form-control" id="local_starting_address" name="local_starting_address"></textarea>
  <br>
  <label >City</label> <br> 
  <input id="local_city" name="local_city" placeholder="Indore" required="" type="text">
 <br> <br>
  <label>State</label> <br> 
  <input id="local_state" name="local_state" placeholder="MP"required="" type="text">
 <br> <br>
  <label>Country</label>  <br>
 <input id="local_country" name="local_country" placeholder="India" required="" type="text">
<br> <br>
  <label>Pincode</label> <br> 
<input id="local_pincode" name="local_pincode" placeholder="452010" type="text">
<br><br><!-- Button -->
<input type="hidden" name="update_local_address" value="update_local_address">
<button type="submit" class="btn btn-primary" >Update Address</button><br><br>
</fieldset>
</form>

</div>
</div>
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