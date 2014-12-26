<?php include 'base_template_2_column.php' ?>

	<!-- Starting of block for page heading -->
	<?php startblock('page_heading'); ?>
		<h3> Memories </h3>
	<?php endblock(); ?>
	
	<!-- Starting of block for Sidebar Options -->
	<?php startblock('sidemenu'); ?>

		  <ul class="nav side-tabs nav-pills">
			 <li class="active btn-block"><a class="icon-chevron-sign-right" href="#tab1">  Photos</a></li>
          </ul>
	<?php endblock() ; ?>
	
	<!-- Starting of block for Sidebar Content -->
	<?php startblock('content') ?>			  	  
		<style>
		.gallary{
			height:200px;
			width:500px;
			margin-top:2%}
		</style>
		<div id="tab1"  class="tab-content active">
			<b>Photos</b><br><br />
			<img src="images/Alumni/alum1.jpg" class="gallary"><br>
			<img src="images/Alumni/alum2.jpg" class="gallary"><br>
            <img src="images/Alumni/alum3.jpg" class="gallary"><br>
            <img src="images/Alumni/alum4.jpg" class="gallary"><br>
            <img src="images/Alumni/alum5.jpg" class="gallary"><br>
		</div>
            
   <?php endblock(); ?>