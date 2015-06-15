<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_page_model extends Base_its_model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name 	= "backend_page";
		$this->primary_key 	= "id_backend_page";
		$this->unique_key 	= "name";
    }
	
	function get_all_online()
	{
		$used = $this->load->database('its', TRUE);
		$used->from($this->table_name);
		$used->where('online',1);
		$used->order_by('order', 'asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	function get_post_data()
	{
		if($_POST['parent'] == 0) {$_POST['parent'] = null;}
		$insert = array(
			'name' => $_POST['name'] ,
			'id_parent' => $_POST['parent'],
			'order' => $_POST['order'] ,
			'link' => $_POST['link'] ,
			'display_name' => $_POST['display_name'] ,
			'online' => $_POST['online']
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
/* End of Backend Page Model */
/* 31 Juli 2012 [10:38 AM] */