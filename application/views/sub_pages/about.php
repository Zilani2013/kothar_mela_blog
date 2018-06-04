
<?php $this->load->view('template/header'); ?>

<div class="col-md-8" id="postContent" style="padding: 30px; background: #cbcc92;">
	<div><u><h3><B>ব্লগ, ব্লগিং এবং ব্লগার সম্পর্কে কিছু কথা :</B></h3></u></div><br>
	<div><img style="float: right; padding: 8px; margin-bottom: 10px; position: relative; bottom: -17px; right: -10px;" src="<?php echo base_url(); ?>my_assets/img/my.JPG" alt="human" height="220" width="260"></div>
	<div><p style="text-align: justify; background: none;" id="posts"><?php echo $about_blog->about_blog; ?></p><br></div>	
</div>

<?php $this->load->view('template/sideNotice'); ?>
<?php $this->load->view('template/footer'); ?>
