<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_image_model extends Base_its_model {
	var $image_table_name 	= "media_images";
	var $image_column 		= null;
	var $image_key 			= "id_images";
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_all($differ = null)
	{
		$this->used->select("$this->table_name.*, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
		$this->used->from($this->table_name);
		if($differ == null)
		{
			// Standar
			$this->used->join($this->image_table_name,"$this->table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join($this->image_table_name,"$this->lang_table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		$this->used->order_by($this->unique_key, 'asc');
		$query = $this->used->get();
		
		return $query->result();
	}
	
	function get_all_online($differ = null)
	{
		$this->used->select("$this->table_name.*, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
		$this->used->from($this->table_name);
		if($differ == null)
		{
			// Standar
			$this->used->join($this->image_table_name,"$this->table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join($this->image_table_name,"$this->lang_table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		$this->used->where('online',1);
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
	
	function get_by_id($id, $differ = null)
	{
		$this->used->select("$this->table_name.*, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
		$this->used->from($this->table_name);
		if($differ == null)
		{
			// Standar
			$this->used->join($this->image_table_name,"$this->table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join($this->image_table_name,"$this->lang_table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		$this->used->where($this->primary_key, $id);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_some($offset, $num, $filter=null, $differ = null)
	{
		$this->used->distinct();
		$this->used->select("$this->table_name.*, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
		$this->used->from($this->table_name);
		if($differ == null)
		{
			// Standar
			$this->used->join($this->image_table_name,"$this->table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join($this->image_table_name,"$this->lang_table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		if($filter!=null)
		{
			$this->used->like($this->unique_key, $filter);
		}
		$this->used->limit($num, $offset);
		$this->used->order_by($this->unique_key,'asc');
		
		$query = $this->used->get();
		return $query->result();
	}
	
	function count_all($filter = null, $differ = null)
	{
		$this->used->select('COUNT(*) as total ');
		$this->used->from($this->table_name);
		if($differ == null)
		{
			// Standar
			$this->used->join($this->image_table_name,"$this->table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join($this->image_table_name,"$this->lang_table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
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
}
/* End of Base Image Model */
/* 24 Juli 2012 [02:32 PM] */
?>