<div><!--starting div --> 
    <form class="form-horizontal" action="<?php echo base_url(); ?>admin_control/comment/<?php echo $postid; ?>" method="post" id="commentForm">
        <div class="form-group">
           <label class="col-md-3 control-label">মন্তব্য</label>
            <div class="col-md-9">
            	<textarea style="width: 98%;" class="form-control" name="user_comment" rows="1"></textarea>
            </div>
        </div>
        <button style="position: relative; bottom: 48px;" type="submit" name="userComment" class="btn btn-info btn-sm pull-right">কমেন্ট করুন</button>
    </form>

<br><br>
    
    <h3 id="allcomment">সকল মন্তব্য:</h3><br>
    <p id="totalComment">মোট মন্তব্যঃ  <a href="#!"><?php echo $totalcmnt.' '.'টি মন্তব্য'; ?></a></p>


 <!-- Showing user Comments on post -->
<?php foreach($comment as $singleComment) : ?>
	<?php $commentid = $singleComment->comments_table_id; ?>

	<a id="comment_delete" href="<?php echo base_url(); ?>/admin_control/delete_comment/<?php echo $commentid; ?>/<?php echo $postid; ?>" type="submit" class="btn"><i class="fa fa-trash"></i></button></a>

    <div id="commentBox1">
    	<h4><small>লিখেছেনঃ&nbsp;&nbsp;</small><?php echo $singleComment->name; ?></h4>
        <p><?php echo $singleComment->comments; ?></p>
    </div><!--commentsBox-->



    <form class="replyForm2 form-horizontal" action="<?php echo base_url(); ?>admin_control/reply/<?php echo $commentid; ?>/<?php echo $postid; ?>" method="POST">
        <div class="form-group" style="position: relative; right: -120px;">
            <label class="col-md-3 control-label" id="replyLabel">রিপ্লাই</label>
            <div class="col-md-7">
                <textarea type="text" class="form-control" name="reply" id="commentReply" rows="1"></textarea>
            </div>
        </div>                            
        <button type="submit" class="btn btn-info btn-sm pull-right" name="post_reply">পোস্ট</button>&nbsp;
    </form>

    <!--replies foreach-->
    <?php foreach($replies as $singleReply) : ?>
    	<?php $reply_commentid = $singleReply->commentid; ?>
        <?php if($commentid == $reply_commentid) : ?>
    		<div id="commentReplies2">
    		<a id="reply_delete" href="<?php echo base_url(); ?>admin_control/delete_reply/<?php echo $reply_commentid; ?>/<?php echo $postid; ?>" type="submit" class="btn"><i class="fa fa-trash"></i></a>                    
        		<h6><small>লিখেছেনঃ&nbsp;</small><?php echo $singleReply->name; ?></h6>                   
        		<p><?php echo $singleReply->reply; ?></p>
    		</div>
            
		<?php endif; ?>
	<?php endforeach; ?>
                       
<?php endforeach; ?>
<!-- endforeach of comments -->

</div> <!-- ending div -->

        

<?php $this->load->view('admin/template/footer'); ?>