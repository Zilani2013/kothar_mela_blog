<?php $this->load->view('admin/template/header'); ?>

<div class="container-fluid" id="profile_body">
	<div class="row" id="postContent3">
		<div class="col-md-4" id="pro_pic">
			<img class="img-circle" src="<?php echo base_url().$all->profile_image; ?>" alt="Admin Picture" width="220px;" height="240px;">
		</div>
		<!-- <div id="vl">Details</div> -->
		<div class="col-md-6" id="pro_info">
			<span class="pro_style">Name:&nbsp;&nbsp;&nbsp;&nbsp; <a><?php echo $all->name; ?></a></span>
			<span class="pro_style">Email:&nbsp;&nbsp;&nbsp;&nbsp; <a><?php echo $all->email; ?></a></span>
			<span class="pro_style">Gender:&nbsp; <a><?php echo $all->gender; ?></a></span>
			<span class="pro_style">Country: <a><?php echo $all->country; ?></a></span>
			<span class="pro_style">Phone:&nbsp;&nbsp;&nbsp;<a>+880172-5106754</a></span>

		</div>
	</div>
</div>


<script src="<?php echo base_url(); ?>my_assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>my_assets/js/jquery-3.3.1.js"></script>


<!-- <script>
	$(document).ready(function() {
		$('#postContent3').on( {

			mouseenter: function() {
				$(this).animate( { 
					top:'250px' ,
					left: '200px'

				});

				$('#pro_pic,#pro_info').css('border-radius', '100px');
				$('#pro_pic,#pro_info').fadeOut('1000');
			},

			mouseleave: function() {
				// $('#pro_pic,#pro_info').css('border-radius', '100px');
				$('#pro_pic,#pro_info').fadeIn('1000');
			}

		});
	});
</script> -->


</body>
</html>