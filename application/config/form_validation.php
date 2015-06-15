<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(
'page' => array(
				array(
						'field' => 'name',
						'label' => 'Nama',
						'rules' => 'trim|required|min_length[3]|max_length[30]|xss_clean'
					 ), 
				array(
						'field' => 'order',
						'label' => 'Urutan',
						'rules' => 'required|is_natural_no_zero'
					 ),
				array(
						'field' => 'link',
						'label' => 'Link',
						'rules' => 'trim|required|max_length[150]|xss_clean'
					 ),
				array(
						'field' => 'category',
						'label' => 'Kategori',
						'rules' => 'is_natural_no_zero'
					 ),
				array(
						'field' => 'name_id',
						'label' => 'Nama Indonesia',
						'rules' => 'trim|required|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'name_en',
						'label' => 'Nama Inggris',
						'rules' => 'trim|max_length[50]|xss_clean'
					 )
				)
				,
'page-category' => array(
				array(
						'field' => 'code',
						'label' => 'Code',
						'rules' => 'required|xss_clean|max_length[20]'
					 ),
				array(
						'field' => 'name',
						'label' => 'Name',
						'rules' => 'required|xss_clean|max_length[50]'
					 )
				)
				,
'user' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[5]|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'password',
						'rules' => 'trim|required|min_length[5]|max_length[64]|xss_clean'
					 ),
				array(
						'field' => 'email',
						'label' => 'Email',
						'rules' => 'email'
					 ),
				array(
						'field' => 'screen_name',
						'label' => 'Screen name',
						'rules' => 'trim|required|min_length[5]|max_length[50]|xss_clean'
					 )
				)
				,
'terms' => array(
				array(
						'field' => 'terms',
						'rules' => 'trim|required|min_length[3]|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'name_id',
						'rules' => 'trim|required|max_length[255]|xss_clean'
					 ),
				array(
						'field' => 'name_en',
						'rules' => 'trim|max_length[255]|xss_clean'
					 )
				)
				,
'setting' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[3]|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'value',
						'rules' => 'trim|required|max_length[50]|xss_clean'
					 )
				)
				,
'article' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[3]|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'name_id',
						'rules' => 'trim|required|xss_clean'
					 ),
				array(
						'field' => 'name_en',
						'rules' => 'trim|xss_clean'
					 ),
				array(
						'field' => 'title_id',
						'rules' => 'trim|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'title_en',
						'rules' => 'trim|max_length[30]|xss_clean'
					 )
				)
				,
'interactive' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[3]|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'name_id',
						'rules' => 'trim|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'name_en',
						'rules' => 'trim|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'order',
						'label' => 'Urutan',
						'rules' => 'required|is_natural_no_zero'
					 ),
				array(
						'field' => 'url',
						'rules' => 'trim|xss_clean'
					 )
				)
				,
'stakeholder-menu' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[3]|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'title',
						'rules' => 'trim|required|max_length[100]|xss_clean'
					 ),
				array(
						'field' => 'link',
						'rules' => 'trim|required|max_length[150]|xss_clean'
					 ),
				array(
						'field' => 'order',
						'label' => 'Urutan',
						'rules' => 'required|is_natural_no_zero'
					 )
				)
				,
'stakeholder' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[3]|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'name_id',
						'rules' => 'trim|required|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'name_en',
						'rules' => 'trim|max_length[30]|xss_clean'
					 )
				)
				,
'highlight' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[3]|max_length[30]|xss_clean'
					 ),
				array(
						'field' => 'name_id',
						'rules' => 'trim|required|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'name_en',
						'rules' => 'trim|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'order',
						'rules' => 'required|is_natural_no_zero'
					 )
				)
				,
'social-network' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[3]|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'link',
						'rules' => 'trim|required|xss_clean'
					 ),
				array(
						'field' => 'order',
						'rules' => 'required|is_natural_no_zero'
					 )
				)
				,
'user-group' => array(
				array(
						'field' => 'slug',
						'rules' => 'trim|required|min_length[3]|max_length[25]|xss_clean'
					 ),
				array(
						'field' => 'group_name',
						'rules' => 'trim|required|max_length[100]|xss_clean'
					 ),
				array(
						'field' => 'level',
						'rules' => 'required|greater_than[-100000]|less_than[100000]'
					 )
				)
				,
'backend-page' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|min_length[3]|max_length[20]|xss_clean'
					 ),
				array(
						'field' => 'display_name',
						'rules' => 'trim|required|max_length[50]|xss_clean'
					 ), 
				array(
						'field' => 'order',
						'label' => 'Urutan',
						'rules' => 'required|is_natural_no_zero'
					 ),
				array(
						'field' => 'link',
						'label' => 'Link',
						'rules' => 'trim|required|max_length[150]|xss_clean'
					 )
				)
				,
'fast-link' => array(
				array(
						'field' => 'url',
						'rules' => 'trim|required|xss_clean'
					 ),
				array(
						'field' => 'name_id',
						'rules' => 'trim|required|max_length[30]|xss_clean'
					 ), 
				array(
						'field' => 'name_en',
						'rules' => 'trim|max_length[30]|xss_clean'
					 ), 
				array(
						'field' => 'order',
						'rules' => 'required|is_natural_no_zero'
					 )
				)
				,
'sukolilo-notes' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'title_id',
						'rules' => 'trim|required|max_length[50]|xss_clean'
					 ), 
				array(
						'field' => 'title_en',
						'rules' => 'trim|max_length[50]|xss_clean'
					 ), 
				array(
						'field' => 'content_id',
						'rules' => 'trim|required|max_length[250]|xss_clean'
					 ), 
				array(
						'field' => 'content_en',
						'rules' => 'trim|max_length[250]|xss_clean'
					 ), 
				array(
						'field' => 'link',
						'rules' => 'trim|xss_clean'
					 )
				)
				,
'eureka-tv' => array(
				array(
						'field' => 'name',
						'rules' => 'trim|required|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'title',
						'rules' => 'trim|required|max_length[150]|xss_clean'
					 ), 
				array(
						'field' => 'youtube_id',
						'rules' => 'trim|required|max_length[50]|xss_clean'
					 ),
				array(
						'field' => 'link',
						'rules' => 'trim|xss_clean'
					 )
				)
				// ,
);
/* End of file form_validation.php */
/* 31 Juli 2012 [10:37 AM] */
/* Location: ./application/config/form_validation.php */