<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page_access_model extends CI_Model {
	var $table_name = null;
	var $primary_key = null;
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name = "page_access";
		$this->primary_key = "id_group";
    }
	
	function get($user_group)
	{
		$used = $this->load->database('its', TRUE);
		$used->select('b.*');
		$used->from("$this->table_name p");
		$used->join('backend_page b', 'b.id_backend_page=p.id_backend_page');
		$used->order_by('p.id_backend_page','asc');
		$used->where($this->primary_key, $user_group);
		$query = $used->get();
		return $query->result();
	}
}
/* End of Page Access Model */
/* 31 Juli 2012 [10:38 AM] */