<?php $this->load->view('template/header'); ?>

<div class="col-md-8" id="postContent" style="background: #c9af7c; padding: 20px;">
	<div><h2 style="font-weight: bold;">যোগাযোগ</h2>
		<img style="position: relative; right: -230px;" src="<?php echo base_url(); ?>my_assets/img/contact.JPG" alt="human" height="200" width="400">
	</div>

	<div><p id="posts" style="background: none; text-align: block;"><?php echo $contact_blog->contact; ?></p></div>

	<div class="col-md-8" id="contactForm" style="position: relative; left: 190px;">
		<h4 style="text-align: center; text-decoration: underline;">যোগাযোগের ঠিকানা</h4>
		<p style="font-weight: bold;">অফিসঃ <small style="font-size: 12px;">গনক পাড়ার মোড়,সাহেব বাজার, রাজশাহী।</small></p>
		<p style="font-weight: bold;">ইমেইলঃ <small style="font-size: 12px;"><a>kothar_mela-bd@gmail.com</a></small></p>
		<p style="font-weight: bold;">মোবাইলঃ <small style="font-size: 13px;"><B>+880168-3909417</B></small></p>
	</div>
</div>

<?php $this->load->view('template/sideNotice'); ?>
<?php $this->load->view('template/footer'); ?>
