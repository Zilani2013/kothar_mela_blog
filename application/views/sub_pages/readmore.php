<?php $this->load->view('template/header.php'); ?>

<div class="col-md-8 col-sm-8 col-xs-12" id="postContent" style="padding: 50px;">
    <?php foreach ($full_post as $single_post) : ?>

    <div>
      <h3 style="color: #3c896d; text-align: center;"><a style="font-weight:bold; font-size: 20px; color: #3c896d;" href="#!"><?php echo $single_post->post_title; ?></a></h3>
        <p style="color: #493e3e; text-align: center;">ক্যাটাগরি:&nbsp;<a><?php echo $single_post->post_category; ?>&raquo;</a>&nbsp;লিখেছেন&mdash;&nbsp;<em><a href="#!"><?php echo $single_post->name; ?></a>&nbsp;&nbsp;<?php echo $single_post->post_time; ?></em></p>
    </div>
   
    <div>
        <?php if(!$single_post->post_image) : ?>
            <!-- show nothing -->
        <?php else : ?>
            <img style="position: relative; left: 105px;" src="<?php echo base_url().$single_post->post_image; ?>" name="image" height="400px;" width="600px;">
        <?php endif; ?>
    </div>
<br>

    <div><p id="posts" style="text-align: justify; font-size: 14px;"><?php echo $single_post->post_content; ?></p></div>

<br><br>

    <?php $postid = $single_post->post_table_id; ?>

    
<?php include('userComments.php'); ?>


<?php endforeach; ?>
</div>


<?php $this->load->view('template/sideNotice'); ?>
<?php $this->load->view('template/footer'); ?>





