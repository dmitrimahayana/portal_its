<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Footer_jurusan_model extends Base_lang_model {
        
        public function setDataID(){
            $data=array(
            'jurusan'=>$this->input->post('jurusan'),
            'kurikulum'=>$this->input->post('kurikulumID'),
            'laboratorium'=>$this->input->post('laboratoriumID'),
            'dosen'=>$this->input->post('dosenID'),
            'publikasi'=> $this->input->post('publikasiID'),
            'penghargaan'=>$this->input->post('penghargaanID'),
            'kerjasama'=>$this->input->post('kerjasamaID'));
            return $data;
        }
        
        public function setDataEN(){
            //$newJur=$this->input->post('jurusan')-1;
            $data=array(
            'jurusan'=>$this->input->post('jurusan')+1,
            'kurikulum'=>$this->input->post('kurikulumEN'),
            'laboratorium'=>$this->input->post('laboratoriumEN'),
            'dosen'=>$this->input->post('dosenEN'),
            'publikasi'=> $this->input->post('publikasiEN'),
            'penghargaan'=>$this->input->post('penghargaanEN'),
            'kerjasama'=>$this->input->post('kerjasamaEN'));
            return $data;
        }
        
        public function updtID($id){
            $id=$this->input->post('id');
            $jurusan=$this->input->post('jurusan');
            $kurikulum=$this->input->post('kurikulumID');
            $laboratorium=$this->input->post('laboratoriumID');
            $dosen=$this->input->post('dosenID');
            $publikasi=$this->input->post('publikasiID');
            $penghargaan=$this->input->post('penghargaanID');
            $kerjasama=$this->input->post('kerjasamaID');
            $this->update($id,$jurusan,$kurikulum,$laboratorium,$dosen,$publikasi,$penghargaan,$kerjasama);
        }
        
        public function updtEN($id){
            $id=$this->input->post('id')+1;
            $jurusan=$this->input->post('jurusan')+1;
            $kurikulum=$this->input->post('kurikulumEN');
            $laboratorium=$this->input->post('laboratoriumEN');
            $dosen=$this->input->post('dosenEN');
            $publikasi=$this->input->post('publikasiEN');
            $penghargaan=$this->input->post('penghargaanEN');
            $kerjasama=$this->input->post('kerjasamaEN');
            $this->update($id,$jurusan,$kurikulum,$laboratorium,$dosen,$publikasi,$penghargaan,$kerjasama);
        }
    
	function get_all()
	{
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('id, jurusan, j.namaJur as namaJur, kurikulum, laboratorium, dosen, publikasi, penghargaan, kerjasama');
            $used->from('footer_jurusan ');
            $used->join('jurusan j', 'j.idJur=footer_jurusan.jurusan');
            $used->order_by('j.namaJur','asc');

            $query = $used->get();
            return $query->result();
	}

        function get_someID($jurusan)
	{
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('id, jurusan, j.namaJur as namaJur, kurikulum, laboratorium, dosen,  publikasi, penghargaan, kerjasama');
            $used->from('footer_jurusan ');
            $used->join('jurusan j', 'j.idJur=footer_jurusan.jurusan');
            $used->where('jurusan',$jurusan);

            $query = $used->get();
            return $query->result();
	}

        function get_id($id)
        {
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('id, jurusan, j.namaJur as namaJur, kurikulum, laboratorium, dosen,  publikasi, penghargaan, kerjasama');
            $used->from('footer_jurusan ');
            $used->join('jurusan j', 'j.idJur=footer_jurusan.jurusan');
            $used->where('id',$id);

            $query = $used->get();
            return $query->result();
        }

        function add($data){
            $used = $this->load->database('its', TRUE);
            $used->insert('footer_jurusan',$data);
            return;
        }

        function delete($id){
            $used = $this->load->database('its', TRUE);
            $used->where('id', $id);
            $used->delete('footer_jurusan');
        }

        function update($id,$jurusan,$kurikulum,$laboratorium,$dosen,$publikasi,$penghargaan,$kerjasama){
            $used = $this->load->database('its', TRUE);
            $sql = "UPDATE footer_jurusan SET jurusan='$jurusan', kurikulum='$kurikulum', laboratorium='$laboratorium', dosen='$dosen',publikasi='$publikasi', penghargaan='$penghargaan', kerjasama='$kerjasama' where id='$id'";
            $used->query($sql);
        }

}

/* End of Page Model */
/* 26 Juli 2012 [12:13 PM] */
?>