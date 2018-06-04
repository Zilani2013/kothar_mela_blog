<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class main_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }





/*============================================== Get users table data ==============================================*/

    public function get_users_data() {

    	$loggedin = "";
    	$loggedInUser = $this->session->userdata('email');

    	if(isset($loggedInUser)) { $loggedin = $loggedInUser; }

    	$query = $this->db->get_where('users', array('email' => $loggedin));

    	foreach ($query->result() as $row)
		{
		        $userData = array(
		        	'id'            => $row->id,
		        	'name'          => $row->name,
		        	'email'         => $row->email,
		        	'gender'        => $row->gender,
		        	'country'       => $row->country,
		        	'profile_image' => $row->profile_image
		        );

		        return $userData;
		}
    }




/*============================== Insert registration data into users table =========================================*/   

	public function insert_reg_data()
	{
	 	$registrationData = array(
		    'name'     => $this->input->post('name'),
		    'email'    => $this->input->post('email'),
		    'password' => md5($this->input->post('password')),
		    'gender'   => $this->input->post('gender'),
		    'country'  => $this->input->post('country')
	  	);

		$query = $this->db->insert('users',$registrationData);
		return $query;

	}


	public function name_already_exists($name)
	{
		$query = $this->db->get_where('users', array('name' => $name));
		if(empty($query->row_array())) {
			
			return true;

		} else {

			return false;
		}
	}



	public function email_already_exists($email) {

		$query = $this->db->get_where('users', array('email' => $email));

		if(empty($query->row_array())) {

			return true;

		} else {

			return false;
		}
	}



/*============================================ check login form data in db ====================================*/


	// retrieve data from users table and doing log in action 
	public function login($form_Email, $form_Pass) {

		// Validate
		$this->db->where('email', $form_Email);
		$this->db->where('Password',$form_Pass);
		$query = $this->db->get('users');


		if( $query->num_rows() == 1) {

			return true;
				

		} else {

			return false;
		}
	}



/*========================================= insert data into post_table data ========================================*/

	public function insert_post_data($post_data)
	{
		$postdata = array(
			'userid'        => $post_data['userid'],
			'post_category' => $post_data['post_category'],
			'post_title'    => $post_data['post_title'],
			'post_image'    => $post_data['fullImage'],
			'post_content'  => $post_data['post_content']
		);
		
		$query = $this->db->insert('post_table',$postdata);
		
	}


	public function total_comment_on_post($postDATA)
	{
		// print_r($postDATA); die();
		$postid = array();
		foreach($postDATA as $single_postid) {
			array_push($postid, $single_postid->post_table_id);
			// print_r($postid);
		}

		$total_comments = array();
		foreach($postid as $singleid) {
			$query  = $this->db->query('SELECT * FROM comments where postid='.$singleid);
			$result = $query->num_rows();
			$total_comments[$singleid] = $result;
		}

		return $total_comments;
	}



