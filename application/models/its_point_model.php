<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Its_point_model extends Base_lang_model {
        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
                    $this->table_name 		= "its_point";
                    $this->primary_key 		= "id";
        }
        
        public function setDataID(){
            $data=array(
            'title'=>$this->input->post('title'),
            'link'=> $this->input->post('link'),
            'cover_image'=>$this->input->post('media_id'));
            return $data;
        }
        
        public function updtIDEN($id){
            $title=$this->input->post('title');
            $link=$this->input->post('link');
            $cover_image=$this->input->post('media_id');
            $this->update($id,$title,$link,$cover_image);
        }

        function get_all($limit=null, $firstChar=null)
		{
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('p.id as id, p.title as title, p.link as link, cover_image, m.link_thumb as link_thumb, m.link as file_image');
            $used->from('its_point p');
            $used->join('media_images m', 'm.id_images=cover_image');
			if($firstChar != null){
				$used->where("LEFT(title, 1) = '$firstChar'");
			}
            $used->order_by('id','desc');
			if($limit!=null) $used->limit($limit);

            $query = $used->get();
            return $query->result();
		}

        function get_id($id)
        {
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('p.id as id, p.title as title, p.link as link, cover_image, m.link_thumb as link_thumb, m.link as file_image');
            $used->from('its_point p');
            $used->join('media_images m', 'm.id_images=cover_image');
            $used->where('id', $id);

            $query = $used->get();
            return $query->result();
        }
        
        function add($data){
            $used = $this->load->database('its', TRUE);
            $used->insert('its_point',$data);
            return;
        }

        function delete($id){
            $used = $this->load->database('its', TRUE);
            $used->where('id', $id);
            $used->delete('its_point');
        }

        function update($id,$title,$link,$cover_image){
            $used = $this->load->database('its', TRUE);
            $sql = "UPDATE its_point SET title='$title', link='$link', cover_image='$cover_image'
                    where id='$id'";
            $used->query($sql);
        }

}

/* End of Page Model */
/* 26 Juli 2012 [12:13 PM] */
?>