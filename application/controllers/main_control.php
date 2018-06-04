<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class main_control extends CI_Controller {

    public function __construct() { parent::__construct(); }


/*============================== showing index page ==========================*/
	
	// click on home nav
	public function index( $category = NULL)
	{
		 
		if(!is_numeric($category[0])) {

			if($category == NULL ) {
				$this->session->set_userdata('category','all');
			} else {

				$category_url = urldecode($category);
				$this->session->set_userdata('category', $category_url);
			}

			$config['offset']       = 0;

		} else {
			
			$config['offset']       = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*6:'0';
		}
		

		$data                       = array();
		$userDatas                  = $this->main_model->get_users_data();
		$data['profile']            = $userDatas;
		$userid                     = $userDatas['id'];
        
        $data['total_posts'] = $this->main_model->total_posts($userid);
    
        // pagination
        $config['base_url']         = 'http://localhost/kothar_mela/main_control/index/';
		$config['total_rows']       = $this->main_model->total_post();
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

		$this->pagination->initialize($config);
		$postDATA                   = $this->main_model->get_post_table_data($config);
		$this->session->set_userdata('postdata',$postDATA);

		$data['total_comments']     = $this->main_model->total_comment_on_post($postDATA);

		$data['postdata']           = $postDATA;
		$data['links']              = $this->pagination->create_links();

		$this->load->view('sub_pages/index', $data);
	
	}



/*============================== showing about page ==========================*/

	// click on about nav
	public function about_blog()
	{

		$userDatas           = $this->main_model->get_users_data();
		$userid              = $userDatas['id'];
		$data['total_posts'] = $this->main_model->total_posts($userid);

		$data['about_blog']  = $this->main_model->about();

		if($userDatas) {
			$data['profile'] = $userDatas;			
			$this->load->view('sub_pages/about',$data);
		} else {
			$this->load->view('sub_pages/about',$data);
		}

		
	}	



/*============================== showing t&c page ==========================*/

	public function terms()
	{
		$userDatas           = $this->main_model->get_users_data();
		$userid              = $userDatas['id'];
		$data['total_posts'] = $this->main_model->total_posts($userid);

		$data['terms_blog']  = $this->main_model->about();


		if($userDatas) {
			$data['profile'] = $userDatas;		
			$this->load->view('sub_pages/terms',$data);

		} else {
			$this->load->view('sub_pages/terms', $data);
		}
	}	



/*============================== showing contact page ==========================*/

	public function contact()
	{
		$userDatas           = $this->main_model->get_users_data();
		$userid              = $userDatas['id'];
		$data['total_posts'] = $this->main_model->total_posts($userid);

		$data['contact_blog']  = $this->main_model->about();

		if($userDatas) {

			$data['profile'] = $userDatas;
			$this->load->view('sub_pages/contact', $data);
		} else {

			
			$this->load->view('sub_pages/contact', $data);

		}
		
	}



/*============================== showing Registration form ==========================*/

	// click on registration button
	public function registration()
	{
		$this->load->view('sub_pages/signUp');
	}




/*====================================================================================================
												Users Section 											
=====================================================================================================*/	





/*============================== get registration form data and submit  ==========================*/

	// getting user data from registration fields
	public function submit_reg()
	{

		$this->form_validation->set_rules('name', 'Name', 'trim|htmlspecialchars|required|min_length[4]|callback_name_already_exists');

		$this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|required|valid_email|callback_email_already_exists');

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|alpha_numeric');


		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');

		$this->form_validation->set_rules('country', 'Country', 'trim|htmlspecialchars|required');

		
	 	if($this->form_validation->run() == FALSE)
  		{
  			
   			$this->load->view('sub_pages/signUp');

	  	}

	  	else	
	  	{

	  	 	$email  = $this->input->post('email');
	  	 	$this->session->set_userdata('email',$email);
	  	 			  	
		  	$result = $this->main_model->insert_reg_data();

			redirect('main_control/index','location');
			
	  	}

	
	}



	public function name_already_exists($name)
	{

		$this->form_validation->set_message('name_already_exists','This name already exists,try different !!');

		if($this->main_model->name_already_exists($name)) {
			return true;

		} else {

			return false;
		}
		
	}	



	public function email_already_exists($email)
	{

		$this->form_validation->set_message('email_already_exists','This email already exists,try different !!');

		if($this->main_model->email_already_exists($email)) {
			return true;

		} else {

			return false;
		}
		
	}




/*======================================= get login form data and validate ==========================*/

	// log in section
	public function login() {

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]|alpha_numeric');

		if($this->form_validation->run() == FALSE) {

			// echo "<pre>"; echo "something";
			$this->session->set_flashdata('login','You have entered wrong Email or Password');
			redirect('main_control/index');

		} else {

			$form_Email  = $this->input->post('email');
			$form_Pass   = md5($this->input->post('password'));
			$user        = $this->main_model->login($form_Email, $form_Pass);

			if( $form_Email == 'kothar_mela-bd@gmail.com' && $form_Pass == '184f7aef79d117c91a06be10d969c917') {

				$sessionData = array(
					'admin'     => $form_Email,
					'logged_in' => true
					);
				$loggedInUser = $this->session->set_userdata($sessionData);
				redirect('admin_control/admin_index');

			} else {

				if($user == true) {
					
					$sessionData = array(
						'email'     => $form_Email,
						'logged_in' => true
					);

					$loggedInUser = $this->session->set_userdata($sessionData);				
					redirect('main_control/index', 'location');

				} else {

					$this->session->set_flashdata('login','wrong Entry');
					redirect('main_control/index');
				}
			}

		} // end of if

	} // end of function



