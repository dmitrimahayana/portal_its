<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class View_fakultas_model extends Base_lang_model {
        function __construct()
        {
            // Call the Model constructor
            parent::__construct();
                    $this->table_name 		= "fakultas";
                    $this->primary_key 		= "idFak";
                    $this->unique_key 		= "email";
        }
        
        public function setDataID(){
            $data=array(
            'lang'=>'id',
            'namaFak'=>$this->input->post('namaFakID'),
            'singkatan'=>$this->input->post('singkatan'),
            'alamat'=>$this->input->post('alamatID'),
            'telp'=>$this->input->post('telp'),
            'fax'=>$this->input->post('fax'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'about'=>$this->input->post('aboutID'),
            'dean'=>$this->input->post('dean'),
            'mediaImages'=> $this->input->post('media_id'));
            return $data;
        }
        
        public function setDataEN(){
            $data2=array(
            'lang'=>'en',
            'namaFak'=>$this->input->post('namaFakEN'),
            'singkatan'=>$this->input->post('singkatan'),
            'alamat'=>$this->input->post('alamatEN'),
            'telp'=>$this->input->post('telp'),
            'fax'=>$this->input->post('fax'),
            'email'=>$this->input->post('email'),
            'website'=>$this->input->post('website'),
            'about'=>$this->input->post('aboutEN'),
            'dean'=>$this->input->post('dean'),
            'mediaImages'=> $this->input->post('media_id'));
            return $data2;
        }
        
        public function updtIDEN($id){
            $no_urut=$this->input->post('no_urut');
            $namaFakID=$this->input->post('namaFakID');
            $namaFakEN=$this->input->post('namaFakEN');
            $singkatan=$this->input->post('singkatan');
            $alamatID=$this->input->post('alamatID');
            $alamatEN=$this->input->post('alamatEN');
            $telp=$this->input->post('telp');
            $fax=$this->input->post('fax');
            $email=$this->input->post('email');
            $website=$this->input->post('website');
            $aboutID=$this->input->post('aboutID');
            $aboutEN=$this->input->post('aboutEN');
            $dean=$this->input->post('dean');
            $mediaImages=$this->input->post('media_id');
            $this->update($id,$no_urut,$namaFakID,$singkatan,$alamatID,$telp,$fax,$email,$website,$dean,$aboutID,$mediaImages);
            $this->update($id+1,$no_urut,$namaFakEN,$singkatan,$alamatEN,$telp,$fax,$email,$website,$dean,$aboutEN,$mediaImages);
        }
    
	function get_all()
	{
                $used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('idFak, no_urut, namaFak as namaFakultas,singkatan, alamat, telp, fax, email, website, dean, about, mediaImages, m.link_thumb as link_thumb');
		$used->from('fakultas');
                $used->join('media_images m', 'm.id_images=mediaImages');
                $used->where('lang', 'id');
		$used->order_by('no_urut','asc');

		$query = $used->get();
		return $query->result();
	}

        function get_lang($lang)
	{
                $used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('idFak, no_urut, lang, namaFak as namaFakultas, singkatan, alamat, telp, fax, email, website, dean, about, mediaImages');
		$used->from('fakultas');
                $used->where('lang', $lang);
		$used->order_by('no_urut','asc');

		$query = $used->get();
		return $query->result();
	}

        function get_someLang($lang, $id)
	{
                $used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('idFak, no_urut, lang, namaFak as namaFakultas, singkatan, alamat, telp, fax, email, website, dean, about, mediaImages');
		$used->from('fakultas');
                $used->where('idFak',$id);
		$used->order_by('no_urut','asc');

		$query = $used->get();
		return $query->result();
	}

        function get_id($id)
        {
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('idFak, no_urut, namaFak as namaFakultas, singkatan, alamat, telp, fax, email, website, dean, about, mediaImages');
            $used->from('fakultas');
            $used->where('idFak', $id);

            $query = $used->get();
            return $query->result();
        }

        function getImages($id){
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('f.idFak as idFak, m.image_name as image_name, m.id_images as id_images');
            $used->from('fakultas f');
            $used->join('media_images m', 'm.id_images=f.mediaImages');
            $used->where('f.idFak', $id);

            $query = $used->get();
            return $query->result();
        }

        function add($data){
            $used = $this->load->database('its', TRUE);
            $used->insert('fakultas',$data);
            return;
        }

        function delete($id){
            $used = $this->load->database('its', TRUE);
            $used->where('idFak', $id);
            $used->delete('fakultas');
        }

        function update($id,$no_urut,$nama,$singkatan,$alamat,$telp,$fax,$email,$website,$dean,$about,$mediaImages){
            //echo "hallo";
            $used = $this->load->database('its', TRUE);
            $sql = "UPDATE fakultas SET no_urut='$no_urut', namaFak='$nama', singkatan='$singkatan', alamat='$alamat', telp='$telp', fax='$fax', email='$email', website='$website', dean='$dean', about='$about', mediaImages='$mediaImages' where idFak='$id'";
            $used->query($sql);
        }

}

/* End of Page Model */
/* 26 Juli 2012 [12:13 PM] */
?>