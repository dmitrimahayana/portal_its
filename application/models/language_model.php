<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_all_language()
	{
		$used = $this->load->database('its', TRUE);
		$used->select('lang, name, lang as link');
		$used->from('lang');
		$used->order_by('lang.ordering');
		
		$query = $used->get();
		return $query->result();
	}
}
/* End of Language Model */
/* 31 Juli 2012 [10:38 AM] */