<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Page extends CI_Controller {
	public $js = array();
	public $addSidebar = '';

    public function __construct()
    {
        parent::__construct();

		$this->load->model('setting_model');
		$this->load->model('page_model');
		$this->load->model('language_model');

		$this->load->model('footer_model');
		$this->load->model('terms_model');
		$this->load->model('activity_model');
		$this->load->model('fast_link_model');
		$this->load->model('news_model');
		$this->load->model('interactive_model');
		$this->load->model('highlight_model');
		$this->load->model('social_network_model');
		$this->load->model('eureka_tv_model');
		$this->load->model('sukolilo_notes_model');
		$this->load->model('pengumuman_model');
		$this->load->model('its_point_model');

		$this->load->helper('date');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');


    }
    public function index()
    {
		show_404();
    }
	/* Bagian Fungsi Bantuan */
	public function setdata($page, $lang)
	{
		$data=array();
		/* Fill Data for View */
		$data['page'] = $page;
		$data['lang'] = $lang;
		if($lang=='id')
			$data['title'] = $this->setting_model->get_by_name('site_title_indonesia')->value;
		else if($lang=='en')
			$data['title'] = $this->setting_model->get_by_name('site_title_indonesia')->value;
		else $data['title'] = 'ITS';
		/* Header */
		$data['resultSidebar'] = $this->page_model->get_all_online($lang, MENU_SIDEBAR);
		$data['resultFixed'] = $this->page_model->get_all_online($lang, MENU_FIXED);
		$data['resultExtend'] = $this->page_model->get_all_online($lang, MENU_EXTEND);
		$data['resultFast'] = $this->fast_link_model->get_all($lang);//not found
		$data['resultLanguage'] = $this->language_model->get_all_language();
		/* Footer */
		// $data['resultFakultas'] = $this->footer_model->get_all_fakultas($lang);
		// $data['resultUnitKerja'] = $this->footer_model->get_all_unit_kerja($lang);
		// $data['resultJurusan'] = $this->footer_model->get_all_jurusan($lang);
		$data['resultSocial'] = $this->social_network_model->get_all();//not found
		/* ITS Online */
		$show_news = 8;
		$data['show_news'] = $show_news;
		$data['resultNews'] = $this->news_model->getHeadlinesUtama($lang,$show_news);
		$data['resultOpini'] = $this->news_model->getHeadlinesOpini($lang,$show_news);
		$data['resultProfil'] = $this->news_model->getHeadlinesProfil($lang,$show_news);
		$data['resultEditorial'] = $this->news_model->getHeadlinesEditorial($lang,$show_news);
		$data['resultMediaLain'] = $this->news_model->getHeadlinesMediaLain($lang,$show_news);
		// $data['resultHotNews'] = $this->news_model->get_latest_news($lang, $show_news, 10);
		$data['resultEureka'] = $this->eureka_tv_model->get_all_online(8);
		/* Inserting category ITS Online */
		$data['pilihanberita'] = array();
		$data['pilihanberita'][0] = $this->setting_model->get_by_name('kode_berita_utama')->value;//not found
		$data['pilihanberita'][1] = $this->setting_model->get_by_name('kode_opini')->value;//not found
		$data['pilihanberita'][2] = $this->setting_model->get_by_name('kode_profil')->value;//not found
		$data['pilihanberita'][3] = $this->setting_model->get_by_name('kode_redaksi')->value;//not found
		$data['pilihanberita'][4] = $this->setting_model->get_by_name('kode_media_lain')->value;//not found
		/* ITS Online Constants */
		$data['BERITA_UTAMA'] = $this->setting_model->get_by_name('kode_berita_utama')->value;//not found
		$data['OPINI'] = $this->setting_model->get_by_name('kode_opini')->value;//not found
		$data['PROFIL'] = $this->setting_model->get_by_name('kode_profil')->value;//not found
		$data['BERITA_EDITORIAL'] = $this->setting_model->get_by_name('kode_redaksi')->value;//not found
		$data['BERITA_MEDIA_LAIN'] = $this->setting_model->get_by_name('kode_media_lain')->value;//not found
		/* Index page */
		
		if($page=='index')
		{
			$data['resultActivities'] = $this->activity_model->get_upcoming_activity();
			$data['resultInteractive'] = $this->interactive_model->get_all($lang, true, true);
			//$data['resultSukolilo'] = $this->sukolilo_notes_model->get_all($lang, true);
			$data['pengumuman'] = $this->pengumuman_model->get_some();//edit
			/* Formatting Date */
			foreach ($data['resultActivities'] as $row)
			{
				$row->acttanggal = strftime('%d %B %Y', strtotime($row->acttanggal));
			}
			$data['jumlahSlideshow'] = $this->setting_model->get_by_name('jumlah_slideshow')->value;
		}else if($page == 'its_media'){
			$data['resultItsPoint'] = $this->its_point_model->get_all(4, 'I');
			$data['resultYIts'] = $this->its_point_model->get_all(4, 'Y');
			$data['resultBeranda'] = $this->its_point_model->get_all(4, 'B');
			$data['resultKlipping'] = $this->its_point_model->get_all(4, 'K');
			
			$this->addSidebar = '<a href="'.base_url().'layanan-liputan/'.$lang.'" class="btn btn-default" style="font-size: 14px">LAYANAN LIPUTAN</a>'.
								'<a href="'.base_url().'umpan-balik/'.$lang.'" class="btn btn-default" style="font-size: 14px">UMPAN BALIK</a>'.
								'<a href="'.base_url().'entry/citizen_journalism/'.$lang.'" class="btn btn-default" style="font-size: 14px">' . ($lang == 'id' ? 'Jurnalisme Warga' : 'Citizen Journalism') . '</a>';
		}
		/* edited by Doni Setio Pambudi, moved from if($page=='index') above */
		$data['resultHighlight'] = $this->highlight_model->get_all($lang, true);
		/* end editing */

		/* Get Terms */
		$data['terms'] = $this->terms_model->get_all($lang);
		/* Normalize Link */
		/* Sidebar link */
		foreach ($data['resultSidebar'] as $row)
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
		}
		foreach ($data['resultFixed'] as $row)
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
		}
		foreach ($data['resultExtend'] as $row)
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
		}
		foreach ($data['resultFast'] as $row)
		{
			$cross = strpos($row->url, '#');
			$http  = strpos($row->url, 'http://');
			$https = strpos($row->url, 'https://');
			$ftp   = strpos($row->url, 'ftp://');
			$outside = ($http===false and $https===false and $ftp===false);
			if($outside === true and $cross === false)
				$row->url = base_url().$row->url.'/'.$lang;
			else if($outside === true and $cross === true)
				$row->url = base_url().$row->url;
		}
		/* Language link */
		foreach ($data['resultLanguage'] as $row)
		{
			/* Replace index.php to normalize the link */
			$link = preg_replace('/index.php\//', '', current_url());
			$link = preg_replace('/index.php/', '', $link);
			/* Replace the language in the link before with the result Language */
			
			/* Note By Doni Setio Pambudi
			   codingan ini menyebabkan error, contoh
			   url yang error : http://its.ac.id/entry/terserah/en
			   maka hasil perubahan menjadi http://its.ac.id/idtry/terserah/id
			*/
			/*
			$link = preg_replace("/\/id/", "/".$row->link, $link);
			$link = preg_replace("/\/en/", "/".$row->link, $link);
			*/
			/* Replace the language in the link before with the result Language */
			
			/* New Code by Doni Setio Pambudi */
			/*
				2 bentuk link language yaitu
				1. Didalam / contoh http://its.ac.id/lihat/en/23343
				2. Terakhir link, contoh http://its.ac.id/article/2432/en
			 */
			$link = str_replace("\\", "/", $link); //convert \ menjadi /
			$linkPart = explode("/", $link); //split berdasarkan /
			$mClp = count($linkPart);
			for($cLp = 0; $cLp < $mClp; $cLp++){
				$tempLp = strtolower(trim($linkPart[$cLp]));
				if($tempLp == 'id') $linkPart[$cLp] = 'en'; //jika id, ubah ke en
				else if($tempLp == 'en') $linkPart[$cLp] = 'id';//jika en, ubah ke id
			}

			$link = implode("/", $linkPart); //satukan kembali
			
			/* END NEW CODE */
			
			/* Final check */
			if(base_url()==$link)
			{
				$link = $link.'index/'.$row->link;
			}
			$row->link = $link;
		}

                $data['doodle']=  $this->doodle();

		return $data;
	}

	private function checklang($lang)
	{
		if( $lang != 'id' AND $lang != 'en' )
		{
			/* Whoops, we don't have a page for that! */
            show_404();
		}
	}

	private function init_pagination($lang, $offset, $base_url)
	{
		// Round the page into multiply of per_page
		$page = floor($offset / PAGINATION_MULTIPLY) * PAGINATION_MULTIPLY;
		$this->load->library('pagination');
		$config['base_url'] = $base_url;
		$config['per_page'] = PAGINATION_MULTIPLY;
		$config['cur_page'] = $offset;
		$config['full_tag_open'] = '<div style="font-size: 14px;">';
		$config['full_tag_close'] = '</div">';
		$config['cur_tag_open'] = '<b style="padding-left: 5px;">';
		$config['cur_tag_close'] = '</b>';
		if($lang == 'id')
		{
			$config['first_link'] = '&lsaquo; Awal';
			$config['last_link'] = 'Akhir &rsaquo;';
		}
		else
		{
			$config['first_link'] = '&lsaquo; Start';
			$config['last_link'] = 'End &rsaquo;';
		}
		$config['next_link'] = '==&gt;';
		$config['prev_link'] = '&lt;==';
		return $config;
	}
	/* Akhir Fungsi Bantuan */

	/* Bagian Tampilan halaman standard */
    public function view($page='index', $lang='en')
    {
		$joinPage = array('i'=>'its_point', 'b'=>'beranda', 'y'=>'y_its', 'k'=>'klipping');

		$url = 'pages/v2/';
		if(!in_array($page, $joinPage)){
			if ( ! file_exists('application/views/pages/v2/'.$page.'.php'))
			{
				if( ! file_exists('application/views/pages/'.$page.'.php')){
					/* Whoops, we don't have a page for that! */
					show_404();
				}else{
					$url = 'pages/';
				}
			}
		}

        $this->checklang($lang);
        $data = $this->setdata($page, $lang);

        if(in_array($page, $joinPage)){
			$magzTitle = array('i'=>'ITS POINT', 'b'=>'BERANDA', 'y'=>'Y-ITS', 'k'=>'KLIPPING');
			$selectedPage = array_search($page, $joinPage);

			$data['magzTitle'] = $magzTitle[$selectedPage];
            $data['result_book']=$this->its_point_model->get_all(null, $selectedPage);
			$page = 'its_point';
        }
		
		if($page == 'its_tv'){
			$data['resultEureka'] = $this->eureka_tv_model->get_all_online();
		}
		
        /* Load views */
        $this->load->view('templates/v2/header', $data);
        $this->load->view($url.$page, $data);
        $this->load->view('templates/v2/footer', $data);
    }
	/* Bagian Berita ITS Online */
	public function news($newsid, $lang='en')
	{
		$this->checklang($lang);
		$data = $this->setdata('news', $lang);
		$available = $this->news_model->isNewsAvailable($newsid);
		if($available === false)
		{
			show_404();
		}
		/* Berita */
		$data['beritaLengkap'] = $this->news_model->getNewsDetail($newsid);
		/* Load views */
        $this->load->view('templates/v2/header', $data);
        $this->load->view('templates/v2/news', $data);
        $this->load->view('templates/v2/footer', $data);
	}
	/* Bagian Artikel */
	public function article($article_name, $lang='en')
	{
		$this->load->model('article_model');
		$this->checklang($lang);
		$data = $this->setdata('article', $lang);
		$available = $this->article_model->get_object_lang_by_code($article_name, $lang);
		if($available == null)
		{
			show_404();
		}
		$data['article'] = $available;
		/* Load views */
        $this->load->view('templates/v2/header', $data);
        $this->load->view('templates/v2/common', $data);
        $this->load->view('templates/v2/footer', $data);
	}
	/* Bagian Arsip */
	public function archive_agenda($lang='en', $year=0, $month=0, $offset=0, $num=5)
	{
		if($year == 0)
			$year = date('Y');
		if($month == 0)
			$month = date('m');
		$this->checklang($lang);
		$this->load->model('activity_model');
		$count = $this->activity_model->count_activity_ajax($year, $month);
		$activity = $this->activity_model->get_activity_ajax($year, $month, $lang, $offset, $num);
		
		$data = $this->setdata('archive_agenda', $lang);

		$data['periodeYear'] = $this->activity_model->get_years();
		$data['year'] 		= $year;
		$data['month'] 		= $month;
		$data['offset'] 	= $offset;
		$data['num'] 		= $num;
		$data['count']		= $count;
		$data['activity'] 	= $activity;
		
		/* Load views */
        $this->load->view('templates/v2/header', $data);
        $this->load->view('pages/v2/archive_agenda', $data);
        $this->load->view('templates/v2/footer', $data);
	}
	
	public function archive_news($lang='en',$news_category=2, $year=0, $month=0, $offset=0, $num=5)
	{
		if($year == 0)
			$year = date('Y');
		if($month == 0)
			$month = date('m');
		$this->checklang($lang);
		$this->load->model('news_model');		
		$count = $this->news_model->count_news_on_category($news_category, $year, $month);
		$news = $this->news_model->get_news_on_category($news_category, $year, $month, $offset, $num);

		$data = $this->setdata('archive_news', $lang);

		$data['list_category'] = $this->news_model->get_news_category();
        $data['news_category'] = $news_category;
		$data['year'] 	= $year;
		$data['month'] 	= $month;
		$data['offset'] = $offset;
		$data['num'] 	= $num;
		$data['count']	= $count;
		$data['news'] 	= $news;
		/* Load views */
        $this->load->view('templates/v2/header', $data);
        $this->load->view('pages/v2/archive_news', $data);
        $this->load->view('templates/v2/footer', $data);
	}

	/* old news
	public function archive_news($lang='en')
	{
		$this->checklang($lang);
		$data = $this->setdata('archive_news', $lang);
		
		$data['list_category'] = $this->news_model->get_news_category();
		/* Load views 
        $this->load->view('templates/v2/header', $data);
        $this->load->view('pages/v2/archive_news', $data);
        $this->load->view('templates/v2/footer', $data);
	}
	
	/* Bagian Pengumuman */
	public function archive_pengumuman($lang='en', $year=0, $month=0, $offset=0, $num=5)
	{
		if($year == 0)
			$year = date('Y');
		if($month == 0)
			$month = date('m');
		$this->checklang($lang);
		$this->load->model('pengumuman_model');
		$count = $this->pengumuman_model->count_pengumuman_ajax($year, $month);
		$pengumuman = $this->pengumuman_model->get_pengumuman_ajax($year, $month, $lang, $offset, $num);
		
		$data = $this->setdata('archive_pengumuman', $lang);

		$data['periodeYear'] 	= $this->activity_model->get_years();
		$data['year'] 			= $year;
		$data['month'] 			= $month;
		$data['offset'] 		= $offset;
		$data['num'] 			= $num;
		$data['count']			= $count;
		$data['pengumuman'] 	= $pengumuman;
		
		/* Load views */
        $this->load->view('templates/v2/header', $data);
        $this->load->view('pages/v2/archive_pengumuman', $data);
        $this->load->view('templates/v2/footer', $data);
	}
	
	public function recaptcha_validation($str)
	{
		$return = recaptcha_check_answer('6LfRgOYSAAAAAP1VQfl0PlI6kZUx-tQmErK_-yet',
										$_SERVER["REMOTE_ADDR"],
										$this->input->post("recaptcha_challenge_field"),
										$this->input->post("recaptcha_response_field"));
	 
		if(!$return->is_valid) 
		{ return FALSE; }
		else 
		{ return TRUE; }
	}
	
	public function citizen_journalism($lang='en'){
		$this->checklang($lang);
		$data = $this->setdata('citizen_jurnalism', $lang);
		
		$this->lang->load('its');
		$this->load->helper('recaptchalib');
		
		$this->form_validation->set_rules('judul', $lang == 'id' ? 'Judul' : 'Title', 'required|max_length[255]');
		$this->form_validation->set_rules('foto', $lang == 'id' ? 'Foto' : 'Photo', 'required|max_length[255]');
		$this->form_validation->set_rules('isi', $lang == 'id' ? 'Isi' : 'Content', 'required|min_length[30]');
		$this->form_validation->set_rules('recaptcha_response_field', 'Captcha' , 'required|callback_recaptcha_validation');
		
		if($this->form_validation->run()){
			//send email here
			$subject = "[New Citizen Jurnalism] " . $this->input->post('judul');
			$to = $this->setting_model->get_by_name('email_citizen_jurnalism')->value;
			$message = '<table width="100%"><tbody>'.
						'<tr><td valign="top">Judul</td><td valign="top">:</td><td valign="top">' . $this->input->post('judul') . '</td></tr>'.
						'<tr><td valign="top">Gambar</td><td valign="top">:</td><td valign="top"><img alt="article image" src="'.$this->input->post('foto') . '"/></td></tr>'.
						'<tr><td valign="top">Isi</td><td valign="top">:</td><td valign="top">' . $this->input->post('isi') . '</td></tr></tbody></table>';
			$headers = "From:noreply@its.ac.id\r\nContent-type: text/html; charset=iso-8859-1\r\n";
			
			if(mail($to,$subject,$message,$headers)){			
				$data['frm_msg'] = $lang == 'id' ? "Terima kasih, artikel Anda akan kami evaluasi." : "Thank your, your article will be evaluated.";
				$data['error_send'] = false;
			}else{
				$data['frm_msg'] = $lang == 'id' ? "Gagal mengirim email." : "Email delivery failed.";
				$data['error_send'] = true;
			}
		}
		
		$this->load->view('templates/v2/header', $data);
        $this->load->view('pages/v2/citizen_jurnalism', $data);
        $this->load->view('templates/v2/footer', $data);
	}
	
	public function layanan_liputan($lang='en'){
		$this->checklang($lang);
		$data = $this->setdata('layanan-liputan', $lang);
		
		$this->lang->load('its');
		$this->load->helper('recaptchalib');
		
		$this->form_validation->set_rules('type', $lang == 'id' ? 'Jenis Liputan' : 'Coverage Type', 'required');
		$this->form_validation->set_rules('nama', $lang == 'id' ? 'Nama Acara' : 'Program Name', 'required|max_length[255]');
		$this->form_validation->set_rules('deskripsi', $lang == 'id' ? 'Deskripsi Acara' : 'Program Description', 'required|min_length[30]');
		$this->form_validation->set_rules('narasumber', $lang == 'id' ? 'Narasumber yang diundang' : 'Speakers', 'required|min_length[30]');
		$this->form_validation->set_rules('tempat', $lang == 'id' ? 'Tempat Acara' : 'Place', 'required|max_length[255]');
		$this->form_validation->set_rules('tanggal', $lang == 'id' ? 'Hari, Tanggal pelaksanaan' : 'Date', 'required|max_length[255]');
		$this->form_validation->set_rules('jam', $lang == 'id' ? 'Jam pelaksanaan' : 'Time', 'required|max_length[255]');
		$this->form_validation->set_rules('unit', $lang == 'id' ? 'Unit Kerja/Lembaga Penyelenggara(di lingkungan ITS)' : 'Unit', 'required|max_length[255]');
		$this->form_validation->set_rules('penanggungjawab', $lang == 'id' ? 'Nama Penanggung Jawab' : 'Person In Charge', 'required|max_length[255]');
		$this->form_validation->set_rules('contact', $lang == 'id' ? 'Contact Person(HP)' : 'Contact Person(Cellphone)', 'required|max_length[255]');
		$this->form_validation->set_rules('email', $lang == 'id' ? 'Contact Person(e-mail selain ITS)' : 'Contact Person(non ITS e-mail)', 'required|max_length[255]');
		$this->form_validation->set_rules('emailits', $lang == 'id' ? 'E-mail ITS' : 'ITS e-mail', 'required|max_length[255]');
		$this->form_validation->set_rules('web', $lang == 'id' ? 'Website Acara' : 'Program Website', 'required|max_length[255]');		
		$this->form_validation->set_rules('recaptcha_response_field', 'Captcha' , 'required|callback_recaptcha_validation');
		
		if($this->form_validation->run()){
			//send email here
			$subject = "[New Layanan Liputan] " . $this->input->post('nama');
			$to = $this->setting_model->get_by_name('email_layanan_liputan')->value;
			$message = "Jenis Liputan : ".$this->input->post('type') . "<hr/>".
					   "Nama Acara : ".$this->input->post('nama') . "<hr/>".
					   "Deskripsi Acara :<br>".$this->input->post('deskripsi') . "<hr/>".
					   "Narasumber :<br>".$this->input->post('narasumber') . "<hr/>".
					   "Tempat Acara : ".$this->input->post('tempat') . "<hr/>".
					   "Hari, Tanggal pelaksanaan : ".$this->input->post('tanggal') . "<hr/>".
					   "Jam pelaksanaan : ".$this->input->post('jam') . "<hr/>".
					   "Unit Kerja/Lembaga Penyelenggara(di lingkungan ITS) : ".$this->input->post('unit') . "<hr/>".
					   "Penanggung Jawab : ".$this->input->post('penanggungjawab') . "<hr/>".
					   "Contact Person(HP) : ".$this->input->post('contact') . "<hr/>".
					   "Contact Person(e-mail selain ITS) : ".$this->input->post('email') . "<hr/>".
					   "E-mail ITS : ".$this->input->post('emailits') . "<hr/>".
					   "Website Acara : ".$this->input->post('web');
			$headers = "From:noreply@its.ac.id\r\nContent-type: text/html; charset=iso-8859-1\r\n";

            if(mail($to,$subject,$message,$headers)){
                $data['frm_msg'] = $lang == 'id' ? "Terima kasih, artikel Anda akan kami evaluasi." : "Thank your, your article will be evaluated.";
				$data['error_send'] = false;
			}else{
				$data['frm_msg'] = $lang == 'id' ? "Gagal mengirim email." : "Email delivery failed.";
				$data['error_send'] = true;
			}
		}
		
		$this->load->view('templates/v2/header', $data);
        $this->load->view('pages/v2/layanan-liputan', $data);
        $this->load->view('templates/v2/footer', $data);
	}
	
	public function umpan_balik($lang='en'){
		$this->checklang($lang);
		$data = $this->setdata('umpan-balik', $lang);
		
		$this->lang->load('its');
		$this->load->helper('recaptchalib');
		
		$this->form_validation->set_rules('topic', $lang == 'id' ? 'Topik Permasalahan / Usulan' : 'Topic', 'required|max_length[255]');
		$this->form_validation->set_rules('unit', $lang == 'id' ? 'Unit Kerja di ITS terkait' : 'Unit', 'required|max_length[255]');
		$this->form_validation->set_rules('nama', $lang == 'id' ? 'Nama' : 'Name', 'required|max_length[255]');
		$this->form_validation->set_rules('status', $lang == 'id' ? 'Status' : 'Status', 'required');
		$this->form_validation->set_rules('nip', $lang == 'id' ? 'NIP / NRP' : 'NIP / NRP', 'required|max_length[255]');
		$this->form_validation->set_rules('email', $lang == 'id' ? 'E-mail' : 'E-mail', 'required|max_length[255]');
		$this->form_validation->set_rules('telp', $lang == 'id' ? 'Telp / HP' : 'Telp / HP', 'required|max_length[255]');
		$this->form_validation->set_rules('afiliasi', $lang == 'id' ? 'Unit afiliasi di ITS' : 'Unit affiliation', 'required|max_length[255]');
		$this->form_validation->set_rules('deskripsi', $lang == 'id' ? 'Deskripsi Permasalahan / Usulan ' : 'Problem Description', 'required|min_length[30]');
		
		$this->form_validation->set_rules('recaptcha_response_field', 'Captcha' , 'required|callback_recaptcha_validation');
		
		if($this->form_validation->run()){
			//send email here
			$subject = "[New Citizen Jurnalism] " . $this->input->post('judul');
			$to = $this->setting_model->get_by_name('email_umpan_balik')->value;
			$message = "Topik Permasalahan / Usulan : ".$this->input->post('topic') . "<hr/>".
					   "Unit Kerja di ITS terkait : ".$this->input->post('unit') . "<hr/>".
					   "Nama : ".$this->input->post('nama') . "<hr/>".
					   "Status : ".$this->input->post('status') . "<hr/>".
					   "NIP / NRP : ".$this->input->post('nip') . "<hr/>".
					   "E-mail : ".$this->input->post('email') . "<hr/>".
					   "Telp / HP : ".$this->input->post('telp') . "<hr/>".
					   "Unit afiliasi di ITS : ".$this->input->post('afiliasi') . "<hr/>".
					   "Deskripsi Permasalahan / Usulan :<br>".$this->input->post('deskripsi') . "<hr/>".
					   "Usulan Solusi :<br>".$this->input->post('solusi');
			$headers = "From:noreply@its.ac.id\r\nContent-type: text/html; charset=iso-8859-1\r\n";
			
			if(mail($to,$subject,$message,$headers)){			
				$data['frm_msg'] = $lang == 'id' ? "Terima kasih, artikel Anda akan kami evaluasi." : "Thank your, your article will be evaluated.";
				$data['error_send'] = false;
			}else{
				$data['frm_msg'] = $lang == 'id' ? "Gagal mengirim email." : "Email delivery failed.";
				$data['error_send'] = true;
			}
		}
		
		$this->load->view('templates/v2/header', $data);
        $this->load->view('pages/v2/umpan-balik', $data);
        $this->load->view('templates/v2/footer', $data);
	}


	/* Bagian Pencarian */

	public function search($lang = 'en', $offset=0)
	{
		//$keyword = $this->input->post('keyword');
		//echo $keyword;

		$this->form_validation->set_rules('keyword', 'keyword', 'callback_input_search_check');
		if ($this->form_validation->run() == FALSE)
		{
			$this->checklang($lang);
			$data = $this->setdata('search', $lang);
			//echo $this->input->post('keyword').'<br/>';
			$data['error_inp']=validation_errors();
			//redirect("http://www.google.com");
		}
		else
		{
			$keyword = $this->input->post('keyword');
			$offset = $this->input->post('offset');

			$this->load->model('search_model');
			$this->checklang($lang);
			$data = $this->setdata('search', $lang);

			if(isset($_GET['keyword']) or $keyword != null)
			{
				if(isset($_GET['keyword']))
				{
					$data['keyword'] = $_GET['keyword'];
				}
				else $data['keyword'] = $keyword;
				if($data['keyword'] == null or trim($data['keyword'])=="") {redirect(base_url().'?err=pencarian%20tidak%20boleh%20kosong');}
				$data['result_article'] = $this->search_model->search($data['keyword'], $lang);
				/* Pagination */

				$data['total_rows'] = $this->search_model->count_all($data['keyword'], $lang);
				$data['model'] = array();
				$i=$offset;
				for($i=$offset; $i<$offset+5; $i++)
				{
					if($i < sizeof($data['result_article']))
					{
						$data['model'][$i] = $data['result_article'][$i];
					}
					else break;
				}
			}
		}
		/* Load views */

        $this->load->view('templates/v2/header', $data);
        $this->load->view('pages/v2/search_result', $data);
        $this->load->view('templates/v2/footer', $data);

	}
        public function input_search_check($str){
            if(preg_match('/[^a-zA-Z0-9 ]/i', $str)){
                $this->form_validation->set_message('input_search_check', 'inputan salah atau tidak sesuai');
                return FALSE;
            }
            else {
                return TRUE;
            }
        }
	public function search_news($lang = 'en', $keyword=null, $offset=0)
	{
		if(isset($_GET['keyword']))
		{
			// Redirect into correct link
			if($_GET['keyword'] == null or trim($_GET['keyword'])=="") {redirect(base_url().'its_media/id?err=pencarian%20tidak%20boleh%20kosong');}
			redirect(base_url()."pencarian_berita/$lang/".$_GET['keyword']);
		}
		$this->load->model('news_model');
		$this->checklang($lang);
		$data = $this->setdata('search', $lang);
		if(isset($_GET['keyword']) or $keyword != null)
		{
			if(isset($_GET['keyword']))
			{
				$data['keyword'] = $_GET['keyword'];
			}

			else $data['keyword'] = $keyword;
			if($data['keyword'] == null or trim($data['keyword'])=="") {redirect(base_url().'?err=pencarian%20tidak%20boleh%20kosong');}
			$data['result_article'] = $this->news_model->search($data['keyword'], $lang);
			/* Pagination */
			$config = $this->init_pagination($lang, $offset, base_url()."pencarian_berita/$lang/".$data['keyword']);
			$config['total_rows'] = $this->news_model->count_all($data['keyword'], $lang);
			$data['model'] = array();
			$i=$offset;
			for($i=$offset; $i<$offset+$config['per_page']; $i++)
			{
				if($i < sizeof($data['result_article']))
				{
					$data['model'][$i] = $data['result_article'][$i];
				}
				else break;
			}
			$this->pagination->initialize($config);
		}
		/* Load views */
        $this->load->view('templates/header', $data);
        $this->load->view('pages/search_result', $data);
        $this->load->view('templates/footer', $data);
	}
	/* Bagian intro */
	public function intro($lang = 'en')
	{
		$data = $this->setdata('intro', $lang);
		$this->load->view('pages/intro', $data);
	}

	public function fakultas($lang)//$lang = 'id')
	{
		//$this->checklang($lang);
		$data = $this->setdata($page, $lang);

		$this->load->model('view_fakultas_model');
		$this->load->model('view_jurusan_model');

		$query1=$this->view_fakultas_model->get_lang($lang);
		$data['result']=$query1;
		$hahah = array();

		foreach ($data['result'] as $row) {
			$query2=$this->view_fakultas_model->getImages($row->idFak);
			foreach($query2 as $row2){
				$img[]=array('fakultas'=>$row->namaFakultas, 'idFak'=>$row2->idFak, 'images'=>$row2->image_name, 'id_images'=>$row2->id_images);
			}
			$query=$this->view_jurusan_model->get_some($row->namaFakultas);
			foreach ($query as $row2) {
				$hahah[] = array('fakultas' => $row->namaFakultas,'jurusan'=> $row2->namaJurusan,'idJur'=> $row2->idJur);
			}
		}
		$data['hahah'] = $hahah;
		$data['img'] = $img;
				/* Load views */
		$this->load->view('templates/v2/header', $data);
		$this->load->view('pages/v2/fakultas',$data);
		$this->load->view('templates/v2/footer', $data);
	}

	public function fakultas_detail($id,$lang){
		$data = $this->setdata($page, $lang);

		$this->load->model('view_fakultas_model');
		$this->load->model('view_jurusan_model');

		$data['result']=$this->view_fakultas_model->get_someLang($lang, $id);
		$hahah = array();

		foreach ($data['result'] as $row) {
			$query2=$this->view_fakultas_model->getImages($row->idFak);
			foreach($query2 as $row2){
				$img[]=array('fakultas'=>$row->namaFakultas, 'idFak'=>$row2->idFak, 'images'=>$row2->image_name, 'id_images'=>$row2->id_images);
			}

			$query=$this->view_jurusan_model->get_some($row->namaFakultas);
			foreach ($query as $row2) {
				$hahah[] = array( 'fakultas' => $row->namaFakultas,'jurusan'=> $row2->namaJurusan,'idJur'=> $row2->idJur);
			}
		}
		$data['hahah'] = $hahah;
		$data['img'] = $img;

		/* Load views */
		$this->load->view('templates/v2/header', $data);
		$this->load->view('pages/v2/detail_fakultas',$data);
		$this->load->view('templates/v2/footer', $data);
	}

	public function jurusan($id,$lang)
	{
		$data = $this->setdata($page, $lang);

		$this->load->model('view_jurusan_model');

		$data['result']=$this->view_jurusan_model->get_id($id);
		foreach($data['result'] as $row){
			$query2=$this->view_jurusan_model->getImages($row->idJur);
				foreach($query2 as $row2){
					$img[]=array('idJur'=>$row2->idJur, 'images'=>$row2->image_name, 'id_images'=>$row2->id_images);
				}
		}
		$data['img'] = $img;

		$this->load->model('footer_jurusan_model');
		$data['footer']=$this->footer_jurusan_model->get_someID($id);

		/* normalize url, buat demo only, sementara, nanti dihapus ya - DONI SETIO PAMBUDI - */
		/*$checkAttr = array('kurikulum', 'laboratorium', 'dosen', 'publikasi');
		foreach($data['footer'] as $ft){
			foreach($checkAttr as $attr){
				$tempAttr = $ft->$attr;
				if(strpos($tempAttr,'http://') !== false){
					$ft->$attr = str_replace('http://webbeta.its.ac.id/', base_url(), $tempAttr);
				}else{
					$ft->$attr = base_url() . ltrim($ft->$attr, '/');
				}
			}
		}*/
		/* end of hapus */

		/* Load views */
		$this->load->view('templates/v2/header', $data);
		$this->load->view('pages/v2/jurusan',$data);
		$this->load->view('templates/v2/footer', $data);
	}

	public function page_404($lang='en'){
		$data = $this->setdata('404', $lang);
		$this->load->view('templates/v2/header', $data);
		$this->load->view('templates/v2/404',$data);
		$this->load->view('templates/v2/footer', $data);
	}

	public function doodle(){
		$this->load->model('doodle_model');
		$this->load->helper('date');
		$data=$this->doodle_model->get_all();
		$link='';
		foreach ($data as $row){
			if(strtotime($row->now)>=$row->date_start && strtotime($row->now)<=$row->date_end){
				//echo 'true '.$row->name.' '.$row->date_start.' '.$row->date_end.'<br/>';
				$link=$row->link;
			}
		}
		return $link;
	}

}
/* End of Page Controller */
/* 31 Juli 2012 [09:57 AM] */