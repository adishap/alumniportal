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
<input name="first_name" type="text" placeholder="First Name"required />
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
<br><br>
<label>Gender</label><br>
<div class="row">
<div class="col-sm-2"  >
<input type="radio" name="sex" value="male" checked>Male
</div>
<div class="col-sm-2"  >
<input type="radio" name="sex" value="female">Female
</div>
<div class="col-sm-2"  >
<input type="radio" name="sex" value="other">other
</div>
<div class="col-sm-6"  >
<!--intentionally blank-->
</div>
</div>
<br><br>
<label>Date of Birth</label><br>
    <input type="text" type="text" required/>
<br><br>
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
<br><br>
<div class="row">
<div class="col-sm-6">
<label>Admission Year</label><br>
<select name="admission_year" value ="<?php echo $year ;?>">
<script>var i;for(i=1990; i<=new Date().getFullYear(); i++) {document.write("<option>"+i + "</option>");}</script>
</select>
</div>
<div class="col-sm-6">
<label>Passing Year</label><br>
<select name="passing_year" value ="<?php echo $year ;?>">
<script>var i;for(i=1991; i<=new Date().getFullYear(); i++) {document.write("<option>"+i + "</option>");}</script>
</select>
<br><br>
</div>
</div>
<div class="row">
<div class="col-sm-4">
<label>Mobile Number</label><br>
<input name="mobile_no" type="text" placeholder="+91-9876543210"required />
</div>
<div class="col-sm-8">
<label>Email</label><br>
<input name="email_id" type="email" placeholder="abc@de.f"required />
</div>
</div>
<br><br>
<div class="row">
<label>Current City</label><br>
<input name="city" type="text" placeholder="Mumbai" required />
</div>
<br><br>
<label>Choose Password</label>
<input type="password" name="new_password" style="margin-left:2%" placeholder="Password" required>
<br>
<label>Re-enter Password</label>
<input type="password" name="enter_password" style="margin-left:1%" placeholder="Re-enter Password" required>
<br><br>
 <input type="hidden" name="register" value="register">
<button type="submit" class="btn btn-primary" >Register</button><br><br>
Already registered?
<a href="log_in.php">Sign in</a> now.
</form>

  </body>
</html>
