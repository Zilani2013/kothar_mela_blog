<?php $this->load->view('admin/template/header'); ?>


<div class="col-md-6" id="postContent2" style="background: #bcbb8b; position: relative; top: 50px;">
	<div>
		<form action="<?php echo base_url(); ?>admin_control/submit_post_data" method="POST" class="form-horizontal" enctype="multipart/form-data">

		  <!-- category -->
	  		<div class="form-group">	  			
	    		<label for="categories" class="col-sm-3 control-label">Post Category<span style="color: red; font-weight: bold;">*</span></label>				
		    	<select name="postCategory" class="col-sm-9	form-control" style="width: 72%; margin-left: 14px;" data-style="btn-primary">
				      <option disabled="disabled" selected="select">--Choose one category--</option>
				      <option <?php if($this->session->userdata('postCategory') == 'গল্প') { echo 'selected'; $this->session->unset_userdata('postCategory'); } ?>>গল্প</option>

				      <option <?php if($this->session->userdata('postCategory') == 'ভ্রমণ') { echo 'selected'; $this->session->unset_userdata('postCategory'); } ?>>ভ্রমণ</option>

				      <option <?php if($this->session->userdata('postCategory') == 'কবিতা') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>কবিতা</option>

				      <option <?php if($this->session->userdata('postCategory') == 'জীবন') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>জীবন</option>

				      <option <?php if($this->session->userdata('postCategory') == 'ইতিহাস') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>ইতিহাস</option>

				      <option <?php if($this->session->userdata('postCategory') == 'সাহিত্য') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>সাহিত্য</option>

				      <option <?php if($this->session->userdata('postCategory') == 'বিজ্ঞান') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>বিজ্ঞান</option>

				      <option <?php if($this->session->userdata('postCategory') == 'মিডিয়া') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>মিডিয়া</option>

				      <option <?php if($this->session->userdata('postCategory') == 'বিনোদন') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>বিনোদন</option>

				      <option <?php if($this->session->userdata('postCategory') == 'রাজনীতি') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>রাজনীতি</option>

				      <option <?php if($this->session->userdata('postCategory') == 'অর্থনীতি') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>অর্থনীতি</option>

				      <option <?php if($this->session->userdata('postCategory') == 'খেলাধুলা') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>খেলাধুলা</option>

				      <option <?php if($this->session->userdata('postCategory') == 'সাম্প্রতিক খবর') { echo 'selected'; $this->session->unset_userdata('postCategory');  $this->session->unset_userdata('postCategory'); } ?>>সাম্প্রতিক খবর</option>

				      <option <?php if($this->session->userdata('postCategory') == 'শিল্প ও সংস্কৃতি') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>শিল্প ও সংস্কৃতি</option>

				      <option <?php if($this->session->userdata('postCategory') == 'টিপস ও ট্রিক্স') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>টিপস ও ট্রিক্স</option>

				      <option <?php if($this->session->userdata('postCategory') == 'কম্পিউটার ও প্রোগ্রামিং') { echo 'selected'; $this->session->unset_userdata('postCategory');  } ?>>কম্পিউটার ও প্রোগ্রামিং</option>
		    	</select>
		  	</div>
		  	<span style="color: red; position: relative; left: 190px;"><?php echo form_error('postCategory'); ?></span>
		    	



		  	<!-- post title -->
		  	<div class="form-group">
			    <label for="title" class="col-sm-3 control-label">Post Title<span style="color: red; font-weight: bold;">*</span></label>
			    <div class="col-sm-9">
			      	<input type="text" name="title" class="form-control" id="title" placeholder="পোস্ট টাইটেল" value="<?php echo set_value('title'); ?>">
			      	<span style="color: red;; position: relative; left: -90px;"><?php echo form_error('title'); ?></span>
			    </div>
		  	</div>



			<!-- post image -->
  		  	<div class="form-group">
		    	<label class="col-sm-3 control-label">Post Image</label>
		    	<div class="col-sm-9">
		    		<span style="color: #c6321b; font-weight: bold; font-size: 12px;"></span>
		      		<input type="file" name="image" class="form-control" value="">
		      		<span style="color: #5e4a4a;"><?php if(isset($error)) echo $error; ?></span>
		      		<span style="font-weight: bold; position: relative; left: -90px;">Only jpg,png,gif,jpeg Files are allowed</span>
		    	</div>
		  	</div>
			


			<!-- post content -->
    	  	<div class="form-group">
		    	<label for="post" class="col-sm-3 control-label">Post Content<span style="color: red; font-weight: bold;">*</span></label>
		    	<div class="col-sm-9">
		      		<textarea name="post_content" id="post" class="form-control" cols="30" rows="15"></textarea>
		      		<span style="color: red;; position: relative; left: -90px;"><?php echo form_error('post_content'); ?></span>
		    	</div>
		  	</div>



		  	<div class="form-group">
		    	<div class="col-sm-offset-2 col-sm-9">
		      		<button type="submit" class="btn btn-primary btn-block" name="addpost">Submit Post</button>
		    	</div>
		  	</div>


		</form>
	</div>
</div>


<?php $this->load->view('admin/template/footer'); ?>