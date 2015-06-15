<?phpclass Validation {	function __construct($options=null) {		$this->CI = &get_instance();		$this->CI->load->model('login_model');		$this->CI->load->library('session');	}		function validate_key($key, $message = null)	{		$attempt = $this->CI->login_model->count_attempt($this->get_ip());		if($attempt <= MAXIMUM_ATTEMPT_LOGIN)		{			$name = $this->CI->session->userdata('username');			if($name == null)			{				// Show login mechanisme				if($key != $this->CI->backend_key)				{					show_404();				}				$data['key'] = $this->CI->setting_model->get_by_name('backend_key')->value;				if($message != null)				{					$data['message'] = urldecode($message);				}				$this->CI->load->view('pages/backend/login', $data);			}			else			{				// redirect to backend dashboard				redirect(base_url().'beranda');			}		}		else		{			echo "Anda sudah melebihi batas untuk melakukan otorisasi, silahkan melakukan otorisasi lagi setelah 1 jam";		}	}    function login()    {		$attempt = $this->CI->login_model->count_attempt($this->get_ip());		if($attempt <= MAXIMUM_ATTEMPT_LOGIN)		{			$data['query'] = $this->CI->user_model->login($_POST['username'], $_POST['password']);			$active_user = $_POST['username'];			if($data['query'] == true)			{				$this->create_login_history($_POST['username'], $this->get_ip(), 1);				$userdata = $this->CI->user_model->get_data($_POST['username']);				$this->create_session($userdata->username, $this->get_ip(), $userdata->description, $userdata->level, $userdata->id_group);				redirect(base_url().'beranda');			}			else {				$this->create_login_history($_POST['username'], $this->get_ip(), 0);				$this->CI->login_model->record_failure($this->get_ip());				redirect(base_url().'backend/'.$this->CI->backend_key.'/Login Gagal', $data);			}		}		else		{			show_404();		}    }		function logout()	{		$username = $this->CI->session->userdata('username');		$this->destroy_session($username);	}		/* Internet Protocol Address */	function get_ip()	{		$ip = $this->CI->input->ip_address();		if ( $this->CI->input->valid_ip($ip))		{			return $ip;		}		else return $ip;	}		/* Login History */	function create_login_history($user, $ip, $success)	{		$this->CI->login_model->record_login($user, $ip, $success);	}		/* Session */	function create_session($user, $ip, $data, $level, $id_group)	{		$id = $this->CI->user_model->get_id($user);		$newdata = array(                   'username'  => $user,				   'user_level' => $level,				   'id_user' => $id,				   'username'  => $user,				   'user_group' => $id_group,                   'ip_address'     => $ip,                   'last_activity' => time(),				   'logged_in'	=> TRUE,				   'user_data' => $data               );		$this->CI->session->set_userdata($newdata);	}		public function destroy_session($username)	{		$this->CI->session->sess_destroy();		// Update user last visit		$data = array(               'last_visit' => gmt_to_local(local_to_gmt(time()), 'UP7', FALSE)            );		$this->CI->db->where('username', $username);		$this->CI->db->update('users', $data);		redirect(base_url().'backend/'.$this->CI->backend_key);	}		public function check_session()	{		/* Checking is user already logged in */		$name = $this->CI->session->userdata('username');		if($name == null)		{			redirect(base_url());		}		else		{			$data['user_data'] = $this->CI->user_model->get_data($name);			$data['user_history'] = $this->CI->user_model->get_history($name, 5);			return $data;		}	}		public function remember_me($user)	{	}		/* End Session*/		}/* End of Validation *//* 25 Juli 2012 [11:25 AM] */?>