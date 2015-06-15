<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Footer_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	private function get_all($lang, $category)
	{
		$used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('p.name, l.name as title, p.id_parent, p.link, p.id_page');
		$used->from('page p');
		$used->join('page_lang l','p.id_page=l.id_page');
		$used->join('page_category c','c.id_page_category=p.id_page_category');
		$used->where('l.lang', $lang);
		$used->where('c.code', $category);
		$used->order_by('p.order');
		
		$query = $used->get();
		return $query->result();
	}
		
	function get_all_fakultas($lang='id')
	{
		return $this->get_all($lang, 'faculty');
	}
	
	function get_all_jurusan($lang='id')
	{
		return $this->get_all($lang, 'department');
	}
	
	function get_all_unit_kerja($lang='id')
	{
		return $this->get_all($lang, 'work-unit');
	}
}
/* End of Footer Model */
/* 31 Juli 2012 [10:38 AM] */