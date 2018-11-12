<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllData()
	{
		$this->db->select('*');
		$this->db->where('tenthuoctinh', 'slides_topbanner');
		$dulieu = $this->db->get('homepageattr');
		$dulieu = $dulieu->result_array();

		foreach ($dulieu as  $value) {
			$kq = $value['giatrithuoctinh'];
		};
		return $kq;
		
	}

	public function updateData($dulieu)
	{
		$this->db->where('tenthuoctinh','slides_topbanner');
		$dulieu = array(
			'tenthuoctinh' => 'slides_topbanner', 
			'giatrithuoctinh' => $dulieu
		);

		return $this->db->update('homepageattr', $dulieu);
	}

}

/* End of file Slide_model.php */
/* Location: ./application/models/Slide_model.php */