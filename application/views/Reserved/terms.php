<?php $this->load->view('template/header'); ?>

<!-- content -->
<div class="col-md-8" id="postContent" style="background: #f7bdaa; padding: 20px;">
	<strong><B><h2>ব্লগ ব্যবহারের নিয়মাবলী –</h2></B></strong>
	<ol id="posts" style="text-align: justify; font-size: 15px; background: none; list-style: none; position: relative; top: -30px;">
		<img style="float: right; position: relative; top: 120px; right: -10px;" src="<?php echo base_url(); ?>my_assets/img/t&c.jpg" alt="terms & condition" height="250" width="250">
		<li><?php echo $terms_blog->terms; ?></li>
	</ol>
</div>

<?php $this->load->view('template/sideNotice'); ?>
<?php $this->load->view('template/footer'); ?>