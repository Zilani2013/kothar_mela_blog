<?php $this->load->view('admin/template/header'); ?>

<!-- content -->
<div class="col-md-8" id="postContent2" style="background: #f7bdaa; padding: 20px; position: relative; top: 40px;">
	<div style="background: #6d6d67; width: 103.7%; padding: 2px; position: relative; top: -22px; left: -20px;"><h1 style="text-align: center; color: #7ad395; font-weight: bold; font-style: italic;">Blog Terms</h1></div>
	<a href="<?php echo base_url(); ?>admin_control/edit_terms" class="col-offset-3 pull-right btn btn-info btn-sm" style="font-weight: bold; font-size: 10px; position: relative; right: 10px; top: 20px;">Edit</a>
	<strong><B><h2>ব্লগ ব্যবহারের নিয়মাবলী –</h2></B></strong>
		<ol id="posts" style="text-align: justify; font-size: 15px; background: none; list-style: none; position: relative; top: -30px;">
			<img style="float: right; position: relative; top: 120px; right: -10px;" src="<?php echo base_url(); ?>my_assets/img/t&c.jpg" alt="terms & condition" height="250" width="250">
			<li><?php echo $terms->terms; ?></li>
		</ol>
</div>


<?php $this->load->view('admin/template/footer'); ?>