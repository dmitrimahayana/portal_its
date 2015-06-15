<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page_model extends Base_lang_model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name 		= "page";
		$this->primary_key 		= "id_page";
		$this->unique_key 		= "name";
		$this->lang_table_name	= "page_lang";
		$this->lang_name		= "text";
    }
	
	/**
	 *	Override get_all from Base_its_model
	 */
	function get_all()
	{
		$used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('pl.text as title, p.name, p.id_parent, p.id_page, p.link, p.has_child ');
		$used->from('page p');
		$used->join('page_lang pl', 'pl.id_page=p.id_page');
		$used->order_by('p.order','asc');
		$used->order_by('p.id_page','asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	/**
	 *	Override get_all_online from Base_its_model
	 */
	function get_all_online($lang='id', $id_category=null)
	{
		$used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('pl.text as title, p.*, p2.id_page as ada ');
		$used->from('page p');
		$used->join('page_lang pl', 'pl.id_page=p.id_page');
		$used->join('(select pp.id_page from page p inner join page pp on p.id_parent=pp.id_page) p2', 'p.id_page = p2.id_page', 'left');
		$used->where('p.online', 1);
		$used->where('pl.lang', $lang);
		if($id_category!=null)
		{
			$used->where('p.id_page_category', $id_category);
		}
		$used->order_by('p.order','asc');
		$used->order_by('p.id_page','asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	/**
	 *	Override get_some from Base_its_model
	 */
	function get_some($offset, $num, $filter=null)
	{
		$used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('p.id_page, pp.name as parent_name, p.name, p.link, p.order, p.online, pc.name as page_category, p.metadata');
		$used->from('page p');
		$used->join('page pp', 'p.id_parent=pp.id_page', 'left');
		$used->join('page_category pc', 'p.id_page_category=pc.id_page_category');
		if($filter!=null)
		{
			$used->like('p.name', $filter);
			$used->or_like('pp.name', $filter);
			$used->or_like('p.metadata', $filter);
			$used->or_like('pc.name', $filter);
		}
		$used->limit($num, $offset);
		$used->order_by('p.id_parent', 'asc');
		$used->order_by('p.name', 'asc');
		
		$query = $used->get();
		return $query->result();
	}
	
	/**
	 *	Override count_all from Base_its_model
	 */
	function count_all($filter = null)
	{
		$used = $this->load->database('its', TRUE);
		$used->select('COUNT(*) as total ');
		$used->from('page p');
		$used->join('page pp', 'p.id_parent=pp.id_page', 'left');
		$used->join('page_category pc', 'p.id_page_category=pc.id_page_category');
		if($filter!=null)
		{
			$used->like('p.name', $filter);
			$used->or_like('pp.name', $filter);
			$used->or_like('p.metadata', $filter);
			$used->or_like('pc.name', $filter);
		}
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
	
	function get_post_data()
	{
		$data = array();
		if($_POST['online'] == null) {$_POST['online'] = 0;}
		if($_POST['parent'] == 0) {$_POST['parent'] = null;}
		$data['insert'] = array(
		   'name' => $_POST['name'] ,
		   'id_parent' => $_POST['parent'] ,
		   'order' => $_POST['order'] ,
		   'link' => $_POST['link'] ,
		   'id_page_category' => $_POST['category'] ,
		   'online' => $_POST['online'],
		   'metadata' => $_POST['metadata']
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
/* End of Page Model */
/* 26 Juli 2012 [12:13 PM] */
?>