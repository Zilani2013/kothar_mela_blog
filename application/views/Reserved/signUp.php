<?php include('template/header.php'); ?>


<!-- content -->
<div class="col-md-8" id="postContent" style="padding: 20px;">
	<div><h2>Comeplete Your Registration</h2></div>
	<br>
	<!-- <div class="col-sm-offset-1"> -->
		
		<form action="<?php echo base_url(); ?>main_control/submit_reg" method="POST" class="form-horizontal">
		  <div class="form-group">
		    <label for="name" class="col-sm-3 control-label">Your Name<span style="color: red; font-weight: bold;">*</span></label>
		    <div class="col-sm-6">
		      <input type="name" name="name" class="form-control" id="name" placeholder="আপনার নাম" value="<?php echo set_value('name'); ?>">
		      <span style="color: red;">  <?php echo form_error('name'); ?></span>		      
		    </div>
		  </div>

			<!-- email -->
		  <div class="form-group">
		    <label for="email" class="col-sm-3 control-label">Your Email<span style="color: red; font-weight: bold;">*</span></label>

		    <div class="col-sm-6">
		      <input type="email" class="form-control" id="email" name="email" placeholder="আপনার ইমেইল" value="<?php echo set_value('email'); ?>">
		      <!-- if email field has error -->
		      <span style="color: red;"><?php echo form_error('email'); ?></span>
		      <span style="color: red;"></span>
		      
		      
		    </div>
		  </div>

		  <!-- password -->
  		  <div class="form-group">
		    <label for="password" class="col-sm-3 control-label">Password<span style="color: red; font-weight: bold;">*</span></label>
		    <div class="col-sm-6">
		      <input type="password" name="password" class="form-control" id="password" placeholder="পাসওয়ার্ড">
		      <!-- if password field is empty --></span>
		    </div>
		  </div>

		  <!-- gender -->
		  <div class="form-group">
		    <label for="gender" class="col-sm-3 control-label">Gender<span style="color: red; font-weight: bold;">*</span></label>
		    <select name="gender" class="col-sm-10 form-control" id="gender" style="width: 45.5%; margin-left: 15px;"><!-- if gender has error -->
		      <option disabled="disabled" selected="select">একটি ঠিক করুন</option>
		      <option>Male</option>
		      <option>Female</option>
		    </select>
		  </div>

		  <!-- country -->
		  <div class="form-group">
		    <label for="country" class="col-sm-3 control-label">Country</label>
		    <div class="col-sm-6">
		      <input type="text" name="country" class="form-control" id="country" placeholder="আপনার দেশ" value="<?php echo set_value('country'); ?>">
		    </div>
		  </div>

		  <div class="form-group">
		    <div class="col-sm-offset-3 col-sm-6">
		      <button type="submit" class="btn btn-primary btn-block" name="reg">সাবমিট</button>
		    </div>
		  </div>
		</form>
		<br><br>
</div>


<?php include('template/sideNotice.php'); ?>
<?php include('template/footer.php'); ?>