/*============================== logout section and unset loggedin email session ===================*/

	public function logout() {
	
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('admin');
		redirect('main_control/index','location');
	}



/*======================= show the add post view page =================================================== */


	public function post_on_blog()
	{
		$userDatas           = $this->main_model->get_users_data();
		$data['profile']     = $userDatas;
		$userid              = $userDatas['id'];
		$data['total_posts'] = $this->main_model->total_posts($userid);
		$this->load->view('sub_pages/addPost',$data);
		
	}



/*=============================== getting add post form data and sent to model ====================================== */
	
	public function submit_post_data()
	{
		$this->form_validation->set_rules('postCategory','Post Category','required');
		$category = $this->input->post('postCategory');
		$this->session->set_userdata('postCategory', $category);

		$this->form_validation->set_rules('title','Post Title','trim|required|min_length[4]');
		$this->form_validation->set_rules('post_content','Your Post Content','trim|required');

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
					'max_height'    => '1080'
				);

			 	$this->load->library('upload', $img);

		     	if ( !$this->upload->do_upload('image')) {

		            $error     = array('error' => $this->upload->display_errors());	    		
	    			$error['userdatas'] = $this->main_model->get_users_data();

	    			
	    			$this->load->view('sub_pages/addPost', $error);


		        } else {

		                $finalImage = array('upload_data' => $this->upload->data());
		                $dir        = 'my_assets/post_img/';
	               	 	$fullImage  = $dir.$fileName;
		        }


    		} else {

    			$fullImage = "";
    		}

		$userDatas = $this->main_model->get_users_data();
		$post_data = array(
			'post_category'  => $this->input->post('postCategory'),
			'post_title'  	 => $this->input->post('title'),
			'post_content'   => $this->input->post('post_content'),
			'fullImage'      => $fullImage,
			'userid'         => $userDatas['id']
		);

		$this->main_model->insert_post_data($post_data);
		redirect('main_control/users_all_posts');
		}

	}


/*================ getting data to show in readmore view ====================================== */

	public function readmore($postid = NULL)
	{

		$postid = $postid;

		$data   = array();

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

		$this->load->view('sub_pages/readmore', $data);

	}


