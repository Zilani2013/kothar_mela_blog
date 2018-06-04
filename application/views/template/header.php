<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>

  <!-- bootstrap css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>my_assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>my_assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>my_assets/css/bootstrap-select.min.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

  <!-- font-awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- custom style -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>my_assets/css/style.css">

</head>


<body>

  <!-- top-logo -->
<div class="container-fluid" id="logo">
    
  <I><a class="navbar-brand" href="<?php echo base_url(); ?>main_control/index">চলো উড়ি</a></I>
    <!-- login form -->
   <?php if(!$this->session->userdata('email')) : ?>
    <div class="row">
      <div class="col-md-7 col-sm-4 col-xs-1" style="position: relative; right: -420px; top: 20px;">
          <form action="<?php echo base_url(); ?>main_control/login" method="POST" class="form-inline pull-right" id="userForm">

            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" class="form-control" name="email" placeholder="email" value="<?php echo set_value('email'); ?>">       
            </div>

            <div class="form-group">
              <label class="sr-only">password</label>
              <input type="password" class="form-control" name="password" placeholder="password">          
            </div>

            <button class="btn btn-primary btn-sm" name="logIn">লগইন</button>        
          </form>
          <small style="color: red; position: relative; top: 34px; left: 310px;"><?php if($this->session->flashdata('login')) { echo $this->session->flashdata('login'); } ?></small>
      </div>
  </div>
  <div class="row"><div class="col-md-5 col-sm-4"><p style="position: relative; left: 600px; top: -24px; width: 48%;">আপনি ব্লগে নতুন? <a href="<?php echo base_url(); ?>main_control/registration">রেজিস্ট্রেশন</a> করুন।</p></div></div>
    
          
    <?php else : ?>      
    

        <button class="pull-right" style="border: none; background: none;" id="user">
          <?php if($profile['profile_image']) : ?>
            <img class="img-circle img-responsive" src="<?php echo base_url().$profile['profile_image']; ?>" height="60px;" width="60px;" alt="">
          <?php else : ?>
            <div><p><?php echo $profile['email'];?></p>
            <p>log out</p></div>
          <?php endif; ?>
        </button>

        <p style="font-size: 13px; font-weight: bold; text-transform: capitalize; position: relative; bottom: -10px;" class="pull-right"></p>

        <a href="<?php echo base_url(); ?>main_control/logout" class="btn btn-danger btn-sm pull-right" style="margin:10px; display: none;" id="logout">লগ আউট</a>
        <?php endif; ?>
</div>


<!-- navigation bar -->
<nav class="navbar navbar-default navbar navbar-inverse" style ="background: none; box-shadow: 2px 2px 4px #2d2d2c;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--navbar brand-->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav" id="navigation">
        <li><a href="<?php echo base_url(); ?>main_control/index">হোম</a></li>
        <li><a href="<?php echo base_url(); ?>main_control/about_blog">ব্লগ সম্পর্কে </a></li>
        <li><a href="<?php echo base_url(); ?>main_control/terms">শর্তাবলী</a></li>
        <li><a href="<?php echo base_url(); ?>main_control/contact">যোগাযোগ</a></li>

    <?php if($this->session->userdata('email')) : ?>
        <li class="loggedPost"><a style="margin-left: 50px; color: #e5e0de;" href="<?php echo base_url(); ?>main_control/post_on_blog" class="pull-right">পোস্ট করুন ব্লগে</a></li>  
        <li class="loggedPost"><a style="margin-left: -30px; color: #e5e0de;" href="<?php echo base_url(); ?>main_control/users_all_posts" class="pull-right">আপনার পোস্টসমূহ</a></li> 
    <?php endif; ?>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid two -->
</nav>


<!-- blog pic -->
<div class="container-fluid" id="header">
  <div class="row">
    <div class="col-sm-12">
    <h1>কথার মেলায় আপনাকে স্বাগতম</h1>
    <cite>&mdash;কোন বস্তু রহস্যময় নয়, রহস্য আমাদের চোখে....</cite>
    </div>
  </div>
</div><!--container-fluid three-->

<br><br>

<!-- post body -->
<div class="container-fluid" id="sidebar">
  <div class="row">
    <!-- post Category -->
    <div class="col-md-2 col-sm-2">
      <div id="postCategory">
        <h3 style=""><strong>পোস্ট ক্যাটাগরি</strong></h3>
        <ul id="categories">
          <li><a href="<?php echo base_url(); ?>main_control/index/গল্প">গল্প</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/ভ্রমণ">ভ্রমণ</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/কবিতা">কবিতা</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/জীবন">জীবন</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/ইতিহাস">ইতিহাস</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/সাহিত্য">সাহিত্য</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/বিজ্ঞান">বিজ্ঞান</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/মিডিয়া">মিডিয়া</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/বিনোদন">বিনোদন</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/রাজনীতি">রাজনীতি</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/অর্থনীতি">অর্থনীতি</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/খেলাধুলা">খেলাধুলা</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/সাম্প্রতিক খবর">সাম্প্রতিক খবর</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/শিল্প ও সংস্কৃতি">শিল্প ও সংস্কৃতি</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/টিপস ও ট্রিক্স">টিপস ও ট্রিক্স</a></li>
          <li><a href="<?php echo base_url(); ?>main_control/index/কম্পিউটার ও প্রোগ্রামিং">কম্পিউটার ও প্রোগ্রামিং</a></li>
        </ul>
      </div>
    </div>


