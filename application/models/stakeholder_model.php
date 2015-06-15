<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stakeholder_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_all()
	{
	}
	
	function get_all_stakeholder($lang='id')
	{
		$used = $this->load->database('its', TRUE);
		$used->select('stakeholder_lang.name as display_name, stakeholder.name, stakeholder.name as link, stakeholder.id_stakeholder');
		$used->from('stakeholder');
		$used->join('stakeholder_lang','stakeholder.id_stakeholder=stakeholder_lang.id_stakeholder');
		$used->where('stakeholder_lang.lang', $lang);
		$used->order_by('stakeholder.id_stakeholder','asc');
		// $used->order_by('stakeholder.name','asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	function get_stakeholder_menu_by_id($id)
	{
		$used = $this->load->database('its', TRUE);
		$used->from('stakeholder_menu sm');
		$used->where('sm.id_stakeholder_menu', $id);
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_stakeholder_id($name)
	{
		$used = $this->load->database('its', TRUE);
		$used->select('id_stakeholder');
		$used->from('stakeholder');
		$used->where('name', $name);
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$name = $result[0]->id_stakeholder;
			return $name;
		}
		else return null;
	}
	
	function get_stakeholder_code($id)
	{
		$used = $this->load->database('its', TRUE);
		$used->select('name');
		$used->from('stakeholder');
		$used->where('id_stakeholder', $id);
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$name = $result[0]->name;
			return $name;
		}
		else return null;
	}
	
	function get_stakeholder_name($stakeholder, $lang='id')
	{
		$used = $this->load->database('its', TRUE);
		$used->select('stakeholder_lang.name');
		$used->from('stakeholder');
		$used->join('stakeholder_lang','stakeholder.id_stakeholder=stakeholder_lang.id_stakeholder');
		$used->where('stakeholder_lang.lang', $lang);
		$used->where('stakeholder.name', $stakeholder);
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$name = $result[0]->name;
			return $name;
		}
		else return null;
	}

	function get_stakeholder($offset, $num)
	{
		$used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->from('stakeholder');
		$used->limit($num, $offset);
		$used->order_by('id_stakeholder','asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	function count_all_stakeholder()
	{
		$used = $this->load->database('its', TRUE);
		$used->select('COUNT(*) as total ');
		$used->from('stakeholder');
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
	
	function get_stakeholder_menu($stakeholder = null, $offset=0, $num=0)
	{
		$used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('sm.id_stakeholder_menu, sm.name, sm.title, sm.link, sm.order, m.link, m.link_thumb');
		$used->from('stakeholder_menu sm');
		$used->join('stakeholder_menu_detail sd','sm.id_stakeholder_menu=sd.id_stakeholder_menu', 'left');
		$used->join('stakeholder s','s.id_stakeholder = sd.id_stakeholder', 'left');
		$used->join('media_images m','sm.icon = m.id_images', 'left');
		
		if($stakeholder != null)
		{
			$used->where('s.name', $stakeholder);
			$used->where('sm.online', 1);
		}
		if($num>0)
		{
			$used->limit($num, $offset);
		}
		// $used->order_by('sm.order','asc');
		// $used->order_by('sd.id_stakeholder','asc');
		// $used->order_by('sm.id_stakeholder_menu','asc');
		// $used->order_by('sm.name', 'asc');
		$used->order_by('sm.title', 'asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	function get_stakeholder_and_menu($stakeholder = null, $offset=0, $num=0)
	{
		$used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('sm.id_stakeholder_menu, sm.name, sm.title, sm.link, sm.order, m.link, m.link_thumb');
		$used->from('stakeholder s');
		$used->join('stakeholder_menu_detail sd','s.id_stakeholder=sd.id_stakeholder');
		$used->join('stakeholder_menu sm','sm.id_stakeholder_menu = sd.id_stakeholder_menu');
		$used->join('media_images m','sm.icon = m.id_images', 'left');
		
		if($stakeholder != null)
		{
			$used->where('s.name', $stakeholder);
		}
		$used->limit($num, $offset);
		$used->order_by('s.name','asc');
		$used->order_by('sm.name','asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	function count_stakeholder_menu()
	{
		$used = $this->load->database('its', TRUE);
		$used->select('COUNT(*) as total ');
		$used->from('stakeholder_menu');
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
}
/* End of Stakeholder Model */
/* 31 Juli 2012 [10:38 AM] */