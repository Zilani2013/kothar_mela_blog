<?php $this->load->view('admin/template/header'); ?>


<div class="col-md-9" id="postContent2">
	<div id="post_tag"><h1>All Posts Of Blog</h1></div>

	<?php if($this->session->flashdata('deleted')) : ?>
	<div class="alert alert-success alert-dismissible" style="position: relative; top: 50px; right: -380px; width: 50%">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong><?php echo $this->session->flashdata('deleted'); ?></strong>
	</div>
	<?php endif; ?>

<?php foreach ($allPosts as $post) : ?>
	<div class="col-md-10 col-md-offset-2" id="allPostbody">
        <div id="title">
            <h3><a id="title_link" href="<?php echo base_url(); ?>admin_control/readmore/<?php echo $post->post_table_id; ?>" style="color: #3c896d;"><?php echo $post->post_title; ?></a></h3>
            <p id="pre_tag">Category&nbsp;&raquo;
            	<a><?php echo $post->post_category; ?></a>
            	&nbsp;&nbsp;&nbsp;Written By&nbsp;&raquo;
            	<em><a><?php echo $post->name; ?></a>&nbsp;&nbsp;Posted On: <a><?php echo $post->post_time; ?></a></em>
            </p>          
  	    </div>
<br>

        <div>
          <?php if(!$post->post_image) : ?>
            <p style="display: none;"></p>            
          <?php else : ?>
            <img id="post_image" style="" src="<?php echo base_url().$post->post_image; ?>" name="image" height="300px;" width="600px;">
          <?php endif; ?>
        </div>
        
<br>

        <div>
            <p id="posts3" style="text-align: justify;">
              <?php 
                  $content = $post->post_content;

                  if(strlen( $content) > 1500) {
                      $substring = substr($content,0,1000);
                      echo $substring.'....';
                  } else {

                        echo $content;
                      }

                  $postID = $post->post_table_id;

                  echo "...<a href='".base_url()."admin_control/readmore/$postID'>&nbsp;readmore</a>";
                ?>
            </p>
        </div>
		
<br><hr style="border: 1px solid #abc; width: 50%;">
	</div>
<?php endforeach; ?>

	<div class="row">
		<div class="col-md-8 col-md-offset-3">
			<div class="pagination2" style="position: relative; left: -80px;"><?php echo $page_links; ?></div>
		</div>	
	</div>
</div>		



<?php $this->load->view('admin/template/footer'); ?>