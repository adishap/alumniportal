<?php
session_start();
ob_start();
 if(!isset($_SESSION['user_email']) || (trim($_SESSION['user_email']) == '')) {
  header('location: log_in.php');
 }else{
  $user_email = $_SESSION['user_email'];
  include 'db_connect.php';
 ?>

<?php include 'base_template_2_column.php' ?>
  
  <?php startblock('page_title'); ?>
    Alumni || IIPS
  <?php endblock(); ?>
  
  <!-- Starting of style block for custom CSS -->
  <?php startblock('style') ; ?>
    
  <?php endblock() ?>

  <?php startblock('page_heading'); ?>
        Update
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
    
    <!--tab1 Start-->
    <div id="tab1"  class="tab-content active text-justify">
    <!--name form-->
    <form action="#" method="post" style="text-align:left;margin-left:5%">
    <legend>Update Name</legend>

    <!--input first name disabled as first name cannot change-->
    <input name="first_name" type="text" placeholder="First Name" disabled /><br><br>
    <!--input middle name-->
    <input name="middle_name" type="text" placeholder="Middle Name" /><br><br>
    <!--input last Name-->
    <input name="last_name" type="text" placeholder="Last Name"  /><br>
    <br>

    <!--Submit Button-->
    <input type="hidden" name="update_name" value="update_name">
    <button type="submit" class="btn btn-primary" >Update Name</button><br><br>
    </form>

    <?php
    //backend for name

      if(isset($_POST['update_name'])){
        
        if (!empty($_POST['middle_name']) || !empty($_POST['last_name'])) {
        
          $middle_name = $_POST['middle_name'];
          $last_name = $_POST['last_name']; 

          $name_query = "UPDATE `alum_master_table` SET`middle_name`='".$middle_name."',`last_name`='".$last_name."' WHERE `user_email` ='".$user_email."'";
          if($name_result = mysqli_query($con,$name_query)){
            echo "<script>alert('Updation Successful.')</script>";
          }
          else{
            echo "<script>alert('Error in updating name.')</script>";
          }
        }
        else{
          echo 'Please fill middle name or last name.';
        }
      }
    ?> 
    </div>
    <!--tab1 End-->

    <!--tab2 Start-->
    <div id="tab2" class="tab-content hide text-justify">
    <!--Update martial status-->
    <form action="#" method="post" style="text-align:left;margin-left:5%">
    <!-- Form Name -->
    <legend>Update Martial Status</legend>

    <!-- Multiple Radios -->
    <!--Married Radio-->
    <input name="martial_status" value="Married" checked="checked" type="radio">
    Married
    <br>
    <!--Unmarried Radio-->
    <input name="martial_status" value="Unmarried" type="radio">
    Unmarried
    <br>
    <br>

    <!-- Text input Date of anniversary-->
    <label>Date of Anniversary</label><br>  
    <input id="date_of_anniversary" name="date_of_anniversary" placeholder="date" type="text"> <br><br>

    <!-- Button -->
    <input type="hidden" name="update_martial_status" value="update_martial_status">
    <button type="submit" class="btn btn-primary" >Update</button><br><br>

    </form>
    <?php
    //backend for name

      if(isset($_POST['update_martial_status'])){
        
        if (!empty($_POST['martial_status']) || !empty($_POST['date_of_anniversary'])) {
        
          $martial_status = $_POST['martial_status'];
          $date_of_anniversary = $_POST['date_of_anniversary']; 

          $martial_status_query = "UPDATE `alum_master_table` SET `martial_status`='".$martial_status."',`date_of_anniversary`='".$date_of_anniversary."' WHERE `user_email` ='".$user_email."'";
          if($martial_status_result = mysqli_query($con,$martial_status_query)){
            echo "<script>alert('Updation Successful.')</script>";
          }
          else{
            echo "<script>alert('Error in updating martial status.')</script>";
          }
        }
      }
    ?> 

    </div>
    <!--tab2 End-->

    <!--tab3 Start-->
    <div id="tab3" class="tab-content hide text-justify">
    
    <form action="#" method="post">
    <legend>Change Permanent Address</legend>
    
    <!--input for permanent starting address-->
    <label>Starting Address</label><br>
    <textarea class="form-control" id="per_starting_address" name="per_starting_address"></textarea>
  
    <table class="table-condensed">
    
    <tr>
    <!--input for permanent city-->
    <td><label >City </label></td> 
    <td><input id="per_city" name="per_city" placeholder="Indore" required type="text"></td>
    </tr>
    
    <tr>
    <!--input for permanent state-->
    <td><label>State</label></td>  
    <td><input id="per_state" name="per_state" placeholder="MP"required="" type="text"></td>
    </tr>
 
    <tr>
    <!--input for permanent country-->
    <td><label>Country</label></td>  
    <td><input id="per_country" name="per_country" placeholder="India" required type="text"></td>
    </tr>

    <tr>
    <!--input for permanent address pincode-->
    <td><label>Pincode</label></td>
    <td><input id="per_pincode" name="per_pincode" placeholder="452010" type="text"></td>
    </tr>
    
    <tr>
    <!-- Submit Button -->
    <td>
    <input type="hidden" name="update_per_address" value="update_per_address">
    <button type="submit" class="btn btn-primary" >Update Address</button></td>
    </tr>

    </table>
    </form>
    
    <?php
    //backend for permanent Address

      if(isset($_POST['update_per_address'])){
        $per_starting_address = $_POST['per_starting_address'];
        $per_city = $_POST['per_city']; 
        $per_state = $_POST['per_state'];
        $per_country = $_POST['per_country'];
        $per_pincode = $_POST['per_pincode'];


        $per_address_query = "UPDATE `alum_master_table` SET  `per_country`='".$per_country."',`per_state`='".$per_state."',`per_city`='".$per_city."',`per_starting_address`='".$per_starting_address."',`per_pincode`='".$per_pincode."' WHERE `user_email` ='".$user_email."'";
        if($per_address_result = mysqli_query($con,$per_address_query)){
          echo "<script>alert('Updation Successful.')</script>";
        }
        else{
          echo "<script>alert('Error in updating permanent Address.')</script>";
        }
      }
    ?> 


    </div>
    <!-- tab3 end -->
    
    <!-- tab4 Start -->
    <div id="tab4" class="tab-content hide text-justify">
    <form action="#" method="post" style="text-align:left">

    <!-- Form Name -->
    <legend>Change Local Address</legend>

    <!--input for permanent address pincode-->
    <label>Starting Address</label><br>
    <textarea class="form-control" id="local_starting_address" name="local_starting_address"></textarea>
    
    <table class="table-condensed">
    
    <tr>
    <!--input for local address city-->
    <td><label >City </label></td> 
    <td><input id="local_city" name="local_city" placeholder="Indore" required type="text"></td>
    </tr>
  
    <tr>
    <!--input for local address state-->
    <td><label>State</label></td>  
    <td><input id="local_state" name="local_state" placeholder="MP"required="" type="text"></td>
    </tr>
 
    <tr>
    <!--input for local address country-->
    <td><label>Country</label></td>  
    <td><input id="local_country" name="local_country" placeholder="India" required type="text"></td>
    </tr>

    <tr>
    <!--input for local address pincode-->
    <td><label>Pincode</label></td>
    <td><input id="local_pincode" name="local_pincode" placeholder="452010" type="text"></td>
    </tr>
    
    <tr>
    <!-- Submit Button -->
    <td>
    <input type="hidden" name="update_local_address" value="update_local_address">
    <button type="submit" class="btn btn-primary" >Update Address</button></td>
    </tr>

    </table>
    </form>

    <?php
    //backend for local Address

      if(isset($_POST['update_local_address'])){
        $loc_starting_address = $_POST['local_starting_address'];
        $loc_city = $_POST['local_city']; 
        $loc_state = $_POST['local_state'];
        $loc_country = $_POST['local_country'];
        $loc_pincode = $_POST['local_pincode'];


        $loc_address_query = "UPDATE `alum_master_table` SET  `loc_country`='".$loc_country."',`loc_state`='".$loc_state."',`loc_city`='".$loc_city."',`loc_starting_address`='".$loc_starting_address."',`loc_pincode`='".$loc_pincode."' WHERE `user_email` ='".$user_email."'";
        if($loc_address_result = mysqli_query($con,$loc_address_query)){
          echo "<script>alert('Updation Successful.')</script>";
        }
        else{
          echo "<script>alert('Error in updating Local Address.')</script>";
        }
      }
    ?> 

    </div>
    <!-- tab4 end -->

    <!-- tab5 start -->
    <div id="tab5" class="tab-content hide text-justify">
    organisation info
    </div>
    <!-- tab5 ends -->

    <!-- tab6 starts -->    
    <div id="tab6" class="tab-content hide text-justify">
    <!--Update password -->
    <form action="#" method="post">
    <!-- Form Name -->
    <legend>Change Password:</legend>
    
    <!-- input present password -->  
    <label>Present Password</label><br>
    <input id="old_password" name="old_password" required  placeholder="Password" type="password">
    <br>
    <br>

    <!-- input new password -->
    <label >New Password</label><br>
    <input id="new_password" name="new_password" required  placeholder="New Password" type="password">
    <br>
    <br>

    <!-- Password input-->
    <label>Re-enter Password</label><br>
    <input id="re_password" name="re_password" required placeholder="Re-enter Password" type="password">
    <br>
    <br>

    <!--Submit Button-->
    <input type="hidden" name="update_password" value="update_password">
    <button type="submit" class="btn btn-primary" >Update Password</button><br>

    </form>

    <?php
    //backend for password update

      if(isset($_POST['update_password'])){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password']; 
        $re_password = $_POST['re_password'];

        //for obtaining old password
      }
    ?>

    </div>           
            
   <?php endblock(); ?>


 <?php  
 }
 ?>
