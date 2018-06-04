<?php $this->load->view('template/header'); ?>

<!-- main content -->
<div class="col-md-8" id="postContent">
<?php foreach($user_posts as $singlePosts) : ?>
    <!--check if user logged in then show edit and delete buttons-->
    <?php if($this->session->userdata('email')) : ?>
        <div class="pull-right" style="margin-top: 20px; margin-left: 20px;">
          <a class="userEdit btn btn-info btn-sm" href="edit_user_posts/<?php echo $singlePosts->post_table_id; ?>">Edit</a>&nbsp;
          <a class="userEdit btn btn-danger btn-sm" href="delete_user_posts/<?php echo $singlePosts->post_table_id; ?>">Delete</a>
        </div>
    <?php endif; ?>
   <!--check if user logged in then show edit and delete buttons-->



    <div>
      <h3 style="color: #3c896d; text-align: center;"><a style="font-weight: bold; font-size: 16px; color: #3c896d; position: relative; right: -30px;" href="<?php echo base_url(); ?>main_control/readmore/<?php echo $singlePosts->post_table_id; ?>"><?php echo $singlePosts->post_title; ?></a></h3>              
        <p style="color: #493e3e; text-align: center; position: relative; left: -20px;">ক্যাটাগরি&raquo;&nbsp;<a><?php echo $singlePosts->post_category; ?></a>&nbsp;&nbsp;&nbsp;লিখেছেন&raquo;&nbsp;<a><?php echo $singlePosts->name; ?></a><em>&nbsp;&nbsp;&nbsp;সময়ঃ&nbsp;<?php echo $singlePosts->post_time; ?></em></p>
    </div>



  <!--check if image exists-->
  <?php if(!$singlePosts->post_image) : ?>
        <p style="display: none;"></p>
  <?php else : ?>
    <div>
        <img style="position: relative; left: 110px;" src="<?php echo base_url().$singlePosts->post_image; ?>" name="image" height="300px;" width="600px;">
    </div>
  <?php endif; ?>

<br>

    <div>
      <p id="posts1" style="text-align: justify;">
        <?php 
          $content = $singlePosts->post_content;
          if(strlen($content) > 1500 ) {
              $substring = substr($content,0,1000);
              echo $substring.'......';
          } else { echo $content; }

          $postID = $singlePosts->post_table_id;
          echo "...<a href='".base_url()."main_control/readmore/$postID'>&nbsp;বাকিটুকু পড়ুন</a>";
        ?>
      </p>
    </div>



    <div id="totalComments" class="pull-right" style="display: none;"><a style="display: ;"></a></div>
<br><br><hr style="border: 1px solid #aaa; width: 50%;"><br><br><br>
<?php endforeach; ?>

  
    <div class="pagination2"><?php echo $links; ?></div>
<br>
</div>

<?php $this->load->view('template/sideNotice'); ?>
<?php $this->load->view('template/footer'); ?>

