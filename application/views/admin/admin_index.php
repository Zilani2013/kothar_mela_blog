<?php $this->load->view('admin/template/header');  ?>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" id="adminHome">
      
			<div class="col-md-3 boxs">
				<a href="<?php echo base_url(); ?>admin_control/blogMembers"><?php echo $total_members; ?></a>
				<strong>Total Members On Blog</strong><br>
			</div>

			<div class="col-md-3 boxs">
				<a href="<?php echo base_url(); ?>admin_control/blog_all_post"><?php echo $total_posts; ?></a>
				<strong>Total Posts On Blog</strong><br>
			</div>

			<div class="col-md-3 boxs">
				<a href="<?php echo base_url(); ?>admin_control/blogMembers"><?php echo $total_comments; ?></a>
				<strong>Total Comments On Blog</strong><br>
			</div>

		</div> <!-- end of adminHome -->
	</div> <!-- end row -->
</div>
<!-- <hr style="border: 1px solid #ccc; position: relative; top: 30px; left: 110px; width: 80%;"> -->

<br><br><br>

	<!-- Another row for table -->
<!-- <div class="container">
	<div class="row">
		<div class="" id="homeTable">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $total_members; ?></td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
              </tbody>
            </table>
      </div>
	</div>
</div>
 -->

<!-- </div> end of container -->

<?php $this->load->view('admin/template/footer'); ?>