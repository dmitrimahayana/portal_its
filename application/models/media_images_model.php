<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Media_images_model extends Base_its_model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->table_name = 'media_images';
		$this->primary_key = 'id_images';
		$this->unique_key = 'image_name';
    }
	
	function create_image($name, $ext, $link, $link_thumb, $width, $height)
	{
		$used = $this->load->database('its', TRUE);
		$used->trans_begin();
		$data = array
		(
			$this->unique_key => $name,
			'ext' => $ext,
			'width' => $width,
			'height' => $height,
			'link' => 'images/'.$link,
			'link_thumb' => 'images/thumbnails/'.$link_thumb
		);
		$used->insert($this->table_name, $data);
		if ($used->trans_status() === FALSE)
		{
			$used->trans_rollback();
			return false;
		}
		else
		{
			$used->trans_commit();
			return true;
		}
	}
	
	function delete_image($name)
	{
		$used = $this->load->database('its', TRUE);
		$used->trans_begin();
		$used->where($this->unique_key, $name);
		$used->delete($this->table_name);
		if ($used->trans_status() === FALSE)
		{
			$used->trans_rollback();
			return false;
		}
		else
		{
			$used->trans_commit();
			return true;
		}
	}
	
	public function delete($id)
	{
		$this->load->library('image_handler');
		$key = $this->unique_key;
		$name = $this->get_by_id($id)->$key;
		return $this->image_handler->deleteImage($name);
	}
}
/* End of Media Image Model.php */
/* 24 Juli 2012 [02:43 PM] */