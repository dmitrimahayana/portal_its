<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {	

public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('image_handler');
	}

	/*public function index()
	{
		$this->load->view('upload_form');
	}*/

	public function do_upload2($userfilename='userfile', $width=0, $height=0, $prop = false)
	{
		$upload_path_url = base_url().'files/file/';
		//$upload_thumb_url = base_url().'files/images/thumbnails/';
		$upload_path_full = FCPATH.'files/file/';
		//$upload_thumb_full = FCPATH.'files/images/thumbnails/';
		$config['upload_path'] = FCPATH.'files/file/';
		$config['allowed_types'] = '*';
		$config['max_size']    = '9000000';
		$config['overwrite']     = FALSE;
		
	  	$this->load->library('upload');
		$data = array();

		for ($k = 0; $k < count($_FILES[$userfilename]['name']); $k++) {
			$this->upload->initialize($config); //must reinitialize to get rid of your bug ( i had it as well)
			if (!$this->upload->do_upload($userfilename,$k)) {
				$errors = $this->upload->display_errors();
                                
			}
			else
			{
				$data = $this->upload->data();
				//// set the data for the json array	
				$info->name = $data['file_name'];
				$info->size = $data['file_size'];
				$info->type = $data['file_type'];
				$info->url = $upload_path_url .$data['file_name'];
				//$info->thumbnail_url = $upload_thumb_url .$data['file_name']; 
				//I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
				$info->delete_url = base_url().'upload/deleteImage/'.$data['file_name'];
				$info->delete_type = 'DELETE';
				$new_size = array(0, 0);
				/* Scale image if input scaled */
				if($width != 0 and $height != 0)
				{
					$options = array(
						'upload_dir' => $upload_path_full
					);
					if($width!=0)
					{
						$options['max_width'] = $width;
					}
					if($height!=0)
					{
						$options['max_height'] = $height;
					}
					$options['prop'] = false;
					if(isset($prop) and $prop != null)
					{
						$options['prop'] = $prop;
					}
					$new_size = $this->image_handler->create_scaled_image($data['file_name'], $options);
				}
				// Saving image
				if (IS_AJAX) {   //this is why we put this in the constants to pass only json data
					$this->output->set_content_type('application/json');
					$this->output->set_output(json_encode(array($info)));
					//// this has to be the only the only data returned or you will get an error.
					//// if you don't give this a json array it will give you a Empty file upload result error
					//// it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
				}
				else 
				{   //// so that this will still work if javascript is not enabled
					$file_data['upload_data'] = $this->upload->data();
				}
				
                                /* Create thumbnails */
				$options = array(
					'upload_dir' => $upload_thumb_full,
					'max_width' => 90,
					'max_height' => 65,
					'prop' => true
				);
				$result = $this->image_handler->create_scaled_image($data['file_name'], $options);
				
                                /* Setting width and height variables */
				$upload_data = &$this->upload->data();
				if($width == 0) { $width = $upload_data['image_width'];} else {$width=$new_size[0];}
				if($height == 0) { $height = $upload_data['image_height'];} else {$height=$new_size[1];}
				
                                /* Insert record to database */
				//$this->load->model('media_images_model');
				//$this->media_images_model->create_image($upload_data['file_name'], $upload_data['file_ext'], $upload_data['file_name'], $upload_data['file_name'], $width, $height);
                                $this->load->model('pengumuman_model');
                                $url='files/file/'.$data['file_name'];;
                                $data=$this->pengumuman_model->setDataFile($url);
                                $this->pengumuman_model->add($data);
			}
			$data[$k] = $this->upload->data(); //gradually build up upload->data()
		}
	}
	
	public function do_upload($userfilename='userfile', $width=0, $height=0, $prop = false)
	{
		$upload_path_url = base_url().'files/images/';
		$upload_thumb_url = base_url().'files/images/thumbnails/';
		$upload_path_full = FCPATH.'files/images/';
		$upload_thumb_full = FCPATH.'files/images/thumbnails/';
		$config['upload_path'] = FCPATH.'files/images/';
		$config['allowed_types'] = 'jpg|png|gif';
		//$config['max_size'] = '30000';
		$config['overwrite']     = FALSE;
		
	  	$this->load->library('upload');
		$data = array();

		for ($k = 0; $k < count($_FILES[$userfilename]['name']); $k++) {
			$this->upload->initialize($config); //must reinitialize to get rid of your bug ( i had it as well)
			if (!$this->upload->do_upload($userfilename,$k)) {
				$errors = $this->upload->display_errors();
			}
			else
			{
				$data = $this->upload->data();
				//// set the data for the json array	
				$info->name = $data['file_name'];
				$info->size = $data['file_size'];
				$info->type = $data['file_type'];
				$info->url = $upload_path_url .$data['file_name'];
				$info->thumbnail_url = $upload_thumb_url .$data['file_name']; 
				//I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
				$info->delete_url = base_url().'upload/deleteImage/'.$data['file_name'];
				$info->delete_type = 'DELETE';
				$new_size = array(0, 0);
				/* Scale image if input scaled */
				if($width != 0 and $height != 0)
				{
					$options = array(
						'upload_dir' => $upload_path_full
					);
					if($width!=0)
					{
						$options['max_width'] = $width;
					}
					if($height!=0)
					{
						$options['max_height'] = $height;
					}
					$options['prop'] = false;
					if(isset($prop) and $prop != null)
					{
						$options['prop'] = $prop;
					}
					$new_size = $this->image_handler->create_scaled_image($data['file_name'], $options);
				}
				// Saving image
				if (IS_AJAX) {   //this is why we put this in the constants to pass only json data
					$this->output->set_content_type('application/json');
					$this->output->set_output(json_encode(array($info)));
					//// this has to be the only the only data returned or you will get an error.
					//// if you don't give this a json array it will give you a Empty file upload result error
					//// it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
				}
				else 
				{   //// so that this will still work if javascript is not enabled
					$file_data['upload_data'] = $this->upload->data();
				}
				/* Create thumbnails */
				$options = array(
					'upload_dir' => $upload_thumb_full,
					'max_width' => 64,
					'max_height' => 64,
					'prop' => true
				);
				$result = $this->image_handler->create_scaled_image($data['file_name'], $options);
				/* Setting width and height variables */
				$upload_data = &$this->upload->data();
				if($width == 0) { $width = $upload_data['image_width'];} else {$width=$new_size[0];}
				if($height == 0) { $height = $upload_data['image_height'];} else {$height=$new_size[1];}
				/* Insert record to database */
				$this->load->model('media_images_model');
				$this->media_images_model->create_image($upload_data['file_name'], $upload_data['file_ext'], $upload_data['file_name'], $upload_data['file_name'], $width, $height);
			}
			$data[$k] = $this->upload->data(); //gradually build up upload->data()
		}
	}
	
	public function deleteImage($filename)
	{
		$this->image_handler->deleteImage($filename);
	}
}
/* End of Upload Controller */
/* 31 Juli 2012 [09:57 AM] */