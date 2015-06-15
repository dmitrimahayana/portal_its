<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->helper('date');
    }
	
	function record_login($username, $ip, $success)
	{
		$used = $this->load->database('its', TRUE);
		// Add record to login history
		$data = array (
			'username' 		=> $username ,
			'ip_address' 	=> $ip ,
			'time' 			=> gmt_to_local(local_to_gmt(time()), 'UP7', FALSE),
			'success'		=> $success
		);		
		$query = $used->insert('login_history', $data);
	}
	
	function record_failure($ip)
	{
		$used = $this->load->database('its', TRUE);
		$attempt = $this->count_attempt($ip);
		if($attempt > 0)
		{
			$data = array (
				'failures'		=> $attempt + 1
			);		
			$this->db->where('ip_address', $ip);
			$query = $used->update('login_tracker', $data);
		}
		else
		{
			$data = array (
				'ip_address' 	=> $ip ,
				'first_time' 	=> gmt_to_local(local_to_gmt(time()), 'UP7', FALSE),
				'failures'		=> 1
			);		
			$query = $used->insert('login_tracker', $data);
		}
	}
	
	function clear_failure($ip)
	{
		$used = $this->load->database('its', TRUE);
		$used->where('ip_address',$ip);
		$used->delete('login_tracker');
	}
	
	function count_attempt($ip)
	{
		$sekarang = gmt_to_local(local_to_gmt(time()), 'UP7', FALSE);
		$used = $this->load->database('its', TRUE);
		$query = $used->get_where('login_tracker', array('ip_address'=>$ip));
		$result = $query->result();
		if(!empty($result))
		{
			if($result[0] !=null and $sekarang - $result[0]->first_time > 3600)	// Jika sudah lebih dari 1 jam, maka bisa login lagi
			{
				$this->clear_failure($ip);
				return 0;
			}
			$fail = $result[0]->failures;
			return $fail;
		}
		else return 0;
	}
}
/* End of Login Model */
/* 31 Juli 2012 [10:38 AM] */