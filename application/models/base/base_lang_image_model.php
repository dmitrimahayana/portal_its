<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Base_lang_image_model extends Base_lang_model {
	var $image_table_name 	= "media_images";
	var $image_column 		= null;
	var $image_key 			= "id_images";
	var $date_start 		= "date_start";
	var $date_end 			= "date_end";
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function get_all($lang = null, $online = null, $differ = null)
	{
		$this->used->select("$this->table_name.*, $this->lang_table_name.*, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
		$this->used->from($this->table_name);
		$this->used->join($this->lang_table_name,"$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key");
		if($differ == null)
		{
			// Standar
			$this->used->join($this->image_table_name,"$this->table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join($this->image_table_name,"$this->lang_table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		if($online != null)
		{
			$this->used->where("$this->table_name.online",1);
		}
		if($lang != null)
		{
			$this->used->where("$this->lang_table_name.lang",$lang);
		}
		$this->used->order_by($this->lang_name, 'asc');
		$query = $this->used->get();
		
		//echo $this->used->last_query();
		return $query->result();
	}
	
	/**
	 * 	$unique_key diisi dengan value dari kolom unique key 
	 * 	$lang diisi bahasa yang digunakan
	 * 	$date diisi null jika tanggal tidak digunakan sebagai batasan dan diisi dengan 1 bila digunakan
	 */
	function get_object_lang_by_code($unique_key, $lang, $date = null, $differ = null)
	{
		$this->used->select("$this->table_name.*, $this->lang_table_name.*, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
		$this->used->from($this->table_name);
		$this->used->join($this->lang_table_name,"$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key");
		if($differ == null)
		{
			// Standar
			$this->used->join($this->image_table_name,"$this->table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join($this->image_table_name,"$this->lang_table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		$this->used->where("$this->table_name.$this->unique_key",$unique_key);
		$this->used->where("$this->lang_table_name.lang",$lang);
		if($date!=null)
		{
			$date_now = now();
			$this->used->where("$this->table_name.$this->date_start <=", $date_now);
			$this->used->where("$this->table_name.$this->date_end >=", $date_now);
		}		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			return $result[0];
		}
		else return null;
	}
	
	function get_object_lang($id, $lang, $date = null, $differ = null)
	{
		$this->used->select("$this->table_name.*, $this->lang_table_name.*, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
		$this->used->from($this->table_name);
		$this->used->join($this->lang_table_name, "$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key", 'left');
		if($differ == null)
		{
			// Standar
			$this->used->join($this->image_table_name,"$this->table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join($this->image_table_name,"$this->lang_table_name.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		if($id != null)
		{
			$this->used->where("$this->table_name.$this->primary_key", $id);
		}
		if($lang != null)
		{
			$this->used->where("$this->lang_table_name.lang", $lang);
		}
		if($date!=null)
		{
			$date_now = now();
			$this->used->where("$this->table_name.$this->date_start <=", $date_now);
			$this->used->where("$this->table_name.$this->date_end >=", $date_now);
		}
		$query = $this->used->get();
		$result = $query->result();
		if($id != null)
		{
			if($result != null)
			{
				return $result[0];
			}
			else return null;
		}
		else return $result;
	}
	
	function get_lang_name($id, $lang)
	{
		$this->used->select("$this->lang_table_name.$this->lang_name");
		$this->used->from($this->table_name);
		$this->used->join($this->lang_table_name, "$this->table_name.$this->primary_key=$this->lang_table_name.$this->primary_key", 'left');
		$this->used->where("$this->table_name.$this->primary_key", $id);
		$this->used->where("$this->lang_table_name.lang", $lang);
		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			$lang_name = $this->lang_name;
			return $result[0]->$lang_name;
		}
		else return null;
	}
	
	/**
	 * Berguna untuk menampilkan data dengan prinsip pagination
	 * Secara default media dihubungkan dengan tabel utama sehingga tidak ada perbedaan gambar pada bahasa yang berbeda
	 *
	 * $offset diisi dengan posisi offset untuk pagination
	 * $num diisi dengan jumlah data yang ditampilkan setiap pagination
	 * $filter diisi dengan kata-kata yang digunakan untuk menyaring isi yang ditampilkan
	 * $differ diisi dengan 1 bila media gambar diberikan per bahasa, selain itu diisi dengan null
	 */
	function get_some($offset, $num, $filter=null, $differ=null)
	{
		$this->used->distinct();
		if($this->lang_content != null)
		{
			if($differ == null)
			{
				// Standar
				$this->used->select("t.*, l_id.$this->lang_name as title_id, l_en.$this->lang_name as title_en, l_id.$this->lang_content as content_id, l_en.$this->lang_content as content_en, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
			}
			else
			{
				// Pada bahasa yang berbeda, media yang digunakan berbeda
				$this->used->select("t.*, l_id.$this->lang_name as title_id, l_en.$this->lang_name as title_en, l_id.$this->lang_content as content_id, l_en.$this->lang_content as content_en, mi_id.link as link_id, mi_en.link as link_en, mi_id.link_thumb as link_thumb_id, mi_en.link_thumb as link_thumb_en, mi_id.image_name as image_name_id, mi_en.image_name as image_name_en, mi_id.width as width_id, mi_en.width as width_en, mi_id.height as height_id, mi_en.height as height_en, mi_id.ext as ext_id, mi_en.ext as ext_en");
			}
		}
		else if($this->lang_name != null)
		{
			if($differ == null)
			{
				$this->used->select("t.*, l_id.$this->lang_name as title_id, l_en.$this->lang_name as title_en, $this->image_table_name.link as link_image, image_name, link_thumb, ext, height, width");
			}
			else
			{
				// Pada bahasa yang berbeda, media yang digunakan berbeda
				$this->used->select("t.*, l_id.$this->lang_name as title_id, l_en.$this->lang_name as title_en, mi_id.link as link_id, mi_en.link as link_en, mi_id.link_thumb as link_thumb_id, mi_en.link_thumb as link_thumb_en, mi_id.image_name as image_name_id, mi_en.image_name as image_name_en, mi_id.width as width_id, mi_en.width as width_en, mi_id.height as height_id, mi_en.height as height_en, mi_id.ext as ext_id, mi_en.ext as ext_en");
			}
		}
		$this->used->from("$this->table_name t");
		$this->used->join("$this->lang_table_name l_id","t.$this->primary_key=l_id.$this->primary_key and l_id.lang='id'");
		$this->used->join("$this->lang_table_name l_en","t.$this->primary_key=l_en.$this->primary_key and l_en.lang='en'");
		if($differ == null)
		{
			// Join standar
			$this->used->join($this->image_table_name,"t.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join("$this->image_table_name mi_id","l_id.$this->image_column=mi_id.$this->image_key", 'left');
			$this->used->join("$this->image_table_name mi_en","l_en.$this->image_column=mi_en.$this->image_key", 'left');
		}
		$this->used->limit($num, $offset);
		if($filter!=null)
		{
			$this->used->like($this->unique_key, $filter);
			if($this->lang_name != null)
			{
				$this->used->or_like("l_id.$this->lang_name", $filter);
				$this->used->or_like("l_en.$this->lang_name", $filter);
			}
			if($this->lang_content != null)
			{
				$this->used->or_like("l_id.$this->lang_content", $filter);
				$this->used->or_like("l_en.$this->lang_content", $filter);
			}
		}
		$this->used->order_by($this->unique_key, 'asc');
		$query = $this->used->get();
		return $query->result();
	}
	
	function count_all($filter = null, $differ = null)
	{
		$this->used->select('COUNT(*) as total ');		
		$this->used->from("$this->table_name t");
		$this->used->join("$this->lang_table_name l_id","t.$this->primary_key=l_id.$this->primary_key and l_id.lang='id'");
		$this->used->join("$this->lang_table_name l_en","t.$this->primary_key=l_en.$this->primary_key and l_en.lang='en'");
		if($differ == null)
		{
			// Join standar
			$this->used->join($this->image_table_name,"t.$this->image_column=$this->image_table_name.$this->image_key", 'left');
		}
		else
		{
			// Pada bahasa yang berbeda, media yang digunakan berbeda
			$this->used->join("$this->image_table_name mi_id","l_id.$this->image_column=mi_id.$this->image_key", 'left');
			$this->used->join("$this->image_table_name mi_en","l_en.$this->image_column=mi_en.$this->image_key", 'left');
		}
		if($filter!=null)
		{
			$this->used->like($this->unique_key, $filter);
			if($this->lang_name != null)
			{
				$this->used->or_like("l_id.$this->lang_name", $filter);
				$this->used->or_like("l_en.$this->lang_name", $filter);
			}
			if($this->lang_content != null)
			{
				$this->used->or_like("l_id.$this->lang_content", $filter);
				$this->used->or_like("l_en.$this->lang_content", $filter);
			}
		}		
		$query = $this->used->get();
		$result = $query->result();
		if($result != null)
		{
			$total = $result[0]->total;
			return $total;
		}
		else return 0;
	}
}
/* End of Base Lang Model */
/* 23 Juli 2012 [11:22 PM] */
?>