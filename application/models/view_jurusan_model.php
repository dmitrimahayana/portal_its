<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class View_jurusan_model extends Base_lang_model {
        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
                    $this->table_name 		= "jurusan";
                    $this->primary_key 		= "idJur";
                    $this->unique_key 		= "email";
        }
        
        public function setDataID(){
            $data=array(
            'no_urut'=>$this->input->post('no_urut'),
            'lang'=>'id',
            'namaJur'=>$this->input->post('namaJurID'),
            'fakultas'=>$this->input->post('fakultasID'),
            'alamat'=>$this->input->post('alamatID'),
            'telp'=>$this->input->post('telp'),
            'fax'=>$this->input->post('fax'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'about'=>$this->input->post('aboutID'),
            'headOfDept'=>$this->input->post('headOfDept'),
            'mediaImages'=> $this->input->post('media_id'),
            'latitude'=> $this->input->post('latitude'),
            'longitude'=> $this->input->post('longitude'));
            return $data;
        }
        
        public function setDataEN(){
            $data2=array(
            'no_urut'=>$this->input->post('no_urut'),
            'lang'=>'en',
            'namaJur'=>$this->input->post('namaJurEN'),
            'fakultas'=>$this->input->post('fakultasEN'),
            'alamat'=>$this->input->post('alamatEN'),
            'telp'=>$this->input->post('telp'),
            'fax'=>$this->input->post('fax'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'about'=>$this->input->post('aboutEN'),
            'headOfDept'=>$this->input->post('headOfDept'),
            'mediaImages'=> $this->input->post('media_id'),
            'latitude'=> $this->input->post('latitude'),
            'longitude'=> $this->input->post('longitude'));
            return $data2;
        }
        
        public function updtIDEN($id){
            $no_urut=$this->input->post('no_urut');
            $namaJurID=$this->input->post('namaJurID');
            $namaJurEN=$this->input->post('namaJurEN');
            $fakultasID=$this->input->post('fakultasID');
            $fakultasEN=$this->input->post('fakultasEN');
            $alamatID=$this->input->post('alamatID');
            $alamatEN=$this->input->post('alamatEN');
            $telp=$this->input->post('telp');
            $fax=$this->input->post('fax');
            $email=$this->input->post('email');
            $website=$this->input->post('website');
            $aboutID=$this->input->post('aboutID');
            $aboutEN=$this->input->post('aboutEN');
            $headOfDept=$this->input->post('headOfDept');
            $mediaImages=$this->input->post('media_id');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');
            $this->update($id,$no_urut,$namaJurID,$fakultasID,$alamatID,$telp,$fax,$email,$website,$headOfDept,$aboutID,$mediaImages,$latitude,$longitude);
            $this->update($id+1,$no_urut,$namaJurEN,$fakultasEN,$alamatEN,$telp,$fax,$email,$website,$headOfDept,$aboutEN,$mediaImages,$latitude,$longitude);
        }

        function get_all()
	{
                $used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('idJur, no_urut, namaJur as namaJurusan, fakultas, alamat, telp, fax, email, website, headOfDept, about, mediaImages, m.link_thumb as link_thumb, latitude, longitude');
		$used->from('jurusan');
                $used->join('media_images m', 'm.id_images=mediaImages');
                $used->where('lang', 'id');
		$used->order_by('fakultas','asc');

		$query = $used->get();
		return $query->result();
	}

        function get_some($fakultas){
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('idJur, no_urut, namaJur as namaJurusan, fakultas, alamat, telp, fax, email, website, headOfDept, about, mediaImages, latitude, longitude');
            $used->from('jurusan');
            $used->where('fakultas', $fakultas);
            $used->order_by('no_urut','asc');

            $query = $used->get();
            return $query->result();
        }

        function get_id($id)
        {
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('idJur, no_urut,lang, namaJur as namaJurusan, fakultas, alamat, telp, fax, email, website, headOfDept, about, mediaImages, latitude, longitude');
            $used->from('jurusan');
            $used->where('idJur', $id);

            $query = $used->get();
            return $query->result();
        }

        function getImages($id){
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('j.idJur as idJur, m.image_name as image_name, m.id_images as id_images');
            $used->from('jurusan as j');
            $used->join('media_images m', 'm.id_images=j.mediaImages');
            $used->where('j.idJur', $id);

            $query = $used->get();
            return $query->result();
        }

        function add($data){
            $used = $this->load->database('its', TRUE);
            $used->insert('jurusan',$data);
            return;
        }

        function delete($id){
            $used = $this->load->database('its', TRUE);
            $used->where('idJur', $id);
            $used->delete('jurusan');
        }

        function update($id,$no_urut,$namaJur,$namaFak,$alamat,$telp,$fax,$email,$website,$headOfDept,$about,$mediaImages,$latitude,$longitude){
            $used = $this->load->database('its', TRUE);
            $sql = "UPDATE jurusan SET no_urut='$no_urut', namaJur='$namaJur', 
                fakultas='$namaFak', alamat='$alamat', telp='$telp', fax='$fax', 
                email='$email', website='$website', headOfDept='$headOfDept', 
                about='$about', mediaImages='$mediaImages', latitude='$latitude', longitude='$longitude' 
                    where idJur='$id'";
            $used->query($sql);
        }

}

/* End of Page Model */
/* 26 Juli 2012 [12:13 PM] */
?>