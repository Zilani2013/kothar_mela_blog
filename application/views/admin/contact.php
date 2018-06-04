<?php $this->load->view('admin/template/header'); ?>
<!-- content -->
<div class="col-md-7" id="postContent2" style="background: none; padding: 20px; position: relative; top: 50px; right: -230px; width: 75%">
	<div style="background: #6d6d67; width: 118.2%; padding: 2px; position: relative; top: -40px; left: -50px;">
		<h1 style="text-align: center; color: #7ad395; font-weight: bold; font-style: italic;">Contact Us</h1>
	</div>

	<a href="<?php echo base_url(); ?>admin_control/edit_contact" class="col-offset-3 pull-right btn btn-info btn-sm" style="font-weight: bold; font-size: 10px; position: relative; right: -80px; top: 20px;">Edit</a><br>

	<div>
		<h2 style="font-weight: bold; text-align: center;">যোগাযোগ</h2>
		<img style="position: relative; right: -300px;" src="<?php echo base_url(); ?>my_assets/img/contact.JPG" alt="human" height="200" width="400">
	</div>

	<div>
		<p id="posts" style="background: none; font-weight: bold; text-align: block; position: relative; right: -90px;"><?php echo $contact->contact; ?></p>
	</div>
	
	<!--contact form-->
	<div class="col-md-8" id="contactForm" style="position: relative; left: 250px;">
		<h4 style="text-align: center; text-decoration: underline;">যোগাযোগের ঠিকানা</h4>
		<p style="font-weight: bold;">অফিসঃ <small style="font-size: 12px;">গনক পাড়ার মোড়,সাহেব বাজার, রাজশাহী।</small></p>
		<p style="font-weight: bold;">ইমেইলঃ <small style="font-size: 12px;"><a>kothar_mela-bd@gmail.com</a></small></p>
		<p style="font-weight: bold;">মোবাইলঃ <small style="font-size: 13px;"><B>+880168-3909417</B></small></p>
	</div>
</div>


<?php $this->load->view('admin/template/footer'); ?>