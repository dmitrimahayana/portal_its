<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_group_model extends Base_its_model {
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name 	= "user_groups";
		$this->primary_key 	= "id_group";
		$this->unique_key 	= "slug";
    }
	
	function get_all_access($id)
	{
		$used = $this->load->database('its', TRUE);
		$used->select('b.*');
		$used->from("$this->table_name u");
		$used->join('page_access p', 'u.id_group=p.id_group');
		$used->join('backend_page b', 'b.id_backend_page=p.id_backend_page');
		$used->where("u.$this->primary_key", $id);
		
		$query = $used->get();
		$result = $query->result();
		return $result;
	}
	
	function get_post_data()
	{
		$insert = array(
			'slug' => $_POST['slug'],
			'group_name' => $_POST['group_name'],
			'description' => $_POST['description'],
			'level' => $_POST['level']
		);
		return $insert;
	}
	
	function add()
	{
		$insert = $this->get_post_data();
		$ok = parent::add($insert);
		if($ok)
		{
			$this->used->trans_begin();
			$menus = $_POST['list_menu'];
			if($menus != null and $menus !="")
			{
				$list_menu = explode(" ", $menus);
				$id = $this->get_id($_POST[$this->unique_key]);
				foreach($list_menu as $row):
					if($row>0)
					{
						$insert = array(
						   $this->primary_key => $id ,
						   'id_backend_page' => $row
						);
						$this->used->insert('page_access', $insert);
					}
				endforeach;
			}
			if ($this->used->trans_status() === FALSE)
			{
				$this->used->trans_rollback();
				$this->delete($this->get_id($_POST[$this->unique_key]));
				return false;
			}
			else
			{
				$this->used->trans_commit();
				return true;
			}
		}
		else
		{
			$this->delete($this->get_id($_POST[$this->unique_key]));
			return false;
		}
	}
	
	function edit()
	{
		$insert = $this->get_post_data();
		$ok = parent::edit($insert);
		if($ok)
		{
			$this->used->trans_begin();
			$menus = $_POST['list_menu'];
			if($menus != null and $menus !="")
			{
				$list_menu = explode(" ", $menus);
				$id = $this->get_id($_POST[$this->unique_key]);
				$this->used->where($this->primary_key, $id);
				$this->used->delete('page_access');
				foreach($list_menu as $row):
					if($row>0)
					{
						$insert = array(
						   $this->primary_key => $id ,
						   'id_backend_page' => $row
						);
						$this->used->insert('page_access', $insert);
					}
				endforeach;
			}
			if ($this->used->trans_status() === FALSE)
			{
				$this->used->trans_rollback();
				$this->delete($this->get_id($_POST[$this->unique_key]));
				return false;
			}
			else
			{
				$this->used->trans_commit();
				return true;
			}
		}
		else
		{
			$this->delete($this->get_id($_POST[$this->unique_key]));
			return false;
		}		
	}
}
/* End of User Group Model */
/* 31 Juli 2012 [10:38 AM] */