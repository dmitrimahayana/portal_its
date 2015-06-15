<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article_model extends Base_lang_model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name 		= "article";
		$this->primary_key 		= "id_article";
		$this->unique_key 		= "name";
		$this->lang_table_name	= "article_lang";
		$this->lang_name		= "title";
		$this->lang_content		= "content";
    }
		
	function get_article_data($article_name, $lang)
	{	
		$used = $this->load->database('its', TRUE);
		$used->from($this->table_name);
		$used->join($this->lang_table_name,"$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key");
		$used->where("$this->lang_table_name.lang",$lang);
		$used->where("$this->table_name.$this->unique_key",$article_name);
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_post_data()
	{
		$data = array();
		if($_POST['online'] == null) {$_POST['online'] = 0;}
		$data['insert'] = array(
		   'name' => $_POST['name'],
		   'online' => $_POST['online'],
		   'metadata' => $_POST['metadata']
		);
		$data['insert_id'] = array(
		   'lang' => 'id',
		   'content' => $_POST['name_id'],
		   'title' => $_POST['title_id']
		);
		if($_POST['name_en'] != null)
		{
			$data['insert_en'] = array(
			   'lang' => 'en',
			   'content' => $_POST['name_en'],
			   'title' => $_POST['title_en']
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
/* End of Article Model */
/* 26 Juli 2012 [12:13 PM] */
?>