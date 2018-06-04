<?php $this->load->view('admin/template/header'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-2" id="search">
      <form action="<?php echo base_url(); ?>admin_control/search_user" class="form-inline pull-right" method="POST">
        <div class="form-group">
          <input type="search" name="search" class="col-md-12 form-control" placeholder="search user" style="width: 120%; position: relative; right: 40px;" required="required">
        </div>
        <button class="btn btn-primary">search</button>
      </form>
    </div>
  </div>



  <!-- blog users table -->
  <div class="row">
		<div class="" id="blogMemberTable">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>User id</th>
                  <th>Users Name</th>
                  <th>Email</th>
                  <th>Gender</th>
                  <th>Country</th>
                  <th>Profile Image</th>
                  <th>Total Posts</th>
                  <th>Action</th>
                </tr>
              </thead>

      <?php foreach ($users as $single): ?>
              <tbody id="tableBody">
                <tr>
                  <td><?php echo $single->id; ?></td>
                  <td><?php echo $single->name; ?></td>
                  <td><a style="font-size: 14px;"><?php echo $single->email; ?></a></td>
                  <td><?php echo $single->gender; ?></td>
                  <td><?php echo $single->country; ?></td>
                  <td>
                    <?php if($single->profile_image) : ?>
                      <img class="img-circle" src='<?php echo base_url().$single->profile_image; ?>' height="20px;" width="20px;">
                    <?php else : ?>
                      <small>No image</small>
                    <?php endif; ?>                     
                  </td>
                  <td><?php echo $totalPosts[$single->id]; ?></td>
                  <td><a href="<?php echo base_url(); ?>admin_control/delete_users/<?php echo $single->id; ?>" class="deleteUser">Delete</a></td>
                </tr>
              </tbody>       
      <?php endforeach; ?>
            </table>
    </div>

<br><br><br><br>  
    <div class="pagination2"><?php echo $links; ?></div>
  </div><!--end of table row-->
     
</div>



<?php $this->load->view('admin/template/footer'); ?>