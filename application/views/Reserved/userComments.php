
<div><!--starting div -->  
    <?php if($this->session->userdata('email')) : ?>
    	<button style="font-size: 12px;" class="btn btn-primary pull-right" id="comment">মন্তব্য করুন</button><br><br>
        <!-- if the comment field is empty -->
    	<span style="color: red; margin-left: -10px;" class="pull-right"><?php echo form_error('user_comment'); ?></span><br>
        <form class="form-horizontal" action="<?php echo base_url(); ?>main_control/comment/<?php echo $postid; ?>" method="post" id="commentForm" style="display: none;">
            <div class="form-group">
               <label class="col-md-3 control-label"><span style="color: red; font-size: 20px;">*</span>আপনার মন্তব্য</label>
                <div class="col-md-9">
                	<textarea class="form-control" name="user_comment" rows="2" placeholder="কমেন্ট লিখুন"></textarea>
                </div>
            </div>
            <button type="submit" name="userComment" class="btn btn-info btn-sm pull-right">কমেন্ট করুন</button>
        </form><br>
    <?php else : ?><!-- if user not logged in-->
        <div>
            <a for='userForm' class="pull-right" href="#!" style="color: red; font-weight: bold;"><span> * </span>মন্তব্য করার জন্যে লগইন করুন<B class="glyphicon glyphicon-arrow-up" style="font-size: 20px;"></B></a>
        </div>
        <br>
    <?php endif; ?> <!--end of if user logged in-->
    


    <h3 id="allcomment">সকল মন্তব্য:</h3><br>
    <p id="totalComment">মোট মন্তব্যঃ  <a href="#!"><?php echo $totalcmnt.' '.'টি মন্তব্য'; ?></a></p>


 <!-- Showing user Comments on post -->
<?php foreach($comment as $singleComment) : ?>
    <div id="commentBox">
    	<h4><small>লিখেছেনঃ&nbsp;&nbsp;</small><?php echo $singleComment->name; ?>
            <?php if($this->session->userdata('email')) : ?>
            <a class="cmnt fa fa-edit pull-right">delete</a>&nbsp;

            <a class="cmnt fa fa-edit pull-right">edit</a>
        <?php endif; ?>
        </h4>
        <p><?php echo $singleComment->comments; ?></p>
    </div><!--commentsBox-->

    <?php $commentid = $singleComment->comments_table_id; ?>

    <!-- including reply form if the user logged In-->
    <?php if($this->session->userdata('email')) : ?>
        <form class="replyForm form-horizontal" action="<?php echo base_url(); ?>main_control/reply/<?php echo $commentid; ?>/<?php echo $postid; ?>" method="POST">
            <small style="color: red; position: relative; right: -250px; font-weight: bold;" class=""><?php echo form_error('reply'); ?></small>
            <div class="form-group">
                <label class="col-md-3 control-label" id="replyLabel">রিপ্লাই</label>
                <div class="col-md-7">
                    <textarea type="text" placeholder="রিপ্লাই লিখুন" class="form-control" name="reply" id="commentReply" rows="1"></textarea>
                </div>
            </div>                
            <button type="submit" class="btn btn-info btn-sm pull-right" name="post_reply">পোস্ট</button>&nbsp;
        </form>
        <?php endif; ?><!-- end of reply form if the user logged in-->


        <!--replies foreach-->
        <?php foreach($replies as $singleReply) : ?>                
            <?php if($commentid == $singleReply->commentid) : ?>
                <div id="commentReplies">
                    <h6><small>লিখেছেনঃ&nbsp;</small><?php echo $singleReply->name; ?></h6>                    
                    <p><?php echo $singleReply->reply; ?></p>
                </div><!--  end of comments reply section-->
            <?php endif; ?>
        <?php endforeach; ?>
            
<?php endforeach; ?>
</div> <!-- ending div -->

        