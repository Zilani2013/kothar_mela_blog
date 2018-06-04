<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class admin_model extends CI_model {

    public function __construct() { 
    	parent::__construct(); 
    }


/*============================== select all blog users ==========================*/


    public function admin($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }




    public function blog_users($config)
    {
    	$this->db->select('*')->from('users')->limit($config['per_page'],$config['offset']);
    	$query = $this->db->get();

		return $query->result();
    }


/*============================== counting total members in blog ==========================*/

    public function total_members_blog()
    {
    	$this->db->select('*')->from('users');
    	$query = $this->db->get();
    	return $query->num_rows();
    }



/*============================== counting total posts on blog ==========================*/

    public function total_posts_on_blog()
    {
    	$this->db->select('*')->from('post_table');
    	$query = $this->db->get();
    	return $query->num_rows();
    }



/*============================== counting total comments in posts ==========================*/


    public function total_comments_on_blog()
    {
    	$this->db->select('*')->from('comments');
    	$query = $this->db->get();
    	return $query->num_rows();
    }



/*============================== counting users total posts on blog ==========================*/


    public function users_total_post($allUsers)
    {
      // print_r($allUsers);
    	$userid = array();
    	foreach ($allUsers as $ID) {

    		array_push($userid, $ID->id);
    	}	


    	$post_amount = array();
    	foreach ($userid as $singleID) {
    		$query = $this->db->query('SELECT * FROM post_table where userid ='.$singleID);
    		$result = $query->num_rows();
    		$post_amount[$singleID] = $result;
    	}

    	return $post_amount;

    }




/*============================== deleting an user ==========================*/


    public function deleteUsers($id)
    {
    	return $this->db->delete('users', array('id' => $id));
    }



/*============================== Searching users ==========================*/

    public function searchUser($searchVal)
    {
    	// echo $searchVal;
    	$this->db->like('name', $searchVal);
    	$query = $this->db->get('users');
      	return $row = $query->result();
    }



    public function allPosts($config)
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
    		 ->order_by('post_table_id','desc');


 			$query = $this->db->get();
			return $result = $query->result();

    }


    public function deletePost($postid)
    {
        return $query = $this->db->delete('post_table', array('id' => $postid));
    }





    public function deleteComment($commentid)
    {
         return $query = $this->db->delete('comments', array('id' => $commentid));
    }

    public function deleteReply($reply_commentid)
    {
        return $query = $this->db->delete('comment_replies', array('commentid' => $reply_commentid));
    }



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



    public function admin_total_post($userid)
    {
        $query = $this->db->query('SELECT * FROM post_table where userid='.$userid);
        return $query->num_rows();
    }



    public function adminAllPosts($userid,$config)
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
        
        $query         = $this->db->get();
        return $result = $query->result();
    }



    public function postdata_for_edit($postid)
    {
        $this->db->select('*')->from('post_table')->where('id', $postid);
        $query = $this->db->get();
        return $query->result();
    }



    public function previous_post_image($user_postid)
    {
        $this->db->select('post_image')->from('post_table')->where('id',$user_postid);
        $query = $this->db->get();
        return $query->row();

    }



    public function updata_post($data)
    {
        $postid = $data['id'];
        return $query = $this->db->update('post_table', $data, array('id' => $postid));
    }



    public function insert_about($about)
    {

        $this->db->set('contact', $about);
        $this->db->update('blog_contents');
    }


    public function blog_contents()
    {
        $query = $this->db->get('blog_contents');
        return $query->row();
    }



    public function updateAbout($about)
    {
        $this->db->set('about_blog', $about);
        $this->db->update('blog_contents');
    }

    public function updateTerms($terms)
    {
        $this->db->set('terms', $terms);
        $this->db->update('blog_contents');
    }

    public function updateContact($contact)
    {
        $this->db->set('contact', $contact);
        $this->db->update('blog_contents');
    }























}