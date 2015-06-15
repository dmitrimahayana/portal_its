<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Activity_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_activity_ajax( $year, $month, $lang, $offset=0, $num=0)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->select('actid, actnama, acttempat, acttanggal, actisi, MONTH(acttanggal) as bulan, YEAR(acttanggal) as tahun');
		$used->from('activity');
		if($num>0)
		{
			$used->limit($num, $offset);
		}
		$used->order_by('acttanggal','desc');
		$used->where('actstatus', 'S');
		$used->where('YEAR(acttanggal)', $year);
		if($month > 0)
		{
			$used->where('MONTH(acttanggal)', $month);
		}
		
		$query = $used->get();
		$result = $query->result();
		foreach ($result as $row)
		{
			$pos = strpos($row->actnama, 'href');
			if($pos!=false)
			{
				$row->actnama = $row->actnama.'</a>';
			}
		}
		
		return $result;
	}
	
	function count_activity_ajax( $year, $month)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->select('count(*) as total');
		$used->from('activity');
		$used->where('actstatus', 'S');
		$used->where('YEAR(acttanggal)', $year);
		if($month > 0)
		{
			$used->where('MONTH(acttanggal)', $month);
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
	
	function get_upcoming_activity($offset=0, $num=4)
	{	
		$used = $this->load->database('its-online', TRUE);
		$used->select("actid, actnama, acttempat, acttanggal, actisi");
		$used->from('activity');
		$used->limit($num, $offset);
		// $tanggalsekarang = date('Y-m-d');
		// lebih dari tanggal sekarang
		$wheresql = "DATE_FORMAT(`acttanggal`, '%Y-%m-%d') >= DATE_FORMAT(NOW(), '%Y-%m-%d')";
		$used->where($wheresql);
		$used->where('actstatus', 'S');
		$used->order_by('acttanggal','asc');
		
		$query = $used->get();
		$result = $query->result();
		foreach ($result as $row)
		{
			$pos = strpos($row->actnama, 'href');
			if($pos!=false)
			{
				$row->actnama = $row->actnama.'</a>';
			}
		}
		//echo $used->last_query();
		return $result;
	}
	
	function count_upcoming_activity()
	{
		$used = $this->load->database('its-online', TRUE);
		$used->select("count(*) as total");
		$used->from('activity');
		$used->limit($num, $offset);
		// $tanggalsekarang = date('Y-m-d');
		// lebih dari tanggal sekarang
		$wheresql = "DATE_FORMAT(`acttanggal`, '%Y-%m-%d') >= DATE_FORMAT(NOW(), '%Y-%m-%d')";
		$used->where($wheresql);
		$used->where('actstatus', 'S');
		$used->order_by('acttanggal','asc');
		
		$query = $used->get();
		$result = $query->result();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
	
	function get_years()
	{
		$used = $this->load->database('its-online', TRUE);
		$used->distinct();
		$used->select("YEAR(acttanggal) as tahun");
		$used->from('activity');
		$used->where('actstatus', 'S');
		$used->order_by('YEAR(acttanggal)','desc');
		
		$query = $used->get();
		return $query->result();
	}
	
	function get_months($year)
	{
		$used = $this->load->database('its-online', TRUE);
		$used->distinct();
		$used->select("MONTH(acttanggal) as bulan");
		$used->from('activity');
		$used->where('actstatus', 'S');
		$used->where('YEAR(acttanggal)', $year);
		$used->order_by('acttanggal','asc');
		
		$query = $used->get();
		return $query->result();
	}
}
/* End of Activity Model */
/* 31 Juli 2012 [10:38 AM] */