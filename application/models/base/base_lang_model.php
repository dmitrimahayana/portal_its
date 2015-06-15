<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_lang_model extends Base_its_model {
	var $lang_table_name 	= null;
	var $lang_name 			= null;
	var $lang_content 		= null;
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_all($lang = null, $online = null)
	{
		$this->used->from($this->table_name);
		$this->used->join($this->lang_table_name,"$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key");
		if($online != null)
		{
			$this->used->where("$this->table_name.online",1);
		}
		if($lang != null)
		{
			$this->used->where("$this->lang_table_name.lang",$lang);
		}
		$this->used->order_by($this->lang_name, 'asc');
		$query = $this->used->get();
		return $query->result();
	}
	
	function get_object_lang_by_code($unique_key, $lang)
	{	
		$this->used->from($this->table_name);
		$this->used->join($this->lang_table_name,"$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key");
		$this->used->where("$this->table_name.$this->unique_key",$unique_key);
		$this->used->where("$this->lang_table_name.lang",$lang);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_object_lang($id, $lang)
	{
		$this->used->from($this->table_name);
		$this->used->join($this->lang_table_name, "$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key", 'left');
		$this->used->where("$this->table_name.$this->primary_key", $id);
		$this->used->where("$this->lang_table_name.lang", $lang);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_lang_name($id, $lang)
	{
		$this->used->select("$this->lang_table_name.$this->lang_name");
		$this->used->from($this->table_name);
		$this->used->join($this->lang_table_name, "$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key", 'left');
		$this->used->where("$this->table_name.$this->primary_key", $id);
		$this->used->where("$this->lang_table_name.lang", $lang);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			$lang_name = $this->lang_name;
			return $result[0]->$lang_name;
		}
		else return null;
	}
	
	function get_some($offset, $num, $filter=null)
	{
		$this->used->distinct();
		if($this->lang_content != null)
		{
			$this->used->select("t.*, l_id.$this->lang_name as title_id, l_en.$this->lang_name as title_en, l_id.$this->lang_content as content_id, l_en.$this->lang_content as content_en");
		}
		else if($this->lang_name != null)
		{
			$this->used->select("t.*, l_id.$this->lang_name as title_id, l_en.$this->lang_name as title_en");
		}
		$this->used->from("$this->table_name t");
		$this->used->join("$this->lang_table_name l_id","t.$this->primary_key=l_id.$this->primary_key and l_id.lang='id'");
		$this->used->join("$this->lang_table_name l_en","t.$this->primary_key=l_en.$this->primary_key and l_en.lang='en'");
		$this->used->limit($num, $offset);
		if($filter!=null)
		{
			$this->used->like($this->unique_key, $filter);
			if($this->lang_name != null)
			{
				$this->used->or_like("l_id.$this->lang_name", $filter);
				$this->used->or_like("l_en.$this->lang_name", $filter);
			}
			if($this->lang_content != null)
			{
				$this->used->or_like("l_id.$this->lang_content", $filter);
				$this->used->or_like("l_en.$this->lang_content", $filter);
			}
		}
		$this->used->order_by($this->unique_key, 'asc');
		$query = $this->used->get();
		return $query->result();
	}
	
	function count_all($filter=null)
	{
		$this->used->select('COUNT(*) as total ');		
		$this->used->from("$this->table_name t");
		$this->used->join("$this->lang_table_name l_id","t.$this->primary_key=l_id.$this->primary_key and l_id.lang='id'");
		$this->used->join("$this->lang_table_name l_en","t.$this->primary_key=l_en.$this->primary_key and l_en.lang='en'");
		if($filter!=null)
		{
			$this->used->like($this->unique_key, $filter);
			if($this->lang_name != null)
			{
				$this->used->or_like("l_id.$this->lang_name", $filter);
				$this->used->or_like("l_en.$this->lang_name", $filter);
			}
			if($this->lang_content != null)
			{
				$this->used->or_like("l_id.$this->lang_content", $filter);
				$this->used->or_like("l_en.$this->lang_content", $filter);
			}
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
	
	function add($insert, $insert_id, $insert_en)
	{
		if($this->get_id($_POST[$this->unique_key]) != null) // Is already exists
		{
			// View the add page again with notification
			return;
		}
		$this->used->trans_begin();
		$this->used->insert($this->table_name, $insert);
		
		$id = $this->get_id($_POST[$this->unique_key]);
		$insert_id[$this->primary_key] = $id;
		$this->used->insert($this->lang_table_name, $insert_id);
		if($insert_en != null)
		{
			$insert_en[$this->primary_key] = $id;
			$this->used->insert($this->lang_table_name, $insert_en);
		}
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
	
	function edit($insert, $insert_id, $insert_en)
	{
		$id = $_POST['id_primary'];
		$this->used->trans_begin();
		$this->used->where($this->primary_key, $id);
		$this->used->update($this->table_name, $insert);
		
		$this->used->where($this->primary_key, $id);
		$this->used->where('lang', 'id');
		$this->used->update($this->lang_table_name, $insert_id);
		if($insert_en != null)
		{
			$insert_en[$this->primary_key] = $id;
			$this->used->where($this->primary_key, $id);
			$this->used->where('lang', 'en');
			$this->used->update($this->lang_table_name, $insert_en);
		}
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

		$this->used->where($this->primary_key, $id);
		$this->used->where('lang', 'id');
		$this->used->delete($this->lang_table_name);
		
		$this->used->where($this->primary_key, $id);
		$this->used->where('lang', 'en');
		$this->used->delete($this->lang_table_name);
		
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
/* End of Base Lang Model */
/* 23 Juli 2012 [11:22 AM] */
?>