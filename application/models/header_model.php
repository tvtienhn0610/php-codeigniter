<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class header_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllDataHeader(){
		$this->db->select('*');
		$this->db->where('tenthuoctinh', 'dataheader');
		$dulieu = $this->db->get('homepageattr');
		$dulieu = $dulieu->result_array();

		foreach ($dulieu as  $value) {
			$kq = $value['giatrithuoctinh'];
		};
		return $kq;
	}

	public function updateDataHeader($dlHeader){
		$this->db->where('tenthuoctinh', 'dataheader');
		$dl = array(
			'tenthuoctinh' => 'dataheader',
			'giatrithuoctinh' => $dlHeader );
		return $this->db->update('homepageattr', $dl);
	}
	//quan ly menu header

	public function getAllDataMenuHeader(){
		$this->db->select('*');
		$this->db->where('tenthuoctinh', 'menu_home');
		$dulieu = $this->db->get('homepageattr');
		$dulieu = $dulieu->result_array();

		foreach ($dulieu as  $value) {
			$kq = $value['giatrithuoctinh'];
		};
		return $kq;
	}

	public function updateDataMenuHeader($dlMenu){
		$this->db->where('tenthuoctinh', 'menu_home');
		$dl = array(
			'tenthuoctinh' => 'menu_home',
			'giatrithuoctinh' => $dlMenu );
		return $this->db->update('homepageattr', $dl);
	}


}

/* End of file header_model.php */
/* Location: ./application/models/header_model.php */