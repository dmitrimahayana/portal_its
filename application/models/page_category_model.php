<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page_category_model extends Base_its_model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name 	= "page_category";
		$this->primary_key 	= "id_page_category";
		$this->unique_key 	= "code";
    }
	
	/**
	 *	Override get_some from Base_its_model
	 */
	function get_some($offset, $num, $filter=null)
	{
		$used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->from($this->table_name);
		if($filter!=null)
		{
			$used->like($this->unique_key, $filter);
			$used->or_like('name', $filter);
		}
		$used->limit($num, $offset);
		$used->order_by($this->unique_key,'asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	/**
	 *	Override count_all from Base_its_model
	 */
	function count_all($filter = null)
	{
		$used = $this->load->database('its', TRUE);
		$used->select('COUNT(*) as total ');
		$used->from($this->table_name);
		if($filter!=null)
		{
			$used->like($this->unique_key, "$filter");
			$used->or_like('name', $filter);
		}
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
	
	function get_post_data()
	{
		$insert = array(
		   'name' => $_POST['name'] ,
		   'code' => $_POST['code']
		);
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
/* End of Page Category Model */
/* 23 Juli 2012 [10:55 AM] */
?>