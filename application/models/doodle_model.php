<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doodle_model extends Base_lang_model {
        
        public function setDataID(){
            $data=array(
             'name' => $this->input->post('name'),
             'date_start' => strtotime($this->input->post('date_start')),
             'date_end' => strtotime($this->input->post('date_end')),
             'media_id' => $this->input->post('media_id')
            );
            return $data;
        }
        
        
        public function updtIDEN($id){
            $name=$this->input->post('name');
            $date1=strtotime($this->input->post('date_start'));
            $date2=strtotime($this->input->post('date_end'));
            $media=$this->input->post('media_id');
            $this->update($id,$name,$date1,$date2,$media);
        }
    
	function get_all()
	{
                $used = $this->load->database('its', TRUE);
                
                $used->distinct();
                $used->select('d.id as id, d.name as name, d.date_start as date_start, d.date_end as date_end, m.link_thumb as link_thumb, CURDATE() as now, m.link as link');
                $used->from('doodle d');
                $used->join('media_images m', 'm.id_images=d.media_id');

		$query = $used->get();
		return $query->result();
	}
        
        function get_id($id)
        {
            $used = $this->load->database('its', TRUE);
                
                $used->distinct();
                $used->select('d.id as id, d.name as name, d.media_id as media_id, d.date_start as date_start, d.date_end as date_end, m.link_thumb as link_thumb');
                $used->from('doodle d');
                $used->join('media_images m', 'm.id_images=d.media_id');
                $used->where('d.id', $id);

		$query = $used->get();
		return $query->result();
        }

        function add($data){
            $used = $this->load->database('its', TRUE);
            $used->insert('doodle',$data);
            return;
        }

        function delete($id){
            $used = $this->load->database('its', TRUE);
            $used->where('id', $id);
            $used->delete('doodle');
        }

        function update($id,$name,$date1,$date2,$media){
            $used = $this->load->database('its', TRUE);
            $sql = "UPDATE doodle SET name='$name', date_start='$date1', date_end='$date2', media_id='$media' where id='$id'";
            $used->query($sql);
        }

}

/* End of Page Model */
/* 26 Juli 2012 [12:13 PM] */
?>