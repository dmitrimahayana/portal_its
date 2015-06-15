<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Setting_model extends Base_its_model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name 	= "setting";
		$this->primary_key 	= "id_setting";
		$this->unique_key 	= "name";
    }
	
	function get_post_data()
	{
		$insert = array(
		   'name' => $_POST['name'],
		   'value' => $_POST['value']
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
/* End of Setting Model */
/* 26 Juli 2012 [11:49 AM] */
?>