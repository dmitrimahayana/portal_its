<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Terms_model extends Base_lang_model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name 		= "terms";
		$this->primary_key 		= "id_terms";
		$this->unique_key 		= "terms";
		$this->lang_table_name	= "terms_lang";
		$this->lang_name		= "text";
    }
	
	function get_all($lang = 'id')
	{
		$used = $this->load->database('its', TRUE);
		$used->select("terms.$this->unique_key, terms_lang.$this->lang_name");
		$used->from('terms');
		$used->join('terms_lang','terms.id_terms=terms_lang.id_terms');
		$used->where('terms_lang.lang',$lang);
		
		$unique_key = $this->unique_key;
		$lang_name = $this->lang_name;
		
		$query = $used->get();
		$result = $query->result();
		$arr = array();
		foreach($result as $row)
		{
			$arr[$row->$unique_key] = $row->$lang_name;
		}
		return $arr;
	}
	
	function get_post_data()
	{
		$data = array();
		$data['insert'] = array(
		   'terms' => $_POST['terms']
		);
		$data['insert_id'] = array(
		   'lang' => 'id' ,
		   'text' => $_POST['name_id']
		);
		if($_POST['name_en'] != null)
		{
			$data['insert_en'] = array(
			   'lang' => 'en' ,
			   'text' => $_POST['name_en']
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
/* End of Terms Model */
/* 26 Juli 2012 [12:13 PM] */
?>