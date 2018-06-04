<?php $this->load->view('admin/template/header'); ?>

<!-- main content -->
<div class="col-md-9" id="postContent2">
  <div style="background: #6d6d67; width: 107.7%; padding: 2px; position: relative; left: -41px;"><h1 style="text-align: center; color: #7ad395; font-weight: bold; font-style: italic;">Your Posts On Blog</h1>
  </div>

  <?php if($this->session->flashdata('deleted')) : ?>
    <div class="alert alert-success alert-dismissible" style="position: relative; top: 50px; right: -380px; width: 50%">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong><?php echo $this->session->flashdata('deleted'); ?></strong>
    </div>
  <?php endif; ?>

  <?php foreach($user_posts as $singlePosts) : ?>
<br>
    <div class="pull-right" style="margin-top: 20px; margin-left: 20px;">
      <a class="userEdit btn btn-info btn-sm" href="<?php echo base_url(); ?>admin_control/edit_admin_posts/<?php echo $singlePosts->post_table_id; ?>">Edit</a>&nbsp;
      <strong><a class="userEdit btn btn-danger btn-sm" href="<?php echo base_url(); ?>admin_control/delete_admin_post/<?php echo $singlePosts->post_table_id; ?>" onclick="return confirm('Are you sure?')">Delete</a></strong>
    </div>



    <div>
      <h3 style="text-align: center;"><a style="font-weight: bold; font-size: 18px; color: #3c896d; margin-left: 130px;" href="<?php echo base_url(); ?>admin_control/readmore/<?php echo $singlePosts->post_table_id; ?>" style="color: #3c896d;"><?php echo $singlePosts->post_title; ?></a></h3>
        <p style="color: #493e3e; text-align: center;">ক্যাটাগরি&mdash;&nbsp;<a><?php echo $singlePosts->post_category; ?></a>&nbsp;&nbsp;&nbsp;লিখেছেনঃ&nbsp;<a><?php echo $singlePosts->name; ?></a><em>&nbsp;&nbsp;&nbsp;সময়ঃ&nbsp;<?php echo $singlePosts->post_time; ?></em></p>              
    </div>



    <!--check if image exists-->
    	<?php if(!$singlePosts->post_image) : ?>
          <p style="display: none;"></p>
      <?php else : ?>
     <!-- post image -->
      <div>
          <img style="position: relative; left: 220px;" src="<?php echo base_url().$singlePosts->post_image; ?>" name="image" height="300px;" width="600px;">

      </div>
    	<?php endif; ?>

<br>

      <div>
        <p id="posts3" style="text-align: justify;">
          <?php 
            $content = $singlePosts->post_content;
            if(strlen($content) > 1500 ) {
              $substring = substr($content,0,1000);
              echo $substring.'......';
            } else {
              echo $content;
            }

            $postid = $singlePosts->post_table_id;

            echo "...<a href='".base_url()."admin_control/readmore/$postid'>&nbsp;readmore</a>";
          ?>
        </p>
  	</div>
<br>

    <div id="totalComments" class="pull-right" style="display: none;"><a><!-- users posts total comments --></a></div>

<br><br><hr style="border: 1px solid #aaa; width: 50%;"><br><br><br>

  <?php endforeach; ?>
  
    <div class="pagination2"><?php echo $links; ?></div>
<br>

</div>

   
<?php $this->load->view('admin/template/footer'); ?>

