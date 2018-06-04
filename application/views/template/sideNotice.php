<div class="col-md-2 pull-right"> 
  <div id="notice"><h4><i class="fa fa-bell">&nbsp;Your Profile</i></h4><br>

  <?php if($this->session->userdata('email')) : ?>
    <?php $image = $profile['profile_image']; ?>
      <?php if(!$image) : ?>
        <form class="form-inline" action="<?php echo base_url(); ?>main_control/upload_profile_pic" method="POST" enctype="multipart/form-data">
        <h5 class="profileHeader">Upload Your Profile Picture</h5>
        <small class="proTag" style="">Only jpg,png,jpeg are allowed.</small>
          <input type="file" name="image" class="btn btn-info btn-sm files">
          <em style="font-size: 2px;"><?php if(isset($error)) echo $errors; ?></em>
          <button type="submit" name="profile" class="proBtn btn btn-info btn-sm">upload</button>
        </form>
      <?php endif; ?>
     
        
      <?php if($image) : ?>
        
        <img style="margin-left: -20px;" src="<?php echo base_url().$image; ?>" alt="Users Picture" class="img-circle users_pic" height="110px;" width="110px;">&nbsp;&nbsp;&nbsp;&nbsp;<br>
        <button style="position: relative; left: 100px; top: -16px; font-size: 12px;" class="editing">edit</button>
      	<form style="display: none;" action="<?php echo base_url(); ?>main_control/edit_profile_pic" method="POST" class="edit_profile_picture" enctype="multipart/form-data">
      			<input type="file" name="image" class="files2 btn btn-info btn-sm">
      		  <input type="submit" name="edit_profile" class="proBtn2 btn btn-info btn-sm" value="upload">
      	</form>&nbsp;&nbsp;
        <B style="position: relative; right: 10px; top: 5px;"><?php if($this->session->flashdata('image')) { echo $this->session->flashdata('image'); } ?></B>
      <?php endif; ?>
      <br><br>
    <!--End of if profile picture not available -->

        <!-- showing user profile -->
        <p class="profile">Name: <span><?php echo $profile['name']; ?></span></p>
      	<p class="profile">Email: <span><?php echo $profile['email']; ?></span></p>
      	<p class="profile">Gender: <span><?php echo $profile['gender']; ?></span></p>
      	<p class="profile">Country: <span><?php echo $profile['country']; ?></span></p>       
      	<p class="profile">Total Post: &nbsp;<span><?php echo $total_posts.' '.'টি'; ?></span></p>
		    <br>
  <?php else : ?>
<!-- if user not loggedin-->
		<p style="font-size: 10px;">আপনার প্রোফাইল দেখার জন্যে দয়া করে <a>লগইন</a><B class="glyphicon glyphicon-arrow-up" style="font-size: 20px; font-weight: bold;"></B> করুন।</p>
  <?php endif; ?>

  </div>
</div>



</div><!-- container-fluid four from header-->
