<?php include 'base_template_2_column.php' ?>
	
	<?php startblock('page_title'); ?>
		About IIPS
	<?php endblock(); ?>
	
	<!-- Starting of style block for custom CSS -->
	<?php startblock('style') ; ?>
		
	<?php endblock() ?>

	<?php startblock('page_heading'); ?>
        About IIPS
	<?php endblock(); ?>
	
	<?php startblock('sidemenu'); ?>

		  <ul class="nav side-tabs nav-pills">
			 <li class="active btn-block"><a class="icon-chevron-sign-right" href="#tab1">  Personnal Information</a></li>
			 <li class="btn-block"><a class="icon-chevron-sign-right" href="#tab2">   Martial Status</a></li>
			 <li class="btn-block"><a class="icon-chevron-sign-right" href="#tab3">   Permanent Address</a></li>
			 <li class="btn-block"><a class="icon-chevron-sign-right" href="#tab4">   Local Address</a></li>
			 <li class="btn-block"><a class="icon-chevron-sign-right" href="#tab5">  Job Title</a></li>
			 <li class="btn-block"><a class="icon-chevron-sign-right" href="#tab6">  Change Password</a></li>
		   </ul>
	<?php endblock() ; ?>

	<?php startblock('content') ?>			  	  

		<div id="tab1"  class="tab-content active text-justify">
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
		</div>

		<div id="tab2" class="tab-content hide text-justify" style="text-align:justify; padding:0px 20px 0px 20px; margin-top:0px; line-height:1.5;">
			<!--Update martialstatus-->
<form action="#" method="post" style="text-align:left;margin-left:5%">
<fieldset>

<!-- Form Name -->
<legend>Update Martial Status</legend>

<!-- Multiple Radios -->
<div class="row">
  <div class="col-md-2">
      <input name="radios" id="radios-0" value="Married" checked="checked" type="radio">
      Married
	</div>
  <div class="col-md-2">
    <input name="radios" id="radios-1" value="Unmarried" type="radio">
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

		</div>

		<div id="tab3" class="tab-content hide text-justify">
		   <form action="#" method="post" style="text-align:left;margin-left:10%">
<fieldset>

<!-- Form Name -->

<legend>Change Permanent Address</legend>
  <label>Starting Address</label><br>
  <textarea class="form-control" id="per_starting_address" name="per_starting_address"></textarea>
  <table class="table-condensed">
  <tr>
  <td><label >City </label></td> 
  <td><input id="per_city" name="per_city" placeholder="Indore" required type="text"></td>
  </tr>
  <tr>
  <td><label>State</label></td>  
  <td><input id="per_state" name="per_state" placeholder="MP"required="" type="text"></td>
 </tr>
 <tr>
  <td><label>Country</label></td>  
 <td><input id="per_country" name="per_country" placeholder="India" required type="text"></td>
 </tr>
<tr>
  <td><label>Pincode</label></td>
<td><input id="per_pincode" name="per_pincode" placeholder="452010" type="text"></td>
</tr>
<tr><td><!-- Button -->
<input type="hidden" name="update_per_address" value="update_per_address">
<button type="submit" class="btn btn-primary" >Update Address</button></td>
</tr>
</table>
</fieldset>
</form>
		</div>
		
		<div id="tab4" class="tab-content hide text-justify">
			<form action="#" method="post" style="text-align:left">
<fieldset>

<!-- Form Name -->
<legend>Change Local Address</legend>
  <label>Starting Address</label><br>
  <textarea class="form-control" id="local_starting_address" name="local_starting_address"></textarea>
  <table class="table-condensed">
  <tr>
  <td><label >City </label></td> 
  <td><input id="local_city" name="local_city" placeholder="Indore" required type="text"></td>
  </tr>
  <tr>
  <td><label>State</label></td>  
  <td><input id="local_state" name="local_state" placeholder="MP"required="" type="text"></td>
 </tr>
 <tr>
  <td><label>Country</label></td>  
 <td><input id="local_country" name="local_country" placeholder="India" required type="text"></td>
 </tr>
<tr>
  <td><label>Pincode</label></td>
<td><input id="local_pincode" name="local_pincode" placeholder="452010" type="text"></td>
</tr>
<tr><td><!-- Button -->
<input type="hidden" name="update_local_address" value="update_local_address">
<button type="submit" class="btn btn-primary" >Update Address</button></td>
</tr>
</table>
</fieldset>
</form>
		</div>
		
		<div id="tab5" class="tab-content hide text-justify">
			<?php 
				$iipsWiki = "textFiles/About_IIPS/iips_wikipedia.txt";  
				 readTextFiles($iipsWiki);
		    ?>
			Read More @ <a href="http://en.wikipedia.org/wiki/International_Institute_of_Professional_Studies">IIPS WikiPage</a>
		</div>
		
		<div id="tab6" class="tab-content hide text-justify">
			<!--Update password -->
<form action="#" method="post" style="text-align:left;margin-left:5%">
<fieldset>

<!-- Form Name -->
<legend>Change Password:</legend>
<div class='row'>
<div class='col-md-3'>
<!-- Password input-->
  <label>Present Password</label><br>
    <input id="old_password" name="old_password" required  placeholder="Password" type="password">
</div>
<div class='col-md-3'>
<!-- Password input-->
  <label >New Password</label><br>
    <input id="new_password" name="new_password" required  placeholder="New Password" type="password">
 </div>
<!-- Password input-->
<div class='col-md-3'>
  <label>Re-enter Password</label><br>
    <input id="re_password" name="re_password" required placeholder="Re-enter Password" type="password">
</div>
<div class='col-md-3'>
<!--blank-->
</div>
</div><br>
<input type="hidden" name="update_password" value="update_password">
<button type="submit" class="btn btn-primary" >Update Password</button><br><br>


</fieldset>
</form>
        </div>           
            
   <?php endblock(); ?>