/*================ getting comment and insert into comments table ============================== */

	public function comment($postid = NULL)
	{
		$postid = $postid;
		$this->form_validation->set_rules('user_comment', 'Comment', 'trim|required');

		if($this->form_validation->run() == FALSE ) {
			$data   = array();

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

			$this->load->view('sub_pages/readmore',$data);

		} else {

			$commentData             = array();
			$commentData['postId']   = $postid;
			$commentData['comments'] = $this->input->post('user_comment');

			$userDatas               = $this->main_model->get_users_data();
			$commentData['userid']   = $userDatas['id'];

			$comments                = $this->main_model->insert_comment($commentData);

			redirect('main_control/readmore/'.$postid);


		}


	}


/*============= getting reply data and insert into comment_replies table ========================= */

	public function reply( $commentid = NULL, $postid = NULL )
	{
		$commentid = $commentid; 
		$postid    = $postid;

		$this->form_validation->set_rules('reply','Reply','trim|required');

		if($this->form_validation->run() == FALSE ) {

			$data   = array();

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

			$this->load->view('sub_pages/readmore',$data);

		} else {

			$replyData              = array();
			$replyData['reply']    	= $this->input->post('reply');
			$replyData['commentid'] = $commentid;

			$userDatas              = $this->main_model->get_users_data();
			$replyData['userid']    = $userDatas['id'];

			$replies                = $this->main_model->insert_replies($replyData);
			redirect('main_control/readmore/'.$postid);
		}


	}


/*======================================== getting all data of user ============================================ */

	public function users_all_posts()
	{

		$userDatas = $this->main_model->get_users_data();
		$userid    = $userDatas['id'];

		$userdata                = array();
		$userdata['profile']     = $userDatas;
		$userid                  = $userDatas['id'];
		$userdata['total_posts'] = $this->main_model->total_posts($userid);


		 // pagination
        $config['base_url']         = 'http://localhost/kothar_mela/main_control/users_all_posts/';
		$config['total_rows']       = $this->main_model->users_total_post($userid);
		$config['per_page']         = 8;
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
		$config['offset']           = ($this->uri->segment(3)) ? ($this->uri->segment(3)-1)*8:'0';

		$this->pagination->initialize($config);

		$userdatas                 = $this->main_model->usersAllPosts($userid,$config);

		// foreach ($userdatas as $single) { $postid = $single->post_table_id; }

		$userdata['user_posts']    = $userdatas;
		$userdata['links']         = $this->pagination->create_links();

		// $userdata['total_comment'] = $this->main_model->total_comments($postid);
		// print_r($userdata['total_comment']);


		$this->load->view('sub_pages/userAllPosts', $userdata);
	}


/*================================= showing edit post view page Users posts ========================================= */


	public function edit_user_posts($postid = NULL)
	{
		$user_postid    = $postid;

		$data                = array();
		$userDatas           = $this->main_model->get_users_data();
		$data['profile']     = $userDatas;

		$postdata            = $this->main_model->postdata_for_edit($user_postid);
		$data['post_data']   = $postdata;

		$userid              = $userDatas['id'];
		$data['total_posts'] = $this->main_model->total_posts($userid);
		
		$this->load->view('sub_pages/editPost',$data);

	}


/*================================= Updating Users posts ========================================= */	

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

				$postdata           = $this->main_model->postdata_for_edit($user_postid);
				$error['post_data'] = $postdata;

    			$userDatas          = $this->main_model->get_users_data();
    			$error['profile']   = $userDatas;

    			$this->load->view('sub_pages/editPost', $error);

	        } else {

        		$prev_image    = $this->main_model->previous_post_image($user_postid);
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

    		$prev_image    = $this->main_model->previous_post_image($user_postid);
    		$fullImage     = $prev_image->post_image;

		}

    	$data = array();
    	$userDatas             = $this->main_model->get_users_data();
		$data['userid']        = $userDatas['id'];
    	$data['id']            = $user_postid;
    	$data['post_category'] = $post_category;
    	$data['post_title']    = $post_title;
    	$data['post_image']    = $fullImage;
    	$data['post_content']  = $post_content;

		$result = $this->main_model->updata_post($data);
		$this->users_all_posts();


	}


