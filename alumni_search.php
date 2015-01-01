<?php
session_start();
ob_start();
 if(!isset($_SESSION['user_email']) || (trim($_SESSION['user_email']) == '')) {
 	header('location: log_in.php');
 }else{
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
     <div class="col-sm-3">
     <!-- Search Form div -->
     <form action="#" method="post" style="text-align:left;margin-left:5%">
     <legend>Search</legend>
	 <label>Name </label><br>
     <input name="name" type="text" placeholder="Mark" /><br />
     <label>Course</label><br>
 <select name="course" >
 <option value="-1"></option>
  <option value="M.Tech(IT)">M.Tech(IT)</option>
  <option value="B.com(Hons)">B.com(Hons)</option>
  <option value="MCA (6 Years)">MCA (6 Years)</option>
  <option value="MBA(Management Science)-5 Yrs">MBA(Management Science)-5 Yrs</option>
<option value="MBA(Management Science)-2 Yrs">MBA(Management Science)-2 Yrs</option>
<option value="MBA(Tourism Administration)">MBA(Tourism Administration)</option>
<option value="MBA(APR)">MBA(APR)</option>
</select>
<br>
<label>Admission Year</label><br>
<input name="admission_year" type="text" placeholder="2014" />
<br>
<label>Passing Year</label><br>
<input name="passing_year" type="text" placeholder="2015" />
<br>
<label>City</label><br>
<input name="city" type="text" placeholder="New York" />
<br>
<input type="hidden" name="search" value="search">
<button type="submit" class="btn btn-primary">Search</button><br><br>
     </form>
     </div>
     <div class="col-md-9">
     <!-- Result div -->
     <?php
	 include 'db_connect.php';
	 if(isset($_POST['search'])){
		 $query = "SELECT * FROM `alum_master_table` WHERE 1 ";
		 if(empty($_POST['name'])&&empty($_POST['admission_year'])&&empty($_POST['passing_year'])&&empty($_POST['city'])&&($_POST['course']== -1)){
			 echo "Please select some filters to search.";
			 }else{
		 if(!empty($_POST['name'])){
			 $name = $_POST['name'];
			 $query .= " AND (`first_name` LIKE '%".$name."%' OR `last_name` LIKE '%".$name."%' OR `middle_name` LIKE '%".$name."%') ";
			 }
		if(!empty($_POST['course'])&&$_POST['course']!= -1 ){
			 $course = $_POST['course'];
			 $query .= " AND (`course` = '".$course."') ";
			 }
		if(!empty($_POST['admission_year'])){
			 $admission_year = $_POST['admission_year'];
			 $query .= " AND (`admission_year` = '".$admission_year."')";
			 }
		 if(!empty($_POST['passing_year'])){
			 $passing_year = $_POST['passing_year'];
			 $query .= " AND (`passing_year` = '".$passing_year."')";
			 }
		 if(!empty($_POST['city'])){
			 $city = $_POST['city'];
			 $query .= " AND (`per_city` = '".$city."' OR `loc_city` = '".$city."')";
			 }
		 echo $query;
		 $search_result = mysqli_query($con , $query);
		 if(mysqli_num_rows($search_result)>0){
			 echo "<table class='table'>
			 		<tr>
					<th>Name</th>
					<th>Date of Birth</th>
					<th>Course</th>
					<th>Passing Year</th>
					<th>Local Address</th>
					<th>Email Address</th>
					<th>Mobile Number</th>
					</tr>
					";
		 	while($row = mysqli_fetch_array($search_result)) {
				echo '<tr>'; 
			 	echo '<td><a href="alumni_profile.php?user_email='.$row['user_email'].'">'.$row['first_name']." ".$row['middle_name']." ".$row['last_name'].'</td>';
				echo '<td>'.$row['date_of_birth'].'</td>';
				echo '<td>'.$row['course'].'</td>';
				echo '<td>'.$row['passing_year'].'</td>';
				echo '<td>'.$row['loc_starting_address']." ".$row['loc_city']." ".$row['loc_pincode']." ".$row['loc_state']." ".$row['loc_country']." ".$row['loc_country_code'].'</td>';
				echo '<td>'.$row['user_email'].'</td>';
				echo '<td>'.$row['mobile_no'].'</td>';
			 }
			 echo '</table>';
		 }else{
			 echo '<br>Sorry..!! No results found.';
			 }
			 }
	 }
	 ?>
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
