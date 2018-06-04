<?php $this->load->view('admin/template/header'); ?>

<div class="col-md-6" id="postContent2" style="background: #bcbb8b; position: relative; top: 50px;">
	<div>
		<form action="<?php echo base_url(); ?>admin_control/update_about" method="POST" class="form-horizontal" enctype="multipart/form-data">
			<!-- post content -->
    	  	<div class="form-group">
		    	<label for="post" class="col-sm-3 control-label">About Blog</label>
		    	<div class="col-sm-9">
		      		<textarea name="about" id="post" class="form-control" cols="30" rows="23"><?php echo $about; ?></textarea>
		    	</div>
		  	</div>	

		  	<input type="hidden" name="editing" value="<?php echo $all->id; ?>" > <!--postid-->

		  	<div class="form-group">
		    	<div class="col-sm-offset-2 col-sm-9">
		      		<button type="submit" class="btn btn-primary btn-block" name="editPost">আপডেট করুন</button>
		    	</div>
		  	</div>

		</form>
	</div>
</div>

<?php $this->load->view('admin/template/footer'); ?>