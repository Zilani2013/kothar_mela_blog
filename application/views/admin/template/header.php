<?php define('title', 'Admin | Kothar_mela'); ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo title; ?></title>

  <!-- bootstrap css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>my_assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>my_assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>my_assets/css/bootstrap-select.min.css">
   
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

  <!-- font-awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- custom style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>my_assets/css/style.css">

</head>


<body id="adminBody">

	<!-- admin navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" style="background: #030544;">
	  	<div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>

		      <a style="position: relative; left: 15px;" class="navbar-brand" href="<?php echo base_url(); ?>main_control/index">কথার মেলা</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="<?php echo base_url(); ?>main_control/logout">Log Out</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
	  	</div><!-- /.container-fluid -->
	</nav>

	
	<!-- sidebar -->
	<div class="container-fluid"> <!-- starts -->
		<div class="row"> <!-- starts -->
			<div class="col-md-2 sidebar">
				<img class="img-circle" id="adminPic" src="<?php echo base_url().$all->profile_image; ?>" height="100px;" width="100px;" alt="Admin">
				<br>
				<small style="color: #d3d3cf; position: relative; top: -4px; left: -9px; border: solid 1px #ccc; padding: 4px;"><?php echo $all->email; ?></small>
				<br><br><br>
				<ul class="nav nav-sidebar">
					<li class="<?php if($this->uri->segment(2) == 'admin_index') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin_control/admin_index">Home</a></li>

					<li class="<?php if($this->uri->segment(2) == 'blogMembers') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin_control/blogMembers">Blog Members</a></li>

					<li class="<?php if($this->uri->segment(2) == 'blog_all_post') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin_control/blog_all_post">All Posts</a></li>


					<li class="<?php if($this->uri->segment(2) == 'admin_all_posts') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin_control/admin_all_posts">Admin Posts</a></li>
					
					<li class="<?php if($this->uri->segment(2) == 'post_on_blog') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin_control/post_on_blog">Submit Post On Blog</a></li>

					<li class="<?php if($this->uri->segment(2) == 'about') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin_control/about">About</a></li>

					<li class="<?php if($this->uri->segment(2) == 'terms') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin_control/terms">Terms &amp; Conditions</a></li>
					
					<li class="<?php if($this->uri->segment(2) == 'contacts') { echo 'active'; } ?>"><a href="<?php echo base_url(); ?>admin_control/contacts">Contact Us</a></li>	

					<li class="<?php if($this->uri->segment(2) == 'profile') { echo 'active'; } ?>"><a id="profile" href="<?php echo base_url(); ?>admin_control/profile">Your Profile</a></li>	
				</ul>
			</div>
		</div><!-- end of container fluid row header -->
	</div> <!-- end of container fluid header -->
