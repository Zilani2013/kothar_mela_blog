<?php $this->load->view('admin/template/header'); ?>

<div class="col-md-9" id="postContent2">
	<div style="background: #6d6d67; width: 107.7%; padding: 2px; position: relative; left: -41px;">
		<h1 style="text-align: center; color: #7ad395; font-weight: bold; font-style: italic;">About Blog</h1>
	</div>

<br>

	<a href="<?php echo base_url(); ?>admin_control/edit_about" class="col-offset-3 pull-right btn btn-info btn-sm" style="font-weight: bold; font-size: 10px; position: relative; right: -20px; top: -10px;">Edit</a>
<br>

	<div>
		<img style="float: right; padding: 8px; position: relative; right: -20px; bottom: -10px;" src="<?php echo base_url(); ?>my_assets/img/my.JPG" alt="human" height="220" width="200">
	</div>

	<div>
		<p style="text-align: justify; background: none; padding: 30px;" id="posts"><?php echo $about->about_blog; ?></p><br>
	</div>
</div>



<?php $this->load->view('admin/template/footer'); ?>