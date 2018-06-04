<?php  $this->load->view('admin/template/header'); ?>


<div class="col-md-9" id="postContent2">
    <?php foreach ($full_post as $single_post) : ?>
		<?php $postid = $single_post->post_table_id; ?>
		<a href="<?php echo base_url(); ?>admin_control/delete_post/<?php echo $postid; ?>" type="submit" class="btn btn-danger btn-sm" style="position: relative; left: 980px; top: 20px;"><i style="font-size: 14px;" class="fa fa-trash"></i>&nbsp;Delete Post</a>
		<br>

	    <div>
	      <h3 style="color: #3c896d; text-align: center;"><a style="font-weight:bold; font-size: 26px; color: #3c896d;" href="#!"><?php echo $single_post->post_title; ?></a></h3>
	        <p style="color: #493e3e; text-align: center;">ক্যাটাগরি:&nbsp;<a><?php echo $single_post->post_category; ?>&raquo;</a>&nbsp;লিখেছেন&mdash;&nbsp;<em><a href="#!"><?php echo $single_post->name; ?></a>&nbsp;&nbsp;<?php echo $single_post->post_time; ?></em></p>
	    </div>


	    
	    <div>
	        <?php if(!$single_post->post_image) : ?>

	        <?php else : ?>
	            <img style="position: relative; left: 220px;" src="<?php echo base_url().$single_post->post_image; ?>" name="image" height="300px;" width="600px;">
	        <?php endif; ?>
	    </div>

	    <br>

	    <div>
	    	<p id="posts2" style="text-align: justify; font-size: 16px;"><?php echo $single_post->post_content; ?></p>
	    </div>

	<br><br>
	    <?php $postid = $single_post->post_table_id; ?>

	    
	  <?php include('comments.php'); ?>


<?php endforeach; ?>
</div>



<?php $this->load->view('admin/template/footer'); ?>