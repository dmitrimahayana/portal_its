<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend_crud {
	var $CI;
	public function __construct()
	{
		$this->CI = &get_instance();
		$this->CI->load->library('session');
	}
	/* CRUD Stakeholder Menu */
	public function insert_stakeholder_menu()
	{
		$this->CI->load->model('stakeholder_model');
		if($this->CI->stakeholder_model->get_stakeholder_id($_POST['name']) != null) // Is already exists
		{
			// View the add page again with notification
			return;
		}
		$used = $this->CI->load->database('its', TRUE);
		$used->trans_begin();
		if($_POST['online'] == null) {$_POST['online'] = 0;}
		$insert = array(
		   'name' => $_POST['name'] ,
		   'title' => $_POST['title'] ,
		   'order' => $_POST['order'] ,
		   'link' => $_POST['link'] ,
		   'icon' => $_POST['icon'] ,
		   'online' => $_POST['online']
		);
		$used->insert('stakeholder_menu', $insert);
		if ($used->trans_status() === FALSE)
		{
			$used->trans_rollback();
			return false;
		}
		else
		{
			$used->trans_commit();
			return true;
		}
	}
	public function update_stakeholder_menu()
	{
		$used = $this->CI->load->database('its', TRUE);
		$used->trans_begin();
		$id = $_POST['id_primary'];
		if($_POST['online'] == null) {$_POST['online'] = 0;}
		$update = array(
			'name' => $_POST['name'] ,
			'title' => $_POST['title'] ,
			'order' => $_POST['order'] ,
			'link' => $_POST['link'] ,
			'icon' => $_POST['icon'] ,
			'online' => $_POST['online']
		);
		$used->where('id_stakeholder_menu', $id);
		$used->update('stakeholder_menu', $update);
		if ($used->trans_status() === FALSE)
		{
			$used->trans_rollback();
			return false;
		}
		else
		{
			$used->trans_commit();
			return true;
		}
	}
	
	public function delete_stakeholder_menu($id)
	{
		$used = $this->CI->load->database('its', TRUE);
		$used->trans_begin();
		$used->where('id_stakeholder_menu', $id);
		$used->delete('stakeholder_menu');

		$used->where('id_stakeholder_menu', $id);
		$used->delete('stakeholder_menu_detail');
		
		if ($used->trans_status() === FALSE)
		{
			$used->trans_rollback();
			return false;
		}
		else
		{
			$used->trans_commit();
			return true;
		}
	}
	/* End CRUD Stakeholder Menu */
	/* CRUD Stakeholder */
	public function insert_stakeholder()
	{
		$this->CI->load->model('stakeholder_model');
		if($this->CI->stakeholder_model->get_stakeholder_id($_POST['name']) != null) // Is already exists
		{
			// View the add page again with notification
			return;
		}
		$used = $this->CI->load->database('its', TRUE);
		$used->trans_begin();
		$insert = array(
		   'name' => $_POST['name'] 
		);
		$used->insert('stakeholder', $insert);
		$id = $this->CI->stakeholder_model->get_stakeholder_id($_POST['name']);
		$insert = array(
		   'id_stakeholder' => $id ,
		   'lang' => 'id' ,
		   'name' => $_POST['name_id']
		);
		$used->insert('stakeholder_lang', $insert);
		if($_POST['name_en'] != null)
		{
			$insert = array(
			   'id_stakeholder' => $id ,
			   'lang' => 'en' ,
			   'name' => $_POST['name_en']
			);
			$used->insert('stakeholder_lang', $insert);
		}
		$menus = $_POST['list_menu'];
		if($menus != null and $menus !="")
		{
			$list_menu = explode(" ", $menus);
			foreach($list_menu as $row):
				if($row>0)
				{
					$insert = array(
					   'id_stakeholder' => $id ,
					   'id_stakeholder_menu' => $row
					);
					$used->insert('stakeholder_menu_detail', $insert);
				}
			endforeach;
		}
		if ($used->trans_status() === FALSE)
		{
			$used->trans_rollback();
			return false;
		}
		else
		{
			$used->trans_commit();
			return true;
		}
	}
	public function update_stakeholder()
	{
		$used = $this->CI->load->database('its', TRUE);
		$used->trans_begin();
		if($_POST['parent'] == 0) {$_POST['parent'] = null;}
		$id = $_POST['id_primary'];
		$update = array(
			'name' => $_POST['name'] 
		);
		$used->where('id_stakeholder', $id);
		$used->update('stakeholder', $update);
		$update = array(
			'name' => $_POST['name_id']
		);
		$used->where('id_stakeholder', $id);
		$used->where('lang', 'id');
		$used->update('stakeholder_lang', $update);
		if($_POST['name_en'] != null)
		{
			$update = array(
			   'name' => $_POST['name_en']
			);
			$used->where('id_stakeholder', $id);
			$used->where('lang', 'en');
			$used->update('stakeholder_lang', $update);
		}
		$menus = $_POST['list_menu'];
		$used->where('id_stakeholder', $id);
		$used->delete('stakeholder_menu_detail');
		if($menus != null and $menus !="")
		{
			$list_menu = explode(" ", $menus);
			foreach($list_menu as $row):
				if($row>0)
				{
					$insert = array(
					   'id_stakeholder' => $id ,
					   'id_stakeholder_menu' => $row
					);
					$used->insert('stakeholder_menu_detail', $insert);
				}
			endforeach;
		}
		if ($used->trans_status() === FALSE)
		{
			$used->trans_rollback();
			return false;
		}
		else
		{
			$used->trans_commit();
			return true;
		}
	}
	public function delete_stakeholder($id)
	{
		$used = $this->CI->load->database('its', TRUE);
		$used->trans_begin();
		$used->where('id_stakeholder', $id);
		$used->delete('stakeholder');

		$used->where('id_stakeholder', $id);
		$used->where('lang', 'id');
		$used->delete('stakeholder_lang');
		
		$used->where('id_stakeholder', $id);
		$used->where('lang', 'en');
		$used->delete('stakeholder_lang');
		
		$used->where('id_stakeholder', $id);
		$used->delete('stakeholder_menu_detail');
		
		if ($used->trans_status() === FALSE)
		{
			$used->trans_rollback();
			return false;
		}
		else
		{
			$used->trans_commit();
			return true;
		}
	}
	/* End CRUD Stakeholder */
}
/* End of CRUD */
/* 31 Juli 2012 [10:38 AM] */