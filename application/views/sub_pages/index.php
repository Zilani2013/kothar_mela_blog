<?php $this->load->view('template/header'); ?>


<!-- main content -->
<div class="col-sm-12 col-xs-8 col-md-8" id="postContent" style="padding: 40px; position: relative;">
    <?php foreach ($postdata as $singledata) : ?>
        <div>
            <h3 style="color: #3c896d; text-align: center;"><a style="font-weight:bold; font-size: 28px; color: #3c896d;" href="<?php echo base_url(); ?>main_control/readmore/<?php echo $singledata->post_table_id; ?>" style="color: #3c896d;"><?php echo $singledata->post_title; ?></a></h3>

            <p style="color: #493e3e; text-align: center;">ক্যাটাগরি&raquo;&nbsp;<a><?php echo $singledata->post_category; ?></a>&nbsp;&nbsp;&nbsp;লিখেছেন&raquo;&nbsp;<em><a><?php echo $singledata->name; ?></a>&nbsp;&nbsp;সময়&raquo;&nbsp;&nbsp;<?php echo $singledata->post_time; ?></em></p>       
        </div>
        <br>
    
    <!--check if image exists-->
    <?php if(!$singledata->post_image) : ?>
            <small style="display: none;">No image</small>
    <?php else : ?>
        <div>
            <img class="img-responsive" style="position: relative; left: 80px;" src="<?php echo base_url().$singledata->post_image; ?>" height="360px;" width="640px;">
        </div>
        <br><br>
    <?php endif; ?>
       

        <div>
            <p id="posts1" style="text-align: justify;">               
                <?php 
                    $content = $singledata->post_content;
                    if(strlen( $content) > 1500) {
                      $substring = substr($content,0,500);
                      echo $substring.'....';
                    } else {
                        echo $content;
                    }

                  $postID = $singledata->post_table_id;

                  echo "...<a href='".base_url()."main_control/readmore/$postID'>&nbsp;বাকিটুকু পড়ুন</a>";
                ?>
            </p>
        </div>

<!-- This is counting total comments on the post -->  

        <div id="totalComments"><a href="<?php echo base_url(); ?>main_control/readmore/<?php echo $postID; ?>"><?php echo $total_comments[$singledata->post_table_id].' '.'টি মন্তব্য'; ?></a></div>

<br><br><hr style="border: 1px solid #a4bfbf; width: 50%;"/>​
       
<?php endforeach;  ?>
<br><br>
    <div class="pagination2"><?php echo $links; ?></div>
<br>    
</div> <!-- end of first div -->


<?php $this->load->view('template/sideNotice'); ?>
<?php $this->load->view('template/footer'); ?>


