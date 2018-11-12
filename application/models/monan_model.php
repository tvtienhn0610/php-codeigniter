<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class monan_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getAllDataDmma(){
		$this->db->select('*');
		$dulieu = $this->db->get('tbl_danhmucmonan');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function insertDmma($tendmma){
		$dl = array(
			'name_dmma' => $tendmma
			 );
		return $this->db->insert('tbl_danhmucmonan',$dl);
	}

	public function updateDataDmma($id,$tendmma){
		$dulieu = array(
			'id' => $id,
			'name_dmma' => $tendmma 
		);
		$this->db->where('id', $id);
		return $this->db->update('tbl_danhmucmonan', $dulieu);
	}

	public function deleteDataDmma($id){
		$this->db->where('id', $id);
		$dulieu = $this->db->delete('tbl_danhmucmonan');
		return $dulieu;
	}

	//quan ly mon ăn

	public function getAllDatamonan(){
		$this->db->select('*');
		
		$this->db->from('tbl_danhmucmonan');

		$this->db->join('tbl_monan', 'tbl_monan.id_dmma = tbl_danhmucmonan.id', 'left');

		$dulieu = $this->db->get('');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	//lay cac mon an sang

	public function getAllDatamonanBf(){
		$this->db->select('*');
		
		$this->db->from('tbl_danhmucmonan');

		$this->db->join('tbl_monan', 'tbl_monan.id_dmma = tbl_danhmucmonan.id', 'left');
		$this->db->where('tbl_danhmucmonan.name_dmma', 'Breakfast');

		$dulieu = $this->db->get('');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function getAllDatamonanLu(){
		$this->db->select('*');
		
		$this->db->from('tbl_danhmucmonan');

		$this->db->join('tbl_monan', 'tbl_monan.id_dmma = tbl_danhmucmonan.id', 'left');
		$this->db->where('tbl_danhmucmonan.name_dmma', 'Lunch');

		$dulieu = $this->db->get('');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function getAllDatamonanDi(){
		$this->db->select('*');
		
		$this->db->from('tbl_danhmucmonan');

		$this->db->join('tbl_monan', 'tbl_monan.id_dmma = tbl_danhmucmonan.id', 'left');
		$this->db->where('tbl_danhmucmonan.name_dmma', 'Dinner');

		$dulieu = $this->db->get('');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function getAllDatamonanSp(){
		$this->db->select('*');
		
		$this->db->from('tbl_danhmucmonan');

		$this->db->join('tbl_monan', 'tbl_monan.id_dmma = tbl_danhmucmonan.id', 'left');
		$this->db->where('tbl_danhmucmonan.name_dmma', 'Special');

		$dulieu = $this->db->get('');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}


	


	public function insertDatamonan($avata_monan,$tieude_monan,$gia_monan,$mota_monan,$new_monan,$id_dmma){
		$dulieu = array('avata_monan' => $avata_monan,
						'tieude_monan' =>$tieude_monan ,
						'gia_monan' => $gia_monan,
						'mota_monan' =>$mota_monan ,
						'new_monan' => $new_monan,
						'id_dmma' => $id_dmma
						 );

		$ketqua = $this->db->insert('tbl_monan', $dulieu);
		return $ketqua;
	}

	public function deleteDataMa($id){
		$this->db->where('id', $id);
		$ketqua = $this->db->delete('tbl_monan');
		return $ketqua;
	}

	public function getDataMaByID($id){
		$this->db->select('*');
		
		$this->db->from('tbl_danhmucmonan');

		$this->db->join('tbl_monan', 'tbl_monan.id_dmma = tbl_danhmucmonan.id', 'left');
		$this->db->where('tbl_monan.id', $id);

		$dulieu = $this->db->get();
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function updateDataMa($id,$avata_monan,$tieude_monan,$gia_monan,$mota_monan,$new_monan ,$id_dmma){
	$dulieu = array(	'id'   => $id,
						'avata_monan' => $avata_monan,
						'tieude_monan' =>$tieude_monan ,
						'gia_monan' => $gia_monan,
						'mota_monan' =>$mota_monan ,
						'new_monan' => $new_monan,
						'id_dmma' => $id_dmma );

		$this->db->where('id', $id);
		$ketqua = $this->db->update('tbl_monan', $dulieu);
		return $ketqua;
	}


}

/* End of file monan_model.php */
/* Location: ./application/models/monan_model.php */