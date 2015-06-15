<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_Model extends Base_its_model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->helper('security');
		$this->load->library('encrypt');
		$this->table_name = "users";
		$this->primary_key = "id_user";
		$this->unique_key = "username";
    }
	
	function get_all()
	{
		$this->used->distinct();
		$this->used->select('u.id_user, u.username, u.screen_name, u.join_date, u.last_visit, u.email, g.level, g.group_name ');
		$this->used->from('users u');
		$this->used->join('user_groups g','u.id_group=g.id_group');
		$this->used->order_by('u.id_user','asc');
		
		$query = $this->used->get();
		return $query->result();
	}
	
	function get_some($offset, $num, $filter=null)
	{
		$this->used->distinct();
		$this->used->from($this->table_name);
		$this->used->join('user_groups', "user_groups.id_group=$this->table_name.id_group");
		if($filter!=null)
		{
			$this->used->like($this->unique_key, $filter);
		}
		$this->used->limit($num, $offset);
		$this->used->order_by($this->unique_key,'asc');
		
		$query = $this->used->get();
		return $query->result();
	}
	
	function get_by_id($id)
	{
		$this->used->select('u.*, g.*');
		$this->used->from('users u');
		$this->used->join('user_groups g','u.id_group=g.id_group');
		$this->used->where($this->primary_key, $id);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function login($username, $password)
	{
		$query = $this->used->get_where('users', array('password'=>do_hash($password), 'username'=>$username, 'active'=>1));
		return ($query->num_rows() > 0);
	}
	
	function get_data($username)
	{
		$this->used->select('u.id_user, u.id_group, u.last_visit, u.username, u.screen_name, g.level, g.group_name, g.description');
		$this->used->from('users u');
		$this->used->join('user_groups g','u.id_group=g.id_group');
		$this->used->where('u.username', $username);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_history($username, $limit)
	{
		$this->used->select('u.id_user, u.id_group, u.last_visit, u.screen_name, l.ip_address as ip, l.time as waktu, l.success');
		$this->used->from('users u');
		$this->used->join('login_history l','u.username=l.username');
		$this->used->where('u.username', $username);
		$this->used->limit($limit);
		$this->used->order_by('l.time', 'desc');
		
		$query = $this->used->get();
		$result = $query->result();
		return $result;
	}
	
	function get_post_data()
	{
		$insert = array(
		   'username' => $_POST['name'] ,
		   'screen_name' => $_POST['screen_name'] ,
		   'id_group' => $_POST['group'] ,
		   'email' => $_POST['email'] ,
		   'join_date' => gmt_to_local(local_to_gmt(time()), 'UP7', FALSE),
		   'salt' => do_hash($_POST['password'], 'md5')
		);
		if($_POST['password'] != EMPTY_STRING)
		{
			$insert['password'] = do_hash($_POST['password']);
		}
		return $insert;
	}
	
	function add()
	{
		$insert = $this->get_post_data();
		return parent::add($insert);
	}
	
	function edit()
	{
		$insert = $this->get_post_data();
		return parent::edit($insert);
	}
}
/* End of User Model */
/* 26 Juli 2012 [12:13 PM] */
?>