<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/* Custom Controller */
$route['show/fakultas/detail/(:any)/(:any)']                        ='page/fakultas_detail/$1/$2';
$route['show/fakultas/(:any)']                                      ='page/fakultas/$1';
$route['show/jurusan/(:any)/(:any)']                                ='page/jurusan/$1/$2';
$route['stakeholder/(:any)'] 					= 'page/stakeholder/$1/$2';
$route['berita/archive/(:any)'] 				= 'page/archive_news/$1';
$route['berita/(:any)'] 						= 'page/news/$1/$2';
$route['article/(:any)'] 						= 'page/article/$1/$2';
$route['agenda/(:any)']							= 'page/archive_agenda/$1';
$route['pencarian/(:any)/(:any)/(:any)']		= 'page/search/$1/$2/$3';
$route['pencarian/(:any)/(:any)']				= 'page/search/$1/$2';
$route['pencarian/(:any)']						= 'page/search/$1';
$route['pencarian_berita/(:any)/(:any)/(:any)']	= 'page/search_news/$1/$2/$3';
$route['pencarian_berita/(:any)/(:any)']		= 'page/search_news/$1/$2';
$route['pencarian_berita/(:any)']				= 'page/search_news/$1';
$route['ajax/(:any)/(:any)/(:any)/(:any)']		= 'ajax_controller/$1/$2/$3/$4';
$route['ajax/(:any)/(:any)/(:any)']				= 'ajax_controller/$1/$2/$3';
$route['ajax/(:any)/(:any)']					= 'ajax_controller/$1/$2';
$route['ajax/(:any)']							= 'ajax_controller/$1';
$route['upload/(:any)/(:any)/(:any)/(:any)']	= 'upload/$1/$2/$3/$4';
$route['upload/(:any)']							= 'upload/$1';
$route['upload']								= 'upload';
$route['intro']									= 'page/intro';
/* Halaman backend */
$route['login'] 								= 'backend/login';
$route['backend/(:any)'] 						= 'backend/validate_key/$1';
$route['beranda/view/(:any)/(:any)/(:any)']		= 'backend/view_page/$1/$2/$3';
$route['beranda/view/(:any)/(:any)']			= 'backend/view_page/$1/$2';
$route['beranda/view/(:any)']					= 'backend/view_page/$1';
$route['beranda/add/(:any)']					= 'backend/add_page/$1';
$route['beranda/edit/(:any)/(:any)']			= 'backend/edit_page/$1/$2';
$route['beranda/delete/(:any)/(:any)']			= 'backend/delete_page/$1/$2';
$route['beranda/func/(:any)/(:any)']			= 'backend/$1/$2';
$route['beranda/func/(:any)']					= 'backend/$1';
$route['beranda']								= 'backend/dashboard';

$route['beranda/manageFakAndJur/add/data/(:any)']		= 'backend/addDataFakAndJur/$1';
$route['beranda/manageFakAndJur/add/(:any)']			= 'backend/addFakandJur/$1';
$route['beranda/manageFakAndJur/delete/(:any)/(:any)']			= 'backend/deleteFakandJur/$1/$2';
$route['beranda/manageFakAndJur/edit/data/(:any)']               = 'backend/editDataFakandJur/$1';
$route['beranda/manageFakAndJur/edit/(:any)/(:any)']			= 'backend/editFakandJur/$1/$2';
$route['beranda/manage/(:any)']					= 'backend/manageFakAndJur/$1';

/* Maximum 2 parameters for other page */
$route['(:any)/(:any)/(:any)'] 					= '404';
$route['(:any)/(:any)'] 						= 'page/view/$1/$2';
$route['(:any)'] 								= 'page/view/$1';
/* 404 Page */
$route['404_override'] 							= 'page_404';
/* Default Controller*/
$route['default_controller'] 					= 'page/view';
/* End of file routes.php */
/* 31 Juli 2012 [10:37 AM] */
/* Location: ./application/config/routes.php */