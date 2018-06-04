<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class admin_control extends CI_Controller {

    public function __construct() { 
    	parent::__construct(); 
    }



/*============================== showing index page ==========================*/


	public function admin_index()
	{
		if($this->session->userdata('admin')) {
			
			$admindata                   = array();
			$admindata['total_members']  = $this->admin_model->total_members_blog();
			$admindata['total_posts']    = $this->admin_model->total_posts_on_blog();
			$admindata['total_comments'] = $this->admin_model->total_comments_on_blog();


			$id                          = 1;
			$admindata['all']            = $this->admin_model->admin($id);
			$this->load->view('admin/admin_index',$admindata);

		} else {
			redirect('main_control/index');
		}

	}



/*=================================== showing all members in blog ========================================*/

	public function blogMembers()
	{
		
		 // pagination
        $config['base_url']         = 'http://localhost/kothar_mela/admin_control/blogMembers';
		$config['total_rows']       = $this->admin_model->total_members_blog();
		$config['per_page']         = 15;
		$config['num_links']        = 6;
		$config['first_tag_open']   = '<li class="pagination btn btn-info btn-sm;">';
		$config['first_tag_close']  = '</li>';
		$config['last_tag_open']    = '<li class="pagination btn btn-info btn-sm;">';
		$config['last_tag_close']   = '</li>';
	    $config['num_tag_open']     = '<li class="pagination btn btn-info btn-sm;">';
	    $config['num_tag_close']    = '</li>';
		$config['prev_link']        = '<li class="pagination btn btn-info btn-sm;">&laquo;prev</li>';
		$config['next_link']        = '<li class="pagination btn btn-info btn-sm;">next&raquo;</li>';
		$config['use_page_numbers'] = TRUE;
		$config['offset']           = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:'0';

		$this->pagination->initialize($config);

		$allUsers                   = $this->admin_model->blog_users($config);
		$data['users']              = $allUsers;

		$data['links']              = $this->pagination->create_links();

		$data['totalPosts']         = $this->admin_model->users_total_post($allUsers);

		$id                         = 1;
		$data['all']                = $this->admin_model->admin($id);

		$this->load->view('admin/blogMembers', $data);
	}



/*================================================= delete an user ================================================*/

	public function delete_users($id = null)
	{
		$id     = $id;
		$result = $this->admin_model->deleteUsers($id);

		redirect('admin_control/blogMembers');
	}


	public function search_user()
	{
		$searchVal     = $this->input->post('search');
		$result        = $this->admin_model->searchUser($searchVal);
		$datas         = array();
		$datas['name'] = $result;

		$id            = 1;
		$datas['all']  = $this->admin_model->admin($id);

		$this->load->view('admin/new', $datas);
	}



	public function blog_all_post()
	{
		$post_data  				= array();

		// pagination
        $config['base_url']         = 'http://localhost/kothar_mela/admin_control/blog_all_post/';
		$config['total_rows']       = $this->admin_model->total_posts_on_blog();
		$config['per_page']         = 10;
		$config['num_links']        = 10;
		$config['first_tag_open']   = '<li class="pagination btn btn-info btn-sm;">';
		$config['first_tag_close']  = '</li>';
		$config['last_tag_open']    = '<li class="pagination btn btn-info btn-sm;">';
		$config['last_tag_close']   = '</li>';
	    $config['num_tag_open']     = '<li class="pagination btn btn-info btn-sm;">';
	    $config['num_tag_close']    = '</li>';
		$config['prev_link']        = '<li class="pagination btn btn-info btn-sm;">&laquo;prev</li>';
		$config['next_link']        = '<li class="pagination btn btn-info btn-sm;">next&raquo;</li>';
		$config['use_page_numbers'] = TRUE;
		$config['offset']           = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*$config['per_page']:'0';

		$this->pagination->initialize($config);

		$result                     = $this->admin_model->allPosts($config);

		$post_data['allPosts']      = $result;

		$post_data['page_links']    = $this->pagination->create_links();

		$id                         = 1;
		$post_data['all']           = $this->admin_model->admin($id);

		$this->load->view('admin/blog_all_post', $post_data);

	}


	public function readmore($postid = null)
	{
		
		$postid              = $postid;

		$data                = array();

		$id                  = 1;
		$data['all']         = $this->admin_model->admin($id);

		$userDatas           = $this->main_model->get_users_data();
		$data['profile']     = $userDatas;

		$userid              = $userDatas['id'];
		$data['total_posts'] = $this->main_model->total_posts($userid);
		
		$readmore            = $this->main_model->readmore_data($postid);
		$data['full_post']   = $readmore;

		// comments data
		$alldata             = $this->main_model->get_commenter_posts($postid);
		$data['comment']     = $alldata; 
		// print_r($alldata);
		$totalComment        = $this->main_model->total_commentsOn_post($postid);
		$data['totalcmnt']   = $totalComment;


		// reply data
		$replydata           = $this->main_model->get_replier_replies($postid);
		$data['replies']     = $replydata;

		$this->load->view('admin/readmore', $data);


	}



	public function comment( $postid = null )
	{
		$commentData             = array();
		$commentData['postId']   = $postid;
		$commentData['comments'] = $this->input->post('user_comment');

		$commentData['userid']   = 1;

		$comments                = $this->main_model->insert_comment($commentData);

		redirect('admin_control/readmore/'.$postid);
	}



	public function reply($commentid = NULL, $postid = NULL)
	{
		$commentid              = $commentid; 
		$postid                 = $postid;

		$replyData              = array();
		$replyData['reply']    	= $this->input->post('reply');
		$replyData['commentid'] = $commentid;

		$userDatas              = $this->main_model->get_users_data();
		$replyData['userid']    = 1;

		$replies                = $this->main_model->insert_replies($replyData);
		redirect('admin_control/readmore/'.$postid);


	}




	public function delete_post($postid)
	{
		// echo $postid;
		$result = $this->admin_model->deletePost($postid);
		$this->session->set_flashdata('deleted','You have successfully deleted the post');
		redirect('admin_control/blog_all_post');
	}


	public function delete_comment($commentid = null, $postid = null)
	{
		$result = $this->admin_model->deleteComment($commentid);
		redirect('admin_control/readmore/'.$postid);
	}




	public function delete_reply($reply_commentid = null, $postid = null)
	{
		$result = $this->admin_model->deleteReply($reply_commentid);
		redirect('admin_control/readmore/'.$postid);
	}



	public function post_on_blog()
	{		
		$data = array();
		$id                     = 1;
		$data['all']            = $this->admin_model->admin($id);
		$this->load->view('admin/submit_post', $data);
	}





	public function submit_post_data()
	{
		$this->form_validation->set_rules('postCategory','Category','required');
		$category = $this->input->post('postCategory');
		$this->session->set_userdata('postCategory', $category);


		$this->form_validation->set_rules('title','Title','trim|required|min_length[4]');
		$this->form_validation->set_rules('post_content','Post Content','trim|required');

		if($this->form_validation->run() == FALSE) {

			$this->post_on_blog();

		} else {

			if($_FILES['image']['name']) {

				$fileName = time().'_'.str_replace(str_split(' ()\\/,:*?"<>|'),'', $_FILES['image']['name']);

				$img = array(
					'upload_path'   => FCPATH.'my_assets/post_img/',
					'file_name'     => $fileName,
					'allowed_types' => 'gif|jpg|png|JPEG',
					'max_size'      => '1000',
					'max_width'     => '1920',
					'max_height'    => '1024'
				);

			 	$this->load->library('upload', $img);

		     	if ( !$this->upload->do_upload('image')) {

		            $error     = array('error' => $this->upload->display_errors());	    					
	    			$this->load->view('admin/submit_post', $error);

		        } else {

		                $finalImage = array('upload_data' => $this->upload->data());
		                $dir        = 'my_assets/post_img/';
	               	 	$fullImage  = $dir.$fileName;
		        }


    		} else {

    			$fullImage = "";
    		}

		$post_data = array(
			'post_category'  => $this->input->post('postCategory'),
			'post_title'  	 => $this->input->post('title'),
			'post_content'   => $this->input->post('post_content'),
			'fullImage'      => $fullImage,
			'userid'         => 1
		);

		$this->admin_model->insert_post_data($post_data);
		redirect('admin_control/admin_all_posts');
		}


	}



	public function admin_all_posts()
	{
		$userid    					= 1;

		$userdata                   = array();
		$userdata['total_posts']    = $this->admin_model->admin_total_post($userid);

	 	// pagination
        $config['base_url']         = 'http://localhost/kothar_mela/admin_control/admin_all_posts/';
		$config['total_rows']       = $this->admin_model->admin_total_post($userid);
		$config['per_page']         = 6;
		$config['num_links']        = 6;
		$config['first_tag_open']   = '<li class="pagination btn btn-info btn-sm;">';
		$config['first_tag_close']  = '</li>';
		$config['last_tag_open']    = '<li class="pagination btn btn-info btn-sm;">';
		$config['last_tag_close']   = '</li>';
	    $config['num_tag_open']     = '<li class="pagination btn btn-info btn-sm;">';
	    $config['num_tag_close']    = '</li>';
		$config['prev_link']        = '<li class="pagination btn btn-info btn-sm;">&laquo;prev</li>';
		$config['next_link']        = '<li class="pagination btn btn-info btn-sm;">next&raquo;</li>';
		$config['use_page_numbers'] = TRUE;
		$config['offset']           = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*6:'0';

		$this->pagination->initialize($config);

		$admin_data                 = $this->admin_model->adminAllPosts($userid,$config);
		$userdata['user_posts']     = $admin_data;

		$userdata['links']          = $this->pagination->create_links();

		$id                         = 1;
		$userdata['all']            = $this->admin_model->admin($id);

		$this->load->view('admin/admin_all_posts', $userdata);
	}



	public function edit_admin_posts($postid = NULL)
	{
	

		$data                = array();
		$postdata            = $this->admin_model->postdata_for_edit($postid);
		$data['post_data']   = $postdata;

		$id                          = 1;
		$data['all']              = $this->admin_model->admin($id);

		$this->load->view('admin/edit_post', $data);

	}


	public function update_post()
	{
		$fullImage     = "";
		$user_postid   = $this->input->post('editing');
		$post_category = $this->input->post('postCategory');
		$post_title    = $this->input->post('title');
		$post_content  = $this->input->post('post_content');		
		
		if($_FILES['image']['name']) {

			$fileName = time().'_'.str_replace(str_split(' ()\\/,:*?"<>|'),'', $_FILES['image']['name']);

			$img = array(
				'upload_path'   => FCPATH.'my_assets/post_img/',
				'file_name'     => $fileName,
				'allowed_types' => 'gif|jpg|png|JPEG',
				'max_size'      => '1000',
				'max_width'     => '1920',
				'max_height'    => '1080'
			);

		 	$this->load->library('upload', $img);

	     	if (!$this->upload->do_upload('image')) {

	            $error = array();
	            $error['error']     = $this->upload->display_errors('<p>','</p>');

				$postdata           = $this->admin_model->postdata_for_edit($user_postid);
				$error['post_data'] = $postdata;

    			$this->load->view('admin/edit_post', $error);

	        } else {

        		$prev_image    = $this->admin_model->previous_post_image($user_postid);
        		$previous_file = $prev_image->post_image;
        		$image_path    = FCPATH.$previous_file;

           	 	if($previous_file == NULL) {        
           	 		$finalImage = array('upload_data' => $this->upload->data());
                	$dir        = 'my_assets/post_img/';
           	 		$fullImage  = $dir.$fileName;
           	 	} else {               	 	     	 		
           	 		$finalImage = array('upload_data' => $this->upload->data());
                	$dir        = 'my_assets/post_img/';
           	 		$fullImage  = $dir.$fileName;

       	 			unlink($image_path);
   	 			}  
        		
	        }


		} else {

    		$prev_image    = $this->admin_model->previous_post_image($user_postid);
    		$fullImage     = $prev_image->post_image;

		}

    	$data = array();
		$data['userid']        = 1;
    	$data['id']            = $user_postid;
    	$data['post_category'] = $post_category;
    	$data['post_title']    = $post_title;
    	$data['post_image']    = $fullImage;
    	$data['post_content']  = $post_content;

		$result 			   = $this->admin_model->updata_post($data);
		$this->admin_all_posts();

	}




	public function delete_admin_post($postid)
	{
		$result  = $this->admin_model->deletePost($postid);
		$this->session->set_flashdata('deleted','You have successfully deleted the post');
		redirect('admin_control/admin_all_post');
	}



	public function about()
	{
		
		$about['about'] = $this->admin_model->blog_contents();
		$id             = 1;
		$about['all']   = $this->admin_model->admin($id);

		$this->load->view('admin/about', $about);
	}


	public function terms()
	{

		$id             = 1;
		$about['all']   = $this->admin_model->admin($id);
		
		$about['terms'] = $this->admin_model->blog_contents();

		$this->load->view('admin/terms', $about);
	}


	public function contacts()
	{

		$id               = 1;
		$about['all']     = $this->admin_model->admin($id);

		$about['contact'] = $this->admin_model->blog_contents();

		$this->load->view('admin/contact', $about);
	}


	public function edit_about()
	{

		$data          = array();
		$all           = $this->admin_model->blog_contents();

		$data['all']   = $all;
		$data['about'] = $all->about_blog;

		$id            = 1;
		$data['all']   = $this->admin_model->admin($id);

		$this->load->view('admin/edit_about', $data);
	}


	public function edit_terms()
	{		
		$data          = array();
		$all           = $this->admin_model->blog_contents();

		$data['all']   = $all;
		$data['terms'] = $all->terms;

		$id            = 1;
		$data['all']   = $this->admin_model->admin($id);

		$this->load->view('admin/edit_terms', $data);
	}

	public function edit_contact()
	{

		$data            = array();
		$all             = $this->admin_model->blog_contents();

		$data['all']     = $all;
		$data['contact'] = $all->contact;


		$id              = 1;
		$data['all']     = $this->admin_model->admin($id);

		$this->load->view('admin/edit_contact', $data);
	}



	public function update_about()
	{
		$about  =  $this->input->post('about');
		$result = $this->admin_model->updateAbout($about);

		redirect('admin_control/about');

	}

	public function update_terms()
	{
		$terms  = $this->input->post('terms');
		$result = $this->admin_model->updateTerms($terms);

		redirect('admin_control/terms');

	}

	public function update_contact()
	{
		$contact = $this->input->post('contact');
		$result  = $this->admin_model->updateContact($contact);
		redirect('admin_control/contacts');
	}


	public function profile()
	{		
		$id              = 1;
		$data['all']     = $this->admin_model->admin($id);
		$this->load->view('admin/admin_profile', $data);
	}








}

