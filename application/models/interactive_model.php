<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Interactive_model extends Base_lang_image_model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name 		= "interactive";
		$this->primary_key 		= "id_interactive";
		$this->unique_key 		= "name";
		$this->lang_table_name	= "interactive_lang";
		$this->lang_name		= "text";
		$this->image_column		= "media";
    }
	
	function get_post_data()
	{
		$data = array();
		if($_POST['online'] == null) {$_POST['online'] = 0;}
		$date_start = strtotime($_POST['date_start']);
		$date_end = strtotime($_POST['date_end']);
		if($date_end < $date_start){
			$date_end = $date_start + TWO_WEEKS;
		}
		$data['insert'] = array(
			'name' => $_POST['name'],
			'deskripsi' => $_POST['deskripsi'],
			'deskripsi_en' => $_POST['deskripsi_en'],
			'url' => $_POST['url'],
			'order' => $_POST['order'],
			'online' => $_POST['online'],
			'date_start' => $date_start,
			'date_end' => $date_end
		);
		$data['insert_id'] = array(
			'lang' => 'id',
			'text' => $_POST['name_id'],
			'media' => $_POST['media_id']		
		);
		if($_POST['name_en'] != null)
		{
			$data['insert_en'] = array(
			   'lang' => 'en',
			   'text' => $_POST['name_en'],
			   'media' => $_POST['media_en']
			);
		}
		else $insert_en = null;
		return $data;
	}
	
	function add()
	{
		$data = $this->get_post_data();
		return parent::add($data['insert'], $data['insert_id'], $data['insert_en']);
	}
	
	function edit()
	{
		$data = $this->get_post_data();
		return parent::edit($data['insert'], $data['insert_id'], $data['insert_en']);
	}
}
/* End of Interactive Model */
/* 26 Juli 2012 [12:13 PM] */
?>