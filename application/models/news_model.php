<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->model('setting_model');
    }
	
	function getNewsType($tipe_berita)
	{
		return $this->setting_model->get_by_name($tipe_berita)->value;
	}
	
	/* Method Invoker */
	function getNews($lang)
	{
	}
	
	function search($keyword, $lang)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->select('newsid, newstitle, newslastupdate, newsplace');
		$used->from('news');
		$where_sql = "news.newsstatus = 'S' and (newstitle like '%$keyword%' or newshead like '%$keyword%' or newsbody like '%$keyword%') ";
		$used->where($where_sql);
		$used->order_by('newskatid', 'asc');
		$used->order_by('newslastupdate', 'desc');
		
		$query = $used->get();
		$result = $query->result();
		$hasil = array();
		$count = 0;
		foreach ($result as $row)
		{
			if($row->newsid != null and $row->newsid >0)
			{
				$datetime = strtotime($row->newslastupdate); 
				$mysqldate = date("d-M-Y H:i", $datetime);
				$hasil[$count] =anchor("berita/$row->newsid/$lang", '['.$mysqldate.'] '.$row->newstitle, array('title' => $row->newstitle));
				$count++;
			}
		}
		return $hasil;
	}
	
	function count_all($keyword, $lang='id')
	{
		$hasil = $this->search($keyword, $lang);
		return sizeof($hasil);
	}
	
	function get_latest_news($lang='id', $offset, $num)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->select('newsid, newstitle, newslastupdate, newsplace');
		$used->from('news');
		$used->limit($num, $offset);
		$where_sql = "news.newsstatus = 'S' and (news.newskatid = 1 or news.newskatid = 4)";
		$used->where($where_sql);
		$used->order_by('newslastupdate', 'desc');
		
		$query = $used->get();
		$result = $query->result();
		return $result;
	}
	
	function get_news_category()
	{
		$used = $this->load->database('its-online', TRUE);
		//$used->select('newskatid, newskatname, newsplace');
        $used->select('newskatid, newskatname');
		$used->from('newskategori');
		$used->where('newskatid !=', 5);
		$used->order_by('newskatid', 'asc');

        $query = $used->get();
        $result = $query->result();
        //echo $used->last_query();
		return $result;
	}
	
	function get_news_on_category( $newsType, $year, $month, $offset=0, $num=0)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->select('newsid, newstitle, newslastupdate, newshead, newsplace');
		$used->from('news');
		if($num>0)
		{
			$used->limit($num, $offset);
		}
		$used->where('news.newskatid', $newsType);
		$used->where('news.newsstatus', 'S');
		$used->where('YEAR(newslastupdate)', $year);
		if($month > 0)
		{
			$used->where('MONTH(newslastupdate)', $month);
		}
		$used->order_by('newslastupdate', 'desc');
		$used->where('YEAR(newslastupdate) >',0);
		
		$query = $used->get();
		$result = $query->result();
		
		foreach($result as $row)
		{
			$row->newstitle = str_ireplace("</div>", "", $row->newstitle);
			$row->newshead  = str_ireplace("</div>", "", $row->newshead);
			$row->newshead  = str_ireplace("<br />", "", $row->newshead);
		}
		
		return $result;
	}
	
	function count_news_on_category( $newsType, $year, $month)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->select('count(*) as total');
		$used->from('news');
		$used->where('news.newskatid', $newsType);
		$used->where('news.newsstatus', 'S');
		$used->where('YEAR(newslastupdate)', $year);
		if($month > 0)
		{
			$used->where('MONTH(newslastupdate)', $month);
		}
		$used->where('YEAR(newslastupdate) >',0);
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
	
	function getHeadlinesUtama($lang='id', $count=3)
	{
		return $this->getNewsHeadlines('kode_berita_utama', $lang, $count);
	}
	
	function getHeadlinesProfil($lang='id', $count=3)
	{
		return $this->getNewsHeadlines('kode_profil', $lang, $count);
	}
	
	function getHeadlinesOpini($lang='id', $count=3)
	{
		return $this->getNewsHeadlines('kode_opini', $lang, $count);
	}
	
	function getHeadlinesMediaLain($lang='id', $count=3)
	{
		return $this->getNewsHeadlines('kode_media_lain', $lang, $count);
	}
	
	function getHeadlinesSeputarPilrek($lang='id', $count=3)
	{
		return $this->getNewsHeadlines('kode_pilrek', $lang, $count);
	}
	
	function getHeadlinesEditorial($lang='id', $count=3)
	{
		return $this->getNewsHeadlines('kode_redaksi', $lang, $count);
	}
	/* End of Method invoker */
	
	/* ITS Online Method */	
	function getNewsHeadlines ( $newsType, $lang, $count) 
	{
		$newsKat = $this->getNewsType($newsType);
		$used = $this->load->database('its-online', TRUE);
		$used->select('newsid, newstitle, newslastupdate, newshead, newspict, newsplace');
		$used->from('news');
		if($count>0)
		{
			$used->limit($count, 0);
		}
		$used->where('news.newskatid', $newsKat);
		$used->where('news.newsstatus', 'S');
		$used->order_by('newslastupdate', 'desc');
		
		$query = $used->get();
		$result = $query->result();
		
		foreach($result as $row)
		{
			$row->newstitle = str_ireplace("</div>", "", $row->newstitle);
			$row->newshead  = str_ireplace("</div>", "", $row->newshead);
			$row->newshead  = str_ireplace("<br />", "", $row->newshead);
		}
		
		return $result;
	}
	
	function getNewsDetail ($newsid)
	{	
		$used = $this->load->database('its-online', TRUE);
		$used->select('newsid, newstitle, newslastupdate, newshead, newsbody, newspict, newsplace, newskatid ');
		$used->from('news');
		$used->where('news.newsid', $newsid);
		$used->where('news.newsstatus', 'S');
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$row = $result[0];
			$row->newstitle = str_ireplace("</div>", "", $row->newstitle);
			$row->newshead  = str_ireplace("</div>", "", $row->newshead);
			$row->newshead  = str_ireplace("<br />", "", $row->newshead);
			$row->newsbody  = str_ireplace("</div>", "", $row->newsbody);
			// $row->newsbody  = str_ireplace("<br />", "", $row->newsbody);
			return $row;
		}
		else return null;
	}
	
	function isNewsAvailable ($newsid)
	{	
		$used = $this->load->database('its-online', TRUE);
		$used->select('newsid');
		$used->from('news');
		$used->where('news.newsid', $newsid);
		$used->where('news.newsstatus', 'S');
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			return true;
		}
		else return false;
	}
	
	function getPeriode()
	{
		$used = $this->load->database('its-online', TRUE);
		$used->distinct();
		$used->select('MONTH(`newslastupdate`) as bulan, YEAR(`newslastupdate`)');
		$used->from('news');
		$used->where('MONTH(`newslastupdate`) >=', 1);
		$used->where('MONTH(`newslastupdate`) <=', 12);
		$used->where('YEAR(newslastupdate) >',0);
		$used->where('news.newsstatus', 'S');
		
		$used->order_by('YEAR(`newslastupdate`)', desc);
		$used->order_by('MONTH(`newslastupdate`) ', asc);
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			return true;
		}
		else return false;
	}
	
	function get_years($category)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->distinct();
		$used->select("YEAR(newslastupdate) as tahun");
		$used->from('news');
		$used->where('newskatid', $category);
		$used->where('news.newsstatus', 'S');
		$used->where('YEAR(newslastupdate) >',0);	
		
		$used->order_by('YEAR(newslastupdate)','desc');
		
		$query = $used->get();
		return $query->result();
	}
	
	function get_months($category, $year)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->distinct();
		$used->select("MONTH(newslastupdate) as bulan");
		$used->from('news');
		$used->where('newskatid', $category);
		$used->where('news.newsstatus', 'S');
		$used->where('YEAR(newslastupdate)',$year);
		$used->order_by('YEAR(newslastupdate)','desc');
		$used->order_by('MONTH(newslastupdate)','asc');
		
		$query = $used->get();
		return $query->result();
	}
	/* End of ITS Online Method */

	/* Legacy ITS Online method */
	function getAllNews( $start, $count ) {
		$con = connect();
		$rs = $con->Execute( "SELECT newsid, newstitle, newslastupdate, newshead, newspict, newsplace
							  FROM news WHERE newskatid = 1 AND newsstatus = 'S' 
							  ORDER BY newslastupdate DESC LIMIT $start, $count" );
		return $rs;
	}

	function getNewsCounter( $search ) {
		$con = connect();
		$rs = $con->Execute( "SELECT Count(*) 
							  FROM news WHERE newskatid = 1 AND newsstatus = 'S'
							  AND newshead LIKE '%$search%' ORDER BY newslastupdate
							  DESC" );
		return $rs->fields[0];
	}

	function getAllNewsCounter() {
		$con = connect();
		$rs = $con->Execute( "SELECT Count(*) FROM news WHERE newskatid = 1 AND newsstatus = 'S'" );
		return $rs->fields[0];
	}

	function getNewsCategory( $catID ) {
		$con = connect();
		$rs = $con->Execute( "SELECT newskatname FROM newskategori WHERE newskatid = '$catID'" );
		return $rs->fields[0];
	}

	function getNewsComment( $newsID ) {
		$con = connect();
		$rs = $con->Execute( "SELECT Count(*) FROM tanggapanberita WHERE newsid = '$newsID' AND status = '1'" );
		return $rs->fields[0];
	}

	// editorial
	function getEditorialHeadlines ( $con, $newsType ) {
		$count = 3;

		if($newsType == 1)
			 $count = 3;

		$rs = $con->Execute(  "SELECT newsid, newstitle, newslastupdate, newshead, newspict, newsplace
							  FROM news WHERE newskatid = $newsType AND newsstatus = 'S' 
							  ORDER BY newslastupdate DESC LIMIT 0,$count" );
		return $rs;
	}

	function getAllEditorial( $start, $count ) {
		$con = connect();
		$rs = $con->Execute( "SELECT newsid, newstitle, newslastupdate, newshead, newspict, newsplace
							  FROM news WHERE newskatid = 6 AND newsstatus = 'S' 
							  ORDER BY newslastupdate DESC LIMIT $start, $count" );
		return $rs;
	}

	function getEditorialCounter( $search ) {
		$con = connect();
		$rs = $con->Execute( "SELECT Count(*) 
							  FROM news WHERE newskatid = 6 AND newsstatus = 'S'
							  AND newshead LIKE '%$search%' ORDER BY newslastupdate
							  DESC" );
		return $rs->fields[0];
	}

	function getAllEditorialCounter() {
		$con = connect();
		$rs = $con->Execute( "SELECT Count(*) FROM news WHERE newskatid = 6 AND newsstatus = 'S'" );
		return $rs->fields[0];
	}

	function getEditorialDetail( $newsID ) {
		$con = connect();
		$rs = $con->Execute( "SELECT newsid, newstitle, newslastupdate, newshead, newsbody, newspict, newsplace, newskatid, newsplace 
							  FROM news WHERE newsid = '$newsID'" );
		return $rs;
	}

	function getEditorialCategory( $catID ) {
		$con = connect();
		$rs = $con->Execute( "SELECT newskatname FROM newskategori WHERE newskatid = '$catID'" );
		return $rs->fields[0];
	}

	function getEditorialComment( $newsID ) {
		$con = connect();
		$rs = $con->Execute( "SELECT Count(*) FROM tanggapanberita WHERE newsid = '$newsID' AND status = '1'" );
		return $rs->fields[0];
	}

	// agenda aktivitas
	function getTopActivity( $con, $number = 10000 ) {
		$rs = $con->Execute( "SELECT actid, actnama, acttanggal FROM activity 
							  WHERE actstatus = 'S' AND actid < $number
							  ORDER BY acttanggal DESC LIMIT 0, 8" );
		if( $rs->RecordCount() == 0 ) {
			$rs = $con->Execute( "SELECT actid, actnama, acttanggal FROM activity 
								  WHERE actstatus = 'S'
								  ORDER BY acttanggal DESC LIMIT 0, 8" );
		}
		return $rs;
	}
}
/* End of News Model */
/* 31 Juli 2012 [10:38 AM] */