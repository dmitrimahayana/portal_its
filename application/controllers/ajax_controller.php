<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax_controller extends CI_Controller {	
    public function __construct()
    {
        parent::__construct();
    }
	
    public function index()
    {
		echo 'index';
    }
	
	/* Bagian Berita */
	public function ajax_news($news_category, $year, $month, $offset=0, $num=5)
	{
		$this->load->model('news_model');
		$news = $this->news_model->get_news_on_category($news_category, $year, $month, $offset, $num);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($news));
	}	
	public function ajax_count_news($news_category, $year, $month)
	{
		$this->load->model('news_model');
		$news = $this->news_model->count_news_on_category($news_category, $year, $month);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($news));
	}	
	public function ajax_year_news($news_category)
	{
		$this->load->model('news_model');
		$news = $this->news_model->get_years($news_category);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($news));
	}
	public function ajax_month_news($news_category, $year)
	{
		$this->load->model('news_model');
		$news = $this->news_model->get_months($news_category, $year);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($news));
	}
	/* End Berita */
	
	/* Bagian Agenda Aktivitas */
	public function ajax_event($year, $month, $lang, $offset, $num)
	{
		$this->load->model('activity_model');
		$activity = $this->activity_model->get_activity_ajax($year, $month, $lang, $offset, $num);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($activity));
	}	
	public function ajax_count_event($year, $month)
	{
		$this->load->model('activity_model');
		$news = $this->activity_model->count_activity_ajax($year, $month);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($news));
	}	
	public function ajax_month_event($year)
	{
		$this->load->model('activity_model');
		$activity = $this->activity_model->get_months($year);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($activity));
	}
	/* End Agenda Aktivitas */

	/* Bagian Pengumuman */
	public function ajax_pengumuman($year, $month, $lang, $offset, $num)
	{
		$this->load->model('pengumuman_model');
		$pengumuman = $this->pengumuman_model->get_pengumuman_ajax($year, $month, $lang, $offset, $num);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($pengumuman));
	}	
	public function ajax_count_pengumuman($year, $month)
	{
		$this->load->model('pengumuman_model');
		$news = $this->pengumuman_model->count_pengumuman_ajax($year, $month);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($news));
	}	
	public function ajax_month_pengumuman($year)
	{
		$this->load->model('pengumuman_model');
		$pengumuman = $this->pengumuman_model->get_months($year);
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($pengumuman));
	}
	/* End Pengumuman */
	
	/* Bagian Daftar Pengguna */
	public function ajax_list_user()
	{
		$this->load->model('user_model');
		$users = $this->user_model->get_all();
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($users));
	}
	/* End Daftar Pengguna */
}
/* End of Ajax Controller */
/* 31 Juli 2012 [09:57 AM] */