<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_map_model extends CI_Model {
        function get_all()
	{
                $used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('idFak, lang, namaFak as namaFakultas, alamat, telp, fax, email, website, dean, about ');
		$used->from('fakultas');
		$used->order_by('namaFak','asc');

		$query = $used->get();
		return $query->result();
	}

        function get_lang($lang)
	{
                $used = $this->load->database('its', TRUE);
		$used->distinct();
		$used->select('idFak, lang, namaFak as namaFakultas, alamat, telp, fax, email, website, dean, about ');
		$used->from('fakultas');
                $used->where('lang', $lang);
		$used->order_by('namaFak','asc');

		$query = $used->get();
		return $query->result();
	}

        function get_id($id)
        {
            $used = $this->load->database('its', TRUE);
            $used->distinct();
            $used->select('idFak, namaFak as namaFakultas, alamat, telp, fax, email, website, dean, about ');
            $used->from('fakultas');
            $used->where('idFak', $id);

            $query = $used->get();
            return $query->result();
        }

}

/* End of Page Model */
/* 26 Juli 2012 [12:13 PM] */
?>