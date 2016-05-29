<?php
//session starts
session_start();
ob_start();

//defining error variable
$err = '';

if(!isset($_SESSION['user_email']) || (trim($_SESSION['user_email']) == '')) {
	//including database file
	require 'db_connect.php';

	if(isset($_POST['login'])){
	
		$user_email = $_POST['user_email'];
		$password = md5($_POST['password']);

		if(!empty($user_email) and !empty($password)){
			
			echo '<br><br>'.$query = "SELECT * FROM `user_login` WHERE `user_email` = '".$user_email."' AND `password` = '".$password."'";
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_array($result);
			
			if($row['user_email']==$user_email and $row['password']==$password){
			
				$_SESSION['user_email'] = $user_email;
				header("location: alumni_profile.php");
			}
			else{
				$err = "Enter a valid email address and password.";
			}
			mysqli_close($con);
		}
	}
?>

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
	 	
	<div class="row">
	
	<div class="col-sm-12"  style="text-align:left; margin:5% 0 5% 7%">	 
	
	<h3> Log In</h3>
	<form action="#" method="post">

    <!--Input For email Address-->
	<label for="input1">Email Address </label><br>
	<input name="user_email" type="email" placeholder="Email Address" id="input1" required /><br><br>

	<!--Input For password-->
	<label for="input2">Password</label><br>
	<input name="password" type="password" placeholder="Password" id="input2" required/><br>

	<?php
	if(trim($err)!= ''){
		echo $err;
	}
	?>
	
	<br>
	
	<input type="hidden" name="login" value="login">
	<button type="submit" class="btn btn-primary" style="text-align:center">LogIn</button><br><br>

	Not Registered Yet?
	<a href="register_alumni.php">Register</a> today.
	
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
else{
	header("location: alumni_profile.php");
}?>
