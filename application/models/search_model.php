<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function search($keyword, $lang='id')
	{
		$data	= $this->search_article($keyword, $lang);
		$data2	= $this->search_page($keyword, $lang);
		$hasil 	= array_merge($data, $data2);
		$hasil	= array_unique($hasil);
		sort($hasil);
		return $hasil;
	}
	
	function count_all($keyword, $lang='id')
	{
		$hasil = $this->search($keyword, $lang);
		return sizeof($hasil);
	}
	
	private function search_article($keyword, $lang)
	{	
		$used = $this->load->database('its', TRUE);
		$used->select('a.name, aa.title');
		$used->from('article a');
		$used->join('article_lang aa','a.id_article=aa.id_article');
		$where_sql = "`aa`.`lang` = '$lang' and (`aa`.`content` like '%$keyword%' or `a`.`metadata` like '%$keyword%')";
		$used->where($where_sql);
		
		$query = $used->get();
		$result = $query->result();
		$hasil = array();
		$count = 0;
		foreach ($result as $row)
		{
			$link = preg_replace('/index.php\//', '', site_url('article/'.$row->name));
			$hasil[$count] = anchor($link.'/'.$lang, $row->title, array('title' => $row->title));
			$count++;
		}
		
		return $hasil;
	}
	
	private function search_page($keyword, $lang)
	{
		$used = $this->load->database('its', TRUE);
		$used->select('a.name, a.link, aa.text as title');
		$used->from('page a');
		$used->join('page_lang aa','a.id_page=aa.id_page');
		$where_sql = "`aa`.`lang` = '$lang' and (`aa`.`text` like '%$keyword%' or `a`.`metadata` like '%$keyword%')";
		$used->where($where_sql);
		$query = $used->get();
		$result = $query->result();
		$hasil = array();
		$count = 0;
		foreach ($result as $row)
		{
			if($row->link != null and $row->link != '#')
			{
				$cross = strpos($row->link, '#');
				$http  = strpos($row->link, 'http://');
				$https = strpos($row->link, 'https://');
				$ftp   = strpos($row->link, 'ftp://');
				$outside = ($http===false and $https===false and $ftp===false);
				if($outside === true and $cross === false)
					$row->link = base_url().$row->link.'/'.$lang;
				else if($outside === true and $cross === true)
					$row->link = base_url().$row->link;
				$link = preg_replace('/index.php\//', '', $row->link);
				$hasil[$count] = anchor($link, $row->title, array('title' => $row->title));
				$count++;
			}
		}		
		return $hasil;
	}
}
/* End of Search Model */
/* 31 Juli 2012 [10:38 AM] */