/*================================= deleting Users posts ========================================= */

	public function delete_user_posts($postid = null)
	{
		$delete_id = $postid;
		$result    = $this->main_model->delete_post($delete_id);
		redirect('main_control/users_all_posts');
	}


/*================================= Uploading users profile picture ========================================= */


	public function upload_profile_pic()
	{

		$fileName = time().'_'.str_replace(str_split(' ()\\/,:*?"<>|'),'', $_FILES['image']['name']);

		$profile_pic = array(
			'upload_path'   => FCPATH.'my_assets/profile_image/',
			'file_name'     => $fileName,
			'allowed_types' => 'jpg|png|gif|JPEG',
			'max_size'      => '1000',
			'max_width'     => '1920',
			'max_height'    => '1080',
		);

		$this->load->library('upload',$profile_pic);

		if(!$this->upload->do_upload('image')) {
			// $fullImage            = "";
			$error                = array();
			$error['errors']       = $this->upload->display_errors();
 			$userDatas            = $this->main_model->get_users_data();
			$error['profile']     = $userDatas;

			$userid               = $userDatas['id'];

	        $error['postdata']    = $this->session->userdata('postdata');
	        $error['total_posts'] = $this->main_model->total_posts($userid);
	        // $this->index();

			$this->load->view('sub_pages/index', $error);

		} else {		
            $finalImage = array('upload_data' => $this->upload->data());
            $dir        = 'my_assets/profile_image/';
       	 	$fullImage  = $dir.$fileName;
		}
		$userDatas = $this->main_model->get_users_data();
		$userid    = $userDatas['id'];
		$result    = $this->main_model->upload_propic($userid,$fullImage);
		redirect('main_control/index');

	}



/*================================= Updating Users profile picture ========================================= */

	public function edit_profile_pic()
	{

		$data                = array();
		$userDatas           = $this->main_model->get_users_data();
		$data['profile']     = $userDatas;
		$userid              = $userDatas['id'];


		if($_FILES['image']['name']) {

			$fullImage = "";
			$fileName = time().'_'.str_replace(str_split(' ()\\/,:*?"<>|'),'', $_FILES['image']['name']);

			$img = array(
				'upload_path'   => FCPATH.'my_assets/profile_image/',
				'file_name'     => $fileName,
				'allowed_types' => 'gif|jpg|png|JPEG',
				'max_size'      => '1000',
				'max_width'     => '1920',
				'max_height'    => '1080'
			);

		 	$this->load->library('upload', $img);

	     	if (!$this->upload->do_upload('image')) {

	            $error = array();
	            $error['error']     = $this->upload->display_errors();

				// $postdata           = $this->main_model->get_post_table_data();
				// $error['postdata']  = $postdata;
				$this->index();

    			// $userDatas          = $this->main_model->get_users_data();
    			// $error['profile']   = $userDatas;

    			// $this->load->view('index', $error);

	        } else {

        		$prev_image    = $this->main_model->previous_profile_image($userid);
        		$previous_file = $prev_image->profile_image;
        		$image_path    = FCPATH.$previous_file;

           	 	if($previous_file == NULL) {     
           	 
           	 		$finalImage = array('upload_data' => $this->upload->data());
                	$dir        = 'my_assets/profile_image/';
           	 		$fullImage  = $dir.$fileName;

           	 	} else {    

           	 		$finalImage = array('upload_data' => $this->upload->data());
                	$dir        = 'my_assets/profile_image/';
           	 		$fullImage  = $dir.$fileName;

       	 			unlink($image_path);
   	 			}  
        		
	        }


		} else {

			$profileError = $this->session->set_flashdata('image','Please select an image');
			redirect('main_control/index');

		}

		$result = $this->main_model->upload_propic($userid,$fullImage);
		$this->index();

	}



}

//============================= END OF main_control Controller =========================


?>

