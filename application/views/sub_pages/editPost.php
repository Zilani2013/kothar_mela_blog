<?php $this->load->view('template/header'); ?>

<!-- content -->
<div class="col-md-8" id="postContent" style="background: #bcbb8b;">
<?php foreach($post_data as $singlepost) : ?>
	<div>
		<form action="<?php echo base_url(); ?>main_control/update_post" method="POST" class="form-horizontal" enctype="multipart/form-data">
	 	 	<!-- category -->
		  	<div class="form-group">
		    	<label for="categories" class="col-sm-2 control-label">পোস্ট ক্যাটাগরি <span style="color: red; font-weight: bold;">*</span></label>
		    	<select name="postCategory" class="col-sm-9	form-control" style="width: 71.5%; margin-left: 14px;" data-style="btn-primary">
					<option disabled="disabled" selected="select">একটি ঠিক করুন</option>
					<option <?php if($singlepost->post_category == 'গল্প') { echo 'selected'; } ?> >গল্প</option>
					<option <?php if($singlepost->post_category == 'ভ্রমণ') { echo 'selected'; } ?> >ভ্রমণ</option>
					<option <?php if($singlepost->post_category == 'কবিতা') { echo 'selected'; } ?> >কবিতা</option>
					<option <?php if($singlepost->post_category == 'জীবন') { echo 'selected'; } ?> >জীবন</option>
					<option <?php if($singlepost->post_category == 'ইতিহাস') { echo 'selected'; } ?> >ইতিহাস</option>
					<option <?php if($singlepost->post_category == 'সাহিত্য') { echo 'selected'; } ?> >সাহিত্য</option>
					<option <?php if($singlepost->post_category == 'বিজ্ঞান') { echo 'selected'; } ?> >বিজ্ঞান</option>
					<option <?php if($singlepost->post_category == 'মিডিয়া') { echo 'selected'; } ?> >মিডিয়া</option>
					<option <?php if($singlepost->post_category == 'বিনোদন') { echo 'selected'; } ?> >বিনোদন</option>
					<option <?php if($singlepost->post_category == 'রাজনীতি') { echo 'selected'; } ?> >রাজনীতি</option>
					<option <?php if($singlepost->post_category == 'অর্থনীতি') { echo 'selected'; } ?> >অর্থনীতি</option>
					<option <?php if($singlepost->post_category == 'খেলাধুলা') { echo 'selected'; } ?> >খেলাধুলা</option>
					<option <?php if($singlepost->post_category == 'সাম্প্রতিক') { echo 'selected'; }?> >সাম্প্রতিক</option>
					<option <?php if($singlepost->post_category == 'শিল্প ও সংস্কৃতি') { echo 'selected'; }?> >শিল্প ও সংস্কৃতি</option>
					<option <?php if($singlepost->post_category == 'টিপস ও ট্রিক্স') { echo 'selected'; } ?>>টিপস ও ট্রিক্স</option>
					<option <?php if($singlepost->post_category == 'কম্পিউটার ও প্রোগ্রামিং') { echo 'selected'; } ?>>কম্পিউটার ও প্রোগ্রামিং</option>		      
		    	</select>
		  	</div>

		  	<!-- post title -->
		  	<div class="form-group">
		    	<label for="title" class="col-sm-2 control-label">পোস্ট টাইটেল <span style="color: red; font-weight: bold;">*</span></label>
		    	<div class="col-sm-9">
		      		<input type="text" name="title" class="form-control" id="title" placeholder="পোস্ট টাইটেল" value="<?php echo $singlepost->post_title; ?>">
		    	</div>
		  	</div>

			<!-- post image -->
  		  	<div class="form-group">
		    	<label for="image" class="col-sm-2 control-label">পোস্ট ইমেজ</label>
		    	<div class="col-sm-9">
		      		<input type="file" name="image" class="form-control" id="image">
		    		<span style="color: #c6321b; font-weight: bold; font-size: 12px;"><?php if(isset($error)) echo $error; ?></span>
		    	</div>
		  	</div>
			
			<!-- post content -->
    	  	<div class="form-group">
		    	<label for="post" class="col-sm-2 control-label">আপনার পোস্ট <span style="color: red; font-weight: bold;">*</span></label>
		    	<div class="col-sm-9">
		      		<textarea name="post_content" id="post" class="form-control" cols="30" rows="20"><?php echo $singlepost->post_content; ?></textarea>
		    	</div>
		  	</div>		  	

		  	<input type="hidden" name="editing" value="<?php $post_id = $singlepost->id; echo $post_id; ?>" > <!--postid-->

		  	<div class="form-group">
		    	<div class="col-sm-offset-2 col-sm-9">
		      		<button type="submit" class="btn btn-primary btn-block" name="editPost">আপডেট করুন</button>
		    	</div>
		  	</div>

		</form>
	</div>
<?php endforeach; ?>
</div>


<?php $this->load->view('template/sideNotice'); ?>
<?php $this->load->view('template/footer'); ?>