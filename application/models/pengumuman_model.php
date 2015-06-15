<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengumuman_model extends Base_lang_model {
        public function __construct()
        {
				parent::__construct();
                $this->load->helper('date');
        }
    
        public function setDataID(){
				$datestring = "%d-%m-%Y";
				$time = time();
				$url= '';
				
				if($this->input->post('jenis')=='article')
					$url= base_url().$this->input->post('url');
				else 
					$url= $this->input->post('url');
				$data=array(
                                    'jenis' => $this->input->post('jenis'),
                                    'indonesia' => $this->input->post('urlID'),
                                    'inggris' => $this->input->post('urlEN'),
                                    'url' => $url,
                                    'date' => mdate($datestring, $time),
                                    'tampil' => $this->input->post('tampil')
				);
				return $data;
        }
        
        public function setDataFile($url){
				$datestring = "%d-%m-%Y";
				$time = time();
				$data=array(
                                    'jenis' => $this->input->post('jenis'),
                                    'indonesia' => $this->input->post('urlID'),
                                    'inggris' => $this->input->post('urlEN'),
                                    'url' => $url,
                                    'date' => mdate($datestring, $time),
                                    'tampil' => $this->input->post('tampil')
				);
				return $data;
        }
		
        function get_some()
        {
                        $used = $this->load->database('its', TRUE);

                        $used->distinct();
                        $used->select('id, jenis, indonesia, inggris, url, date, tampil');
                        $used->from('pengumuman');
                        $used->where('tampil', 1);
                        $used->order_by('id','desc');

                        $query = $used->get();
                        return $query->result();
        }
        
        function get_all()
        {
                        $used = $this->load->database('its', TRUE);

                        $used->distinct();
                        $used->select('id, jenis, indonesia, inggris, url, date, tampil');
                        $used->from('pengumuman');
                        $used->order_by('id','desc');

                        $query = $used->get();
                        //echo $used->last_query();
                        return $query->result();
        }
        
        function get_id($id)
        {
            $used = $this->load->database('its', TRUE);
                
                $used->distinct();
                $used->select('id, jenis, indonesia, inggris, url, date, tampil');
                $used->from('pengumuman');
                //$used->join('media_images m', 'm.id_images=d.media_id');
                $used->where('id', $id);

				$query = $used->get();
				return $query->result();
        }

        function add($data){
            $used = $this->load->database('its', TRUE);
            $used->insert('pengumuman',$data);
            return;
        }
        
        function delete($id){
            $used = $this->load->database('its', TRUE);
            $used->where('id', $id);
            $used->delete('pengumuman');
        }
        
        public function update($id){
            $jenis=$this->input->post('jenis');
            $indonesia=$this->input->post('urlID');
            $inggris=$this->input->post('urlEN');
            $url=$this->input->post('url');
            $tampil=$this->input->post('tampil');
            $this->updateUrl($id,$indonesia,$inggris,$url,$tampil);
//                die($id.' '.$inggris.' '.$indonesia.' '.$url.' '.$jenis);
        }
        
        function updateUrl($id,$indonesia,$inggris,$url,$tampil){
            $used = $this->load->database('its', TRUE);
            $sql = "UPDATE pengumuman SET indonesia='$indonesia', inggris='$inggris', url='$url', tampil='$tampil'
                    where id='$id'";
            $used->query($sql);
        }


        /*function update($id,$name,$date1,$date2,$media){
            $used = $this->load->database('its', TRUE);
            $sql = "UPDATE doodle SET name='$name', date_start='$date1', date_end='$date2', media_id='$media' where id='$id'";
            $used->query($sql);
        }*/

	/* Untuk Arsip Pengumuman */
	/* MENGODING fungsi di bawah ini SUPER TRICKY "HANYA" karena field "date" bertipe "STRING" */
	function get_pengumuman_ajax( $year, $month, $lang, $offset=0, $num=0)
	{
			$used = $this->load->database('its', TRUE);
			
			$param = array();
			$sql = "SELECT jenis, indonesia, inggris, url, date " .
				   "FROM pengumuman " .
				   "WHERE tampil=1 and SUBSTRING(date, -4) = ? ";
			$sql_order_by = "ORDER BY SUBSTRING(DATE, -4) DESC,SUBSTRING(DATE, 4, 2) DESC, SUBSTRING(DATE, 1, 2) DESC ";
			
			$param[] = $year;
			
			if($month > 0)
			{
				$sql = $sql . "AND SUBSTRING(date,4,2) = ? ";
				$param[] = $month;
			}
			
			$sql = $sql . $sql_order_by;
			
			if($num>0)
			{
				$sql = $sql . "LIMIT ?, ?";
				$param[] = (int)$offset;
				$param[] = (int)$num;
			}
			
			$query = $used->query($sql, $param);
			$result = $query->result();
			
			//Convert url menjadi url lengkap
			foreach ($result as $row)
			{
				if($row->jenis == 'file')
				{
					$row->url = base_url() . $row->url;
				}
			}
			
			return $result;
	}

	function count_pengumuman_ajax( $year, $month)
	{
		$used = $this->load->database('its', TRUE);
		
		$param = array();
		$sql = "SELECT count(*) as total " .
			   "FROM pengumuman " .
			   "WHERE tampil=1 and SUBSTRING(date,-4) = ? ";
		$sql_order_by = "ORDER BY SUBSTRING(DATE,-4),SUBSTRING(DATE, 4, 2),SUBSTRING(DATE, 1, 2) DESC";
		$param[] = (int)$year;
		
		if($month > 0)
		{
			$sql = $sql . "AND SUBSTRING(date, 4, 2) = ? ";
			$param[] = (int)$month;
		}
		
		$sql = $sql . $sql_order_by;
		
		$query = $used->query($sql, $param);
		$result = $query->result();

        //echo $used->last_query();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
	
	
	function get_months($year)
	{
		$used = $this->load->database('its', TRUE);
		$sql = "SELECT DISTINCT SUBSTRING(date, 4, 2 ) as bulan " .
			   "FROM pengumuman WHERE SUBSTRING(date,-4) = ? " .
			   "ORDER BY SUBSTRING(DATE, 4, 2) ASC";
			   
		$query = $used->query($sql, array($year));
		return $query->result();
	}
	

	function get_years()
	{
		$used = $this->load->database('its', TRUE);
		$sql = "SELECT DISTINCT SUBSTRING(date, -4) as tahun" .
			   "FROM pengumuman " .
			   "ORDER BY SUBSTRING(DATE, -4) ASC";
			   
		$query = $used->query($sql);
		return $query->result();
	}
}

/* End of Page Model */
/* 26 Juli 2012 [12:13 PM] */
?>