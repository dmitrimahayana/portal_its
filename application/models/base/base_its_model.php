<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_its_model extends CI_Model {
	var $table_name 	= null;
	var $primary_key 	= null;
	var $unique_key 	= null;
	var $used			= null;
	var $database		= "its";
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->used = $this->load->database($this->database, TRUE);
    }
	
	function get_all()
	{
		$this->used->from($this->table_name);
		$this->used->order_by($this->unique_key, 'asc');
		$query = $this->used->get();
		return $query->result();
	}
	
	function get_all_online($lang = null)
	{
		$this->used->from($this->table_name);
		$this->used->where('online',1);
		if($lang != null)
		{
			$this->used->where('lang',$lang);
		}
		$this->used->order_by($this->unique_key, 'asc');
		
		$query = $this->used->get();
		return $query->result();
	}
	
	function get_id($name)
	{
		$this->used->select($this->primary_key);
		$this->used->from($this->table_name);
		$this->used->where($this->unique_key, $name);
		
		$temp = $this->primary_key;
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			$name = $result[0]->$temp;
			return $name;
		}
		else return null;
	}
	
	function get_by_name($name)
	{
		$this->used->from($this->table_name);
		$this->used->where($this->unique_key, $name);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_by_id($id)
	{
		$this->used->from($this->table_name);
		$this->used->where($this->primary_key, $id);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_some($offset, $num, $filter=null)
	{
		$this->used->distinct();
		$this->used->from($this->table_name);
		if($filter!=null)
		{
			$this->used->like($this->unique_key, $filter);
		}
		$this->used->limit($num, $offset);
		$this->used->order_by($this->unique_key,'asc');
		
		$query = $this->used->get();
		return $query->result();
	}
	
	function count_all($filter = null)
	{
		$this->used->select('COUNT(*) as total ');
		$this->used->from($this->table_name);
		if($filter!=null)
		{
			$this->used->like($this->unique_key, "$filter");
		}
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
	
	function get_post_data() {}	// Interface untuk setiap model supaya implement
	
	function add($insert)
	{
		if($this->get_id($_POST[$this->unique_key]) != null) // Is already exists
		{
			// View the add page again with notification
			return;
		}
		$this->used->trans_begin();
		$this->used->insert($this->table_name, $insert);
		if ($this->used->trans_status() === FALSE)
		{
			$this->used->trans_rollback();
			return false;
		}
		else
		{
			$this->used->trans_commit();
			return true;
		}
	}
	
	function edit($insert)
	{
		$id = $_POST['id_primary'];
		$this->used->trans_begin();
		$this->used->where($this->primary_key, $id);
		$this->used->update($this->table_name, $insert);
		if ($this->used->trans_status() === FALSE)
		{
			$this->used->trans_rollback();
			return false;
		}
		else
		{
			$this->used->trans_commit();
			return true;
		}
	}
	
	function delete($id)
	{
		$this->used->where($this->primary_key, $id);
		$this->used->delete($this->table_name);
		if ($this->used->trans_status() === FALSE)
		{
			$this->used->trans_rollback();
			return false;
		}
		else
		{
			$this->used->trans_commit();
			return true;
		}
	}
}
/* End of Base ITS Model */
/* 23 Juli 2012 [11:22 AM] */
?>