/*=============================================== Get post_table data ===================================================*/


	public function get_post_table_data( $config, $offset = 0 )
	{
		$category = $this->session->userdata('category');

		if($category == 'all') {
			$this->db->select('post_table.id As post_table_id,
	                    post_table.userid As post_table_userid,
	                    post_table.post_category,
	                    post_table.post_title,
	                    post_table.post_image,
	                    post_table.post_content,
	                    post_table.status As post_status,
	                    post_table.time As post_time,
	                    users.id AS user_table_id,
	                    users.name,
	                    users.email,
	                    users.password,
	                    users.gender,
	                    users.country,
	                    users.profile_image')

	        		 ->from('post_table')
	        		 ->join('users', 'post_table.userid = users.id')
	        		 ->limit( $config['per_page'], $config['offset'])
	        		 ->order_by('post_table_id','desc');
		
			$query = $this->db->get();
			return $result = $query->result();

		} else {

			$this->db->select('post_table.id As post_table_id,
	                    post_table.userid As post_table_userid,
	                    post_table.post_category,
	                    post_table.post_title,
	                    post_table.post_image,
	                    post_table.post_content,
	                    post_table.status As post_status,
	                    post_table.time As post_time,
	                    users.id AS user_table_id,
	                    users.name,
	                    users.email,
	                    users.password,
	                    users.gender,
	                    users.country,
	                    users.profile_image')

	        		 ->from('post_table')
	        		 ->join('users', 'post_table.userid = users.id')
	        		 ->limit( $config['per_page'], $config['offset'])
	        		 ->where('post_table.post_category',$category)
	        		 ->order_by('post_table_id','desc');
		
			$query = $this->db->get();
			return $result = $query->result();
		}
		
	}


	public function total_post()
	{
		$category = $this->session->userdata('category');
		if( $category == 'all' ) {

			return $this->db->get('post_table')->num_rows();

		} else {

			$query = $this->db->get_where('post_table',array('post_category' => $category));
			return $query->num_rows();

		}
	}



	public function total_posts($userid)
	{
		return $this->db->where('userid', $userid)->count_all_results('post_table');
	}


	public function total_commentsOn_post($postid)
	{	
		$query = $this->db->get_where('comments', array('postid' => $postid));
		return $query->num_rows();	
	}

	
/*============================== Get post_table data for readmore view =========================================*/


	public function readmore_data($postid)
	{
		// echo $postid;
		$this->db->select('post_table.id As post_table_id,
            post_table.userid As post_table_userid,
            post_table.post_category,
            post_table.post_title,
            post_table.post_image,
            post_table.post_content,
            post_table.status As post_status,
            post_table.time As post_time,
            users.id AS user_table_id,
            users.name,
            users.email,
            users.password,
            users.gender,
            users.country,
            users.profile_image')

		 ->from('post_table')
		 ->join('users', 'post_table.userid = users.id')
		 ->where('post_table.id', $postid);

	$query = $this->db->get();
	return $result = $query->result();


	}


/*========================================= inserting comment =================================================*/


	public function insert_comment($commentData)
	{
		//$userid,$postId, $comment
		return $query = $this->db->insert('comments', $commentData);

	}


/*========================================= inserting comments reply ===============================================*/


	public function insert_replies($replyData)
	{
		$query = $this->db->insert('comment_replies', $replyData);

	}



/*========================================= Get comments table data ====================================================*/


	public function get_commenter_posts($postid)
	{
		 $this->db->select('comments.id AS comments_table_id,
 							comments.userid AS comments_table_userid, 				
 							comments.postid,
 							comments.comments,
 							comments.status AS comments_table_status,
 							comments.time AS comments_table_time,
		 					post_table.id As post_table_id,
							post_table.userid As post_table_userid,
 							post_table.post_category,
 							post_table.post_title, 				
 							post_table.post_image,
 							post_table.post_content,
 							post_table.status As post_status,
 							post_table.time As post_time,
                 			users.id AS user_table_id,                 
                 			users.name,                 
                 			users.email,                 
                 			users.password,
                			users.gender,
                			users.country,
                			users.profile_image,
                			users.status AS users_status,
                			users.time AS users_time')
		 		->from('post_table')
		 		->join('comments','comments.postid = post_table.id','left')
		 		->join('users','comments.userid = users.id', 'left')
		 		->order_by('comments.id','desc')
		 		->where('postid',$postid);

	 		$query = $this->db->get();
			return $result = $query->result();

	}


/*======================================== Get comment_replies table data ===========================================*/


	public function get_replier_replies($postid)
	{
	 	$this->db->select('comments.id AS comments_table_id,
							comments.userid AS comments_table_userid, 				
							comments.postid,
							comments.comments,
							comments.status AS comments_table_status,
							comments.time AS comments_table_time,
							comment_replies.id AS replies_id,
 							comment_replies.userid AS replies_userid,
							comment_replies.commentid,
 							comment_replies.reply,
							comment_replies.status AS replies_status,
 							comment_replies.time AS replies_time,
				 			users.id AS user_table_id,                 
				 			users.name,                 
				 			users.email,                 
				 			users.password,
							users.gender,
							users.country,
							users.profile_image,
							users.status AS users_status,
							users.time AS users_time')
		 		->from('comments')
		 		->join('comment_replies','comment_replies.commentid = comments.id','left')
		 		->join('users','comment_replies.userid = users.id', 'left')
		 		->order_by('comment_replies.id','asc')
		 		->where('comments.postid',$postid);

	 		$query = $this->db->get();
			return $result = $query->result();
	}


/*======================================== Get all posts from post_table of user =====================================*/


	public function usersAllPosts($userid,$config)
	{
		$this->db->select('post_table.id As post_table_id,
		                    post_table.userid As post_table_userid,
		                    post_table.post_category,
		                    post_table.post_title,
		                    post_table.post_image,
		                    post_table.post_content,
		                    post_table.status As post_status,
		                    post_table.time As post_time,
		                    users.id AS user_table_id,
		                    users.name,
		                    users.email,
		                    users.password,
		                    users.gender,
		                    users.country,
		                    users.profile_image')

        		 ->from('post_table')
        		 ->join('users', 'post_table.userid = users.id')
        		 ->limit( $config['per_page'], $config['offset'])
        		 ->order_by('post_table_id','desc')
        		 ->where('post_table.userid',$userid);
		
		$query = $this->db->get();
		return $result = $query->result();
	}


	public function users_total_post($userid)
	{
		$query = $this->db->query('SELECT * FROM post_table where userid='.$userid);
		return $query->num_rows();
	}


	public function total_comments($postid)
	{
		$query = $this->db->get_where('comments', array('postid' => $postid));
		// return $query->num_rows();
	}


/*====================================== Get post_table data of user for edit =======================================*/

	public function postdata_for_edit($user_postid)
	{
		// echo $user_postid;

		$this->db->select('*')->from('post_table')->where('id', $user_postid);
		$query = $this->db->get();
		return $query->result();
	}


/*======================================= getting previous post image ========================================= */	

	public function previous_post_image($user_postid)
	{
		$this->db->select('post_image')->from('post_table')->where('id',$user_postid);
		$query = $this->db->get();
		return $query->row();

	}



/*============================================ updating post data =============================================*/

	public function updata_post($data)
	{
		$postid = $data['id'];
		return $query = $this->db->update('post_table', $data, array('id' => $postid));
	}



/*================================= deleting users pos by user ========================================= */

	public function delete_post($delete_id)
	{
		return $query = $this->db->delete('post_table', array('id' => $delete_id));
	
	}


/*================================= uploading Users profile picture ========================================= */

	public function upload_propic($userid,$fullImage)
	{
		$profile_image = $fullImage;
		return $query = $this->db->set('profile_image',$profile_image)->where('id',$userid)->update('users');

	}


/*================================= getting previous profile picture ========================================= */

	public function previous_profile_image($userid)
	{
		$this->db->select('profile_image')->from('users')->where('id',$userid);
		$query = $this->db->get();
		return $query->row();
	}


	public function about()
	{
		$query = $this->db->get('blog_contents');
		return $query->row();
	}




}

/*============================ End of main_model  ===============================================================*/


?>
