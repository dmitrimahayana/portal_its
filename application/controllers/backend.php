<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backend extends CI_Controller
{
	var $backend_key = null;
	var $message;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
		$this->load->helper('text');
		$this->load->helper('security');
		$this->load->helper('date');
		
        $this->load->library('encrypt');
		$this->load->library('form_validation');
		$this->load->library('backend_crud');
		$this->load->library('validation');
		
        $this->load->model('setting_model');
		$this->load->model('user_model');
		$this->load->model('backend_page_model');
		$this->load->model('page_access_model');

		$this->backend_key = $this->setting_model->get_by_name('backend_key')->value;
    }

    public function index()
    {
        show_404();
    }

	function validate_key($key, $message = null)
	{
		return $this->validation->validate_key($key, $message);
	}
	
	function login()
	{
		return $this->validation->login();
	}
	
	function logout()
	{
		return $this->validation->logout();
	}
	
	/* Fungsi helper untuk load halaman lain 	*/
	private function help_common($page)
	{
		$lang = 'id';
		/* Fill Data for View */
		$data['lang'] 		= $lang;
		$data['page'] 		= $page;
		if($lang=='id')
			$data['title'] 	= $this->setting_model->get_by_name('site_title_indonesia')->value;
		else if($lang=='en')
			$data['title'] 	= $this->setting_model->get_by_name('site_title_english')->value;
		else $data['title'] = 'ITS';
		$data['navigation'] = $this->backend_page_model->get_all_online();
		$data['page_access'] = $this->page_access_model->get($this->session->userdata('user_group'));
		return $data;
	}
	
	/* Fungsi untuk mengatur pengaturan pagination */
	private function init_pagination($info, $offset)
	{
		// Round the page into multiply of per_page
		$page = floor($offset / PAGINATION_MULTIPLY) * PAGINATION_MULTIPLY;
		$this->load->library('pagination');
		$config['base_url'] = base_url().'beranda/view/'.$info."?page=$info";
		$config['per_page'] = PAGINATION_MULTIPLY;
		$config['cur_page'] = $offset;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div">';
		$config['cur_tag_open'] = '<b>';
		$config['cur_tag_close'] = '</b>';
		$config['first_link'] = '&lsaquo; Awal';
		$config['last_link'] = 'Akhir &rsaquo;';
		$config['next_link'] = '--&gt;';
		$config['prev_link'] = '&lt;--';
		$config['page_query_string'] = TRUE;
		return $config;
	}
	
	/* Fungsi untuk membantu add dan edit tiap halaman */
	private function create_image_list_for_tiny_mce()
	{
		$this->load->model('media_images_model');
		$all_media = $this->media_images_model->get_all();
		$data['all_media'] = $all_media;
		return $data;
	}
	
	private function load_media()
	{
		$this->load->model('media_images_model');
		$all_media = $this->media_images_model->get_all();
		$data['all_media'] = $all_media;
		$data['options_media'] = array('NULL');
		foreach($all_media as $row)
		{
			$data['options_media']["$row->id_images"] = $row->image_name;
		}
		return $data;
	}
	
	private function detail_page()
	{
		/* Page Model */
		$this->load->model('page_model');
		$this->load->model('page_category_model');
		$data['model'] = $this->page_model->get_all();
		$data['category'] = $this->page_category_model->get_all();
		$data['options_parent'] = array('NULL');
		foreach($data['model'] as $row)
		{
			$data['options_parent']["$row->id_page"] = $row->name;
		}
		$data['options_category'] = array('NULL');
		foreach($data['category'] as $row)
		{
			$data['options_category']["$row->id_page_category"] = $row->code;
		}
		return $data;
	}
	
	private function detail_user()
	{
		$this->load->model('user_group_model');
		$data['category'] = $this->user_group_model->get_all();
		$data['options_group'] = array('NULL');
		foreach($data['category'] as $row)
		{
			if($this->session->userdata('user_level') >= $row->level)
			{
				$data['options_group']["$row->id_group"] = $row->group_name;
			}
		}
		return $data;
	}
	
	private function detail_stakeholder_menu()
	{
		$data_media = $this->load_media();
		$data['options_stakeholder'] = array('NULL');
		$this->load->model('stakeholder_model');
		$stakeholder = $this->stakeholder_model->get_all_stakeholder('id');
		foreach($stakeholder as $row)
		{
			$data['options_stakeholder']["$row->id_stakeholder"] = $row->name;
		}
		$data = array_merge($data, $data_media);
		return $data;
	}
	
	private function detail_stakeholder()
	{
		$this->load->model('stakeholder_model');
		$data['all_menu'] = $this->stakeholder_model->get_stakeholder_menu(null, 0, MAX_INTEGER);
		$data['options_menu'] = array('NULL');
		foreach($data['all_menu'] as $row)
		{
			$data['options_menu']["$row->id_stakeholder_menu"] = $row->name;
		}
		return $data;
	}
	
	private function detail_user_group()
	{
		$this->load->model('backend_page_model');
		$data['all_menu'] = $this->backend_page_model->get_all();
		$data['options_menu'] = array('NULL');
		foreach($data['all_menu'] as $row)
		{
			$data['options_menu']["$row->id_backend_page"] = $row->name;
		}
		return $data;
	}
	
	private function detail_backend_page()
	{
		/* Page Model */
		$this->load->model('backend_page_model');
		$data['model'] = $this->backend_page_model->get_all();
		$data['options_parent'] = array('NULL');
		foreach($data['model'] as $row)
		{
			$data['options_parent']["$row->id_backend_page"] = $row->name;
		}
		return $data;
	}
	/* End Fungsi untuk membantu add dan edit */
	
	/* Fungsi untuk membaca halaman dashboard */
	public function dashboard()
	{
		$info = 'dashboard';
		$data = $this->validation->check_session();
		$data2 = $this->help_common($info);
		$data = array_merge($data, $data2);
		
		$this->load->view('templates/backend/header', $data);
		$this->load->view('pages/backend/'.$info, $data);
		$this->load->view('templates/backend/footer', $data);
	}
	
	/* Fungsi background di halaman backend untuk commit ke database */
	public function add($type, $message=null)
	{
		if($this->session->userdata('username') == null) {show_404(); return;}
		/*if ($this->form_validation->run($type) == FALSE)
		{
			$this->session->set_flashdata('message_error', "Masukan salah!");
			redirect(base_url().'beranda/add/'.$type);
		}
		else
		{*/
			$standard_type = str_replace('-','_',$type);
			$model_name = $standard_type.'_model';
			$this->load->model($model_name);
			$is_ok = $this->$model_name->add();
                        //echo $model_name;
			if($is_ok)
			{
				$display_name = $this->backend_page_model->get_by_name($type)->display_name;
				$this->session->set_flashdata('message_info', $display_name." berhasil ditambahkan");
				redirect(base_url().'beranda/view/'.$type);
			}
			else
			{
                            redirect(base_url().'beranda/add/'.$type); 
                     }
		//}
	}
	
	public function edit($type, $message=null)
	{
		if($this->session->userdata('username') == null) {show_404(); return;}
		/*if ($this->form_validation->run($type) == FALSE)
		{
			$this->session->set_flashdata('message_error', "Masukan salah!");
			redirect(base_url().'beranda/edit/'.$type.'/'.$message);
		}
		else
		{*/
			$standard_type = str_replace('-','_',$type);
			$model_name = $standard_type.'_model';
			$this->load->model($model_name);
			$is_ok = $this->$model_name->edit();
			if($is_ok)
			{
				$display_name = $this->backend_page_model->get_by_name($type)->display_name;
				$this->session->set_flashdata('message_info', $display_name." berhasil diperbarui");
			}
			redirect(base_url().'beranda/view/'.$type);
		//}
	}
	
	public function delete($type, $id)
	{
		if($this->session->userdata('username') == null) {show_404(); return;}
		$standard_type = str_replace('-','_',$type);
		$model_name = $standard_type.'_model';
		$this->load->model($model_name);
		$is_ok = $this->$model_name->delete($id);
		if($is_ok)
		{
			$display_name = $this->backend_page_model->get_by_name($type)->display_name;
			$this->session->set_flashdata('message_info', $display_name." berhasil dihapus");
		}
		redirect(base_url().'beranda/view/'.$type);
	}
	
	/* Template tampilan backend */
	public function view_page($info)
	{
		if ( ! file_exists('application/views/pages/backend/view/'.$info.'.php'))
                {
                    /* Whoops, we don't have a page for that! */
                    show_404();
                }
		else if($this->session->userdata('username') == null) {show_404(); return;}
		/* Cek session */
		$data = $this->validation->check_session();
		/* Cek filter */
		if(isset($_GET) and isset($_GET['filter']))
		{
			$filter = trim($_GET['filter']);
			$data['filter'] = $filter;
		}
		else if(isset($filter))
		{
			$data['filter'] = $filter;
		}
		else
		{
			$filter = null;
		}
		/* Cek offset */
		if(isset($_GET) and isset($_GET['offset']))
		{
			$offset = trim($_GET['offset']);
			$data['offset'] = $offset;
		}
		else if(isset($offset))
		{
			$data['offset'] = $offset;
		}
		else
		{
			$offset = 0;
		}
		$data['info'] = $info;
		$data2 = $this->help_common($info);
		$data = array_merge($data, $data2);		
		$config = $this->init_pagination($info, $offset);
		
		$exception = array('');
		if(!in_array($info, $exception, true))		
		{
			/* Pagination standar */
			/* Setup pagination for filter */
			$config['query_string_segment'] = "filter=$filter&offset";
			/* Show data */
			$model_name = str_replace('-','_',$info).'_model';
			$this->load->model($model_name);
		}
                
		switch ($info):
			case 'interactive':
				// Media differ (pada bahasa yang berbeda, media yang digunakan berbeda)
				$config['total_rows'] = $this->$model_name->count_all($filter, 1);
				$data['model'] = $this->$model_name->get_some($offset, $config['per_page'], $filter, 1);
				break;
			case 'log':
				$this->load->model('log_model');
				if($_GET == null or $_GET['username']==null or $_GET['username'] == '')
				{
					$username = $this->session->userdata('username');
				}
				else
				{
					$data_user = $this->user_model->get_data($_GET['username']);
					if($data_user==null or $this->session->userdata('level') < $data_user->level)
					{
						$username = $this->session->userdata('username');
					}
					else
					{
						$username = $_GET['username'];
					}
				}
				$config['total_rows'] = $this->log_model->count_all_log($username);
				$data['model'] = $this->log_model->get_log($offset, $config['per_page'],$username);
				$data['username'] = $username;
				break;
			default:
				$config['total_rows'] = $this->$model_name->count_all($filter);
				$data['model'] = $this->$model_name->get_some($offset, $config['per_page'], $filter);
				break;
		endswitch;
		
		$this->pagination->initialize($config); 
		
		$this->load->view('templates/backend/header', $data);
		$this->load->view('pages/backend/container-view-head', $data);
		$this->load->view('pages/backend/view/'.$info, $data);
		$this->load->view('pages/backend/container-view-tail', $data);
		$this->load->view('templates/backend/footer', $data);
	}
	
	public function add_page($info)
	{
		if ( ! file_exists('application/views/pages/backend/add/'.$info.'.php'))
                {
                    /* Whoops, we don't have a page for that! */
                    show_404();
                }
		else if($this->session->userdata('username') == null) {show_404(); return;}
		$data = $this->validation->check_session();
		$data['info'] = $info;
		$data['display_name'] = $this->backend_page_model->get_by_name($info)->display_name;
				
		$data2 = $this->help_common($info);
		$data = array_merge($data, $data2);
		
		switch ($info):
			case 'page':
				$data2 = $this->detail_page();
				$data = array_merge($data, $data2);
				break;
			case 'page-category':
				break;
			case 'article':
				$data2 = $this->create_image_list_for_tiny_mce();
				$data = array_merge($data, $data2);
				break;
			case 'interactive':
				$data2 = $this->load_media();
				$data = array_merge($data, $data2);
				break;
			case 'fast-link':
				$data2 = $this->load_media();
				$data = array_merge($data, $data2);
				break;
			case 'user':
				$data2 = $this->detail_user();
				$data = array_merge($data, $data2);
				break;
			case 'social-network':
				$data2 = $this->load_media();
				$data = array_merge($data, $data2);
				break;
			case 'user-group':
				$data2 = $this->detail_user_group();
				$data = array_merge($data, $data2);
				break;			
			case 'backend-page':
				$data2 = $this->detail_backend_page();
				$data = array_merge($data, $data2);
				break;
			case 'sukolilo-notes':
				$data2 = $this->load_media();
				$data = array_merge($data, $data2);
				break;
			default:
				break;
		endswitch;
		
		$this->load->view('templates/backend/header', $data);
		if($info != 'media-images')
		{
			$this->load->view('pages/backend/container-add-head', $data);
		}
		$this->load->view('pages/backend/add/'.$info, $data);
		$this->load->view('templates/backend/footer', $data);
	}
	
	public function edit_page($info, $id)
	{
		if ( ! file_exists('application/views/pages/backend/edit/'.$info.'.php'))
                {
                    /* Whoops, we don't have a page for that! */
                    show_404();
                }
		else if($this->session->userdata('username') == null) {show_404(); return;}
		$data = $this->validation->check_session();
		$data['info'] = $info;
		$data['display_name'] = $this->backend_page_model->get_by_name($info)->display_name;
		
		$data2 = $this->help_common($info);
		$data['id_primary'] = $id;
		$data['fill'] = array();
		$data = array_merge($data, $data2);
		
		switch ($info):
			case 'page':
				$data2 = $this->detail_page();
				$this->load->model('page_model');
				$data['fill'] = $this->page_model->get_by_id($id);
				$data['fill_id'] = $this->page_model->get_object_lang($id, 'id');
				$data['fill_en'] = $this->page_model->get_object_lang($id, 'en');
				$data = array_merge($data, $data2);
				break;
			case 'page-category':
				$this->load->model('page_category_model');
				$data['fill'] = $this->page_category_model->get_by_id($id);
				break;
			case 'article':
				$data2 = $this->create_image_list_for_tiny_mce();
				$this->load->model('article_model');
				$data['fill_id'] = $this->article_model->get_object_lang($id, 'id');
				$data['fill_en'] = $this->article_model->get_object_lang($id, 'en');
				$data['fill'] = $this->article_model->get_by_id($id);
				$data = array_merge($data, $data2);
				break;
			case 'interactive':
				$data2 = $this->load_media();
				$this->load->model('interactive_model');
				$data['fill_id'] = $this->interactive_model->get_object_lang($id, 'id', null, 1);
				$data['fill_en'] = $this->interactive_model->get_object_lang($id, 'en', null, 1);
				$data['fill'] = $this->interactive_model->get_by_id($id);
				$data = array_merge($data, $data2);
				break;
			case 'fast-link':
				$this->load->model('fast_link_model');
				$data2 = $this->load_media();
				$data['fill'] = $this->fast_link_model->get_by_id($id);
				$data['fill_id'] = $this->fast_link_model->get_object_lang($id, 'id');
				$data['fill_en'] = $this->fast_link_model->get_object_lang($id, 'en');
				$data = array_merge($data, $data2);
				break;
			case 'terms':
				$this->load->model('terms_model');
				$data['fill_id'] = $this->terms_model->get_object_lang($id, 'id');
				$data['fill_en'] = $this->terms_model->get_object_lang($id, 'en');
				$data['fill'] = $this->terms_model->get_by_id($id);
				break;
			case 'user':
				$data2 = $this->detail_user();
				$data['fill'] = $this->user_model->get_by_id($id);
				$data = array_merge($data, $data2);
				break;
			case 'setting':
				$this->load->model('setting_model');
				$data['fill'] = $this->setting_model->get_by_id($id);
				break;
			case 'highlight':
				$this->load->model('highlight_model');
				$data['fill'] = $this->highlight_model->get_by_id($id);
				$data['fill_id'] = $this->highlight_model->get_object_lang($id, 'id');
				$data['fill_en'] = $this->highlight_model->get_object_lang($id, 'en');
				break;
			case 'social-network':
				$data2 = $this->load_media();
				$this->load->model('social_network_model');
				$data['fill'] = $this->social_network_model->get_by_id($id);
				$data = array_merge($data, $data2);
				break;
			case 'user-group':
				$this->load->model('user_group_model');
				$data2 = $this->detail_user_group();
				$data['fill'] = $this->user_group_model->get_by_id($id);
				$data['fill_access'] = $this->user_group_model->get_all_access($id);
				$data = array_merge($data, $data2);
				break;
			case 'backend-page':
				$this->load->model('backend_page_model');
				$data['fill'] = $this->backend_page_model->get_by_id($id);
				$data2 = $this->detail_backend_page();
				$data = array_merge($data, $data2);
				break;
			case 'sukolilo-notes':
				$this->load->model('sukolilo_notes_model');
				$data['fill'] = $this->sukolilo_notes_model->get_by_id($id);
				$data['fill_id'] = $this->sukolilo_notes_model->get_object_lang($id, 'id');
				$data['fill_en'] = $this->sukolilo_notes_model->get_object_lang($id, 'en');
				$data2 = $this->load_media();
				$data = array_merge($data, $data2);
				break;
			case 'eureka-tv':
				$this->load->model('eureka_tv_model');
				$data['fill'] = $this->eureka_tv_model->get_by_id($id);
				$data = array_merge($data, $data2);
				break;
			default:
				break;
		endswitch;
		
		$this->load->view('templates/backend/header', $data);
		$this->load->view('pages/backend/container-edit-head', $data);
		$this->load->view('pages/backend/edit/'.$info, $data);
		$this->load->view('templates/backend/footer', $data);
	}

        
    /*--------------------------------------------------------*/
    //fungsi baru
    public function manageDemitNew($info)
    {
        if ( ! file_exists('application/views/pages/backend/view/'.$info.'.php'))
        {
            /* Whoops, we don't have a page for that! */
            show_404();
        }
        else if($this->session->userdata('username') == null) {show_404(); return;}
        /* Cek session */
        $data = $this->validation->check_session();
        /* Cek filter */
        if(isset($_GET) and isset($_GET['filter']))
        {
                $filter = trim($_GET['filter']);
                $data['filter'] = $filter;
        }
        else if(isset($filter))
        {
                $data['filter'] = $filter;
        }
        else
        {
                $filter = null;
        }
        /* Cek offset */
        if(isset($_GET) and isset($_GET['offset']))
        {
                $offset = trim($_GET['offset']);
                $data['offset'] = $offset;
        }
        else if(isset($offset))
        {
                $data['offset'] = $offset;
        }
        else
        {
                $offset = 0;
        }

        $data['info'] = $info;
        $lang = 'id';
        /* Fill Data for View */
        $data2['lang'] 		= $lang;
        $data2['page'] 		= $page;
        if($lang=='id')
                $data2['title'] 	= $this->setting_model->get_by_name('site_title_indonesia')->value;
        else if($lang=='en')
                $data2['title'] 	= $this->setting_model->get_by_name('site_title_english')->value;
        else $data2['title'] = 'ITS';
        $data2['navigation'] = $this->backend_page_model->get_all_online();
        $data2['page_access'] = $this->page_access_model->get($this->session->userdata('user_group'));

        $data = array_merge($data, $data2);
        $config = $this->init_pagination($info, $offset);

        $this->pagination->initialize($config);

        $model= $info.'_model';
        $this->load->model($model);
 
        $data['resultView']=$this->$model->get_all();

        $this->load->view('templates/backend/header', $data);
        $this->load->view('pages/backend/container-view-head', $data);
        $this->load->view('pages/backend/view/'.$info, $data);
        $this->load->view('pages/backend/container-view-tail', $data);
        $this->load->view('templates/backend/footer', $data);
    }

    public function addDemitNew($info)
    {
        if ( ! file_exists('application/views/pages/backend/add/'.$info.'.php'))
                {
                    /* Whoops, we don't have a page for that! */
                    show_404();
                }
		else if($this->session->userdata('username') == null) {show_404(); return;}
		$data = $this->validation->check_session();
		$data['info'] = $info;
		$data['display_name'] = $this->backend_page_model->get_by_name($info)->display_name;

                $lang = 'id';
                /* Fill Data for View */
                $data2['lang'] 		= $lang;
                $data2['page'] 		= $page;
                if($lang=='id')
                        $data2['title'] 	= $this->setting_model->get_by_name('site_title_indonesia')->value;
                else if($lang=='en')
                        $data2['title'] 	= $this->setting_model->get_by_name('site_title_english')->value;
                else $data2['title'] = 'ITS';
                $data2['navigation'] = $this->backend_page_model->get_all_online();
                $data2['page_access'] = $this->page_access_model->get($this->session->userdata('user_group'));
		$data = array_merge($data, $data2);

                $data2 = $this->load_media();
		$data = array_merge($data, $data2);
                
                if($info=='view_jurusan' || $info=='view_fakultas'){
                    $this->load->model('view_fakultas_model');
                    $data['get_fakultasID']=$this->view_fakultas_model->get_lang('id');
                    $data['get_fakultasEN']=$this->view_fakultas_model->get_lang('en');
                }
                else if($info=='footer_jurusan'){
                    $this->load->model('view_jurusan_model');
                    $data['jurusan']=$this->view_jurusan_model->get_all();
                }
                
                $this->load->view('templates/backend/header', $data);
		if($info != 'media-images')
		{
			$this->load->view('pages/backend/container-add-head', $data);
		}
		$this->load->view('pages/backend/add/'.$info, $data);
		$this->load->view('templates/backend/footer', $data);
    }
    
    
    public function editDemitNew($info,$id){
        if ( ! file_exists('application/views/pages/backend/edit/'.$info.'.php'))
                {
                    /* Whoops, we don't have a page for that! */
                    show_404();
                }
		else if($this->session->userdata('username') == null) {show_404(); return;}
		$data = $this->validation->check_session();
		$data['info'] = $info;
		$data['display_name'] = $this->backend_page_model->get_by_name($info)->display_name;

		$lang = 'id';
                /* Fill Data for View */
                $data2['lang'] 		= $lang;
                $data2['page'] 		= $page;
                if($lang=='id')
                        $data2['title'] 	= $this->setting_model->get_by_name('site_title_indonesia')->value;
                else if($lang=='en')
                        $data2['title'] 	= $this->setting_model->get_by_name('site_title_english')->value;
                else $data2['title'] = 'ITS';
                $data2['navigation'] = $this->backend_page_model->get_all_online();
                $data2['page_access'] = $this->page_access_model->get($this->session->userdata('user_group'));

                $model=$info.'_model';
                $this->load->model($model);
                
		$data['id_primary'] = $id;
		$data['fill'] = array();
		$data = array_merge($data, $data2);
                
                switch ($info):
                case 'view_fakultas':
                    $data['result']=$this->$model->get_id($id);
                    $data['result2']=$this->$model->get_id($id+1);
                    break;
                case 'view_jurusan':
                    $this->load->model('view_fakultas_model');
                    $data['get_fakultas']=$this->view_fakultas_model->get_all();
                    $data['get_fakultasID']=$this->view_fakultas_model->get_lang('id');
                    $data['get_fakultasEN']=$this->view_fakultas_model->get_lang('en');
                    $data['result']=$this->$model->get_id($id);
                    $data['result2']=$this->$model->get_id($id+1);
                    break;
                case 'doodle':
                    $data['result']=$this->$model->get_id($id);
                    break;
                case 'footer_jurusan':
                    $this->load->model('view_jurusan_model');
                    $data['jurusan']=$this->view_jurusan_model->get_all();
                    $data['result']=  $this->$model->get_id($id);
                    $data['result2']=  $this->$model->get_id($id+1);
                    break;
                case 'its_point':
                    $this->load->model('its_point_model');
                    $data['result']=  $this->$model->get_id($id);
                    break;
                case 'pengumuman':
                    $this->load->model('pengumuman_model');
                    $data['result']=  $this->$model->get_id($id);
                    break;
                endswitch;
                
                $data2 = $this->load_media();
		$data = array_merge($data, $data2);
                
		$this->load->view('templates/backend/header', $data);
		$this->load->view('pages/backend/container-edit-head', $data);
		$this->load->view('pages/backend/edit/'.$info, $data);
		$this->load->view('templates/backend/footer', $data);
    }
    //Akhir fungsi baru
    /*--------------------------------------------------------*/
    
    //ini edit sendiri
    public function addDataNew($info){
        $model=$info.'_model';
        $this->load->model($model);
        switch ($info):
            case 'view_jurusan':
                $data=  $this->$model->setDataID();
                $this->$model->add($data);

                $data2=  $this->$model->setDataEN();
                $this->$model->add($data2);
                break;
            case 'view_fakultas':
                $data=  $this->$model->setDataID();
                $this->$model->add($data);

                $data2=  $this->$model->setDataEN();
                $this->$model->add($data2);
                break;
            case 'doodle':
                $data=  $this->$model->setDataID();
                $this->$model->add($data);
                break;
            case 'footer_jurusan':
                $data=  $this->$model->setDataID();
                $this->$model->add($data);
                $data2=  $this->$model->setDataEN();
                $this->$model->add($data2);
                break;
	     case 'pengumuman';
                $data= $this->$model->setDataID();
                $this->$model->add($data);
                break;
            case 'its_point';
                $data= $this->$model->setDataID();
                $this->$model->add($data);
                break;
        endswitch;
        redirect (base_url().'beranda/manageNew/'.$info);

    }

    public function deleteDataNew($info,$id){
        $model=$info.'_model';
        $this->load->model($model);
        if($info=='view_fakultas' || $info=='view_jurusan' || $info=='footer_jurusan'){
            $this->$model->delete($id);
            $this->$model->delete($id+1);
        }
	 else if($info=='pengumuman'){
            $data=$this->$model->get_id($id);
            $jenis='';
            $url='';
            foreach ($data as $row){
                $jenis= $row->jenis;
                $url= $row->url;
            }
            if($jenis=='file'){
                if(unlink('./'.$url))
                    $this->$model->delete($id);
            }
            else {
                $this->$model->delete($id);
            }
        }
        else {
            $this->$model->delete($id);
        }
        redirect (base_url().'beranda/manageNew/'.$info);
    }

    public function editDataNew($info,$id){
        $model=$info.'_model';
        $this->load->model($model);
        switch ($info):
            case 'view_jurusan':
                $this->$model->updtIDEN($id);
                break;
            case 'view_fakultas':
                $this->$model->updtIDEN($id);
                break;
            case 'doodle':
                $this->$model->updtIDEN($id);
                break;
            case 'its_point':
                $this->$model->updtIDEN($id);
                break;
            case 'footer_jurusan':
                $this->$model->updtID($id);
                $this->$model->updtEN($id+1);
                break;
            case 'pengumuman':
                $this->$model->update($id);
                break;
        endswitch;
        redirect (base_url().'beranda/manageNew/'.$info);
    }
    
}
/* End of Backend Controller */
/* 31 Juli 2012 [09:57 AM] */