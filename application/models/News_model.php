<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends CI_Model {

	public $variable;


	public function __construct()
	{
		parent::__construct();
		
	}

	public function insertDmNews($tendm)
	{
		$dl = array('name_dm' => $tendm );
		return $this->db->insert('tbl_danhmucnews', $dl);
	}

	public function getAllDataDm()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('tbl_danhmucnews');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function getDataById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$dulieu = $this->db->get('tbl_danhmucnews');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function updateDataDm($id,$name_dm)
	{	
		$dulieu = array(
			'id' => $id,
			'name_dm' => $name_dm 
		);
		$this->db->where('id', $id);
		return $this->db->update('tbl_danhmucnews', $dulieu);
	}

	//tim kiem cac tin thuoc danh muc can xoa

	public function getDataNewsByID_Dm($id){
		$dulieu = array(
			'id' => $id,
			'id_dm' => '60'
		);
		$this->db->where('id_dm', $id);
		return $this->db->update('tbl_news', $dulieu);
	}

	public function deleteDataDm($id)
	{
		$this->db->where('id', $id);
		$dulieu = $this->db->delete('tbl_danhmucnews');
		return $dulieu;
	}

	//tin tuc

	public function getAllDatanews()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('tbl_news');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	public function insertDataNews($tieude , $id_dm , $noidung , $avata_news ,$trichdan)
	{
		$dl = array(
			'tieude' => $tieude,
			'id_dm' => $id_dm,
			'noidung' => $noidung,
			'avata_news' => $avata_news,
			'trichdan' => $trichdan
		 );
		return $this->db->insert('tbl_news', $dl);
	}
	//lay thong tin bai viet theo id

	public function getDataNewsByID($id){
		$this->db->select('*');
		
		$this->db->from('tbl_danhmucnews');

		$this->db->join('tbl_news', 'tbl_news.id_dm = tbl_danhmucnews.id', 'left');
		$this->db->where('tbl_news.id', $id);

		$dulieu = $this->db->get();
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

	//lay ten cac danh muc theo id cua tin

	public function getDataDmByID($id){
		$this->db->select('*');
		$this->db->from('tbl_danhmucnews');
		$this->db->join('tbl_news', 'tbl_news.id_dm = tbl_danhmucnews.id', 'left');
		$this->db->where('tbl_news.id', $id);
		$ketqua = $this->db->get();
		$ketqua = $ketqua->result_array();
		$ten  = $ketqua[0]['name_dm'];
		return $ten;
	}

	//lay id cua danh muc theo id cua tin
    public function getIdDmByIdNews($id){
		$this->db->select('*');
		$this->db->from('tbl_danhmucnews');
		$this->db->join('tbl_news', 'tbl_news.id_dm = tbl_danhmucnews.id', 'left');
		$this->db->where('tbl_news.id', $id);
		$ketqua = $this->db->get();
		$ketqua = $ketqua->result_array();
		$id  = $ketqua[0]['id_dm'];
		return $id;
	}

	//update tin theo id
	public function updateDataNews($id,$tieude,$avata_news,$id_dm,$noidung,$trichdan){
		$dulieu = array(
			'id' => $id,
			'tieude'=> $tieude,
			'id_dm' => $id_dm,
			'noidung' => $noidung,
			'avata_news' => $avata_news,
			'trichdan' => $trichdan

		 );
		$this->db->where('id', $id);
		$dulieu = $this->db->update('tbl_news', $dulieu);
		return $dulieu;
	}

	//xoa tin theo id
	
	public function deleteDataById($id){
		
		$this->db->where('id', $id);
		return $this->db->delete('tbl_news');
	}



	//lay tat cac cac tin theo so luong cung mot danh muc


	public function getAllDataDm_News($soluongtin1trang,$iddanhmuc){
		$this->db->select('*');

		$this->db->join('tbl_news', 'tbl_news.id_dm = tbl_danhmucnews.id', 'left');

		$this->db->where('tbl_news.id_dm', $iddanhmuc);

		// lay so luong tin de phan trang

		$ketqua = $this->db->get('tbl_danhmucnews',$soluongtin1trang,0);
		$ketqua= $ketqua->result_array();

		return $ketqua;
	}

	//lay cac tin lien quan tru cai tin dang duoc trinh chieu ở trên

	public function getAllDataTinlienquan($soluongtin1trang,$iddanhmuc,$id){
		$this->db->select('*');

		$this->db->join('tbl_news', 'tbl_news.id_dm = tbl_danhmucnews.id', 'left');

		$this->db->where('tbl_news.id_dm', $iddanhmuc);
		$this->db->where('tbl_news.id !=', $id);

		// lay so luong tin de phan trang

		$ketqua = $this->db->get('tbl_danhmucnews',$soluongtin1trang,0);
		$ketqua= $ketqua->result_array();

		return $ketqua;
	}

	//lay 3 tin dau tien dua vao home

	public function getsotin(){
		$this->db->select('*');
		$dulieu = $this->db->get('tbl_news');
		$dulieu = $dulieu->result_array();
		$soluongtin = count($dulieu);
		return $soluongtin;
	}

	public function getDataSendHome($soluongtin){
		$this->db->select('*');
		$this->db->join('tbl_news', 'tbl_news.id_dm = tbl_danhmucnews.id', 'left');
		

		$ketqua = $this->db->get('tbl_danhmucnews',3,$soluongtin-3);

		$ketqua= $ketqua->result_array();

		return $ketqua;
	}


	//lay so luong trang

	public function soTrangTin($soluongtin1trang){
		
		$this->db->select('*');
		$ketqua = $this->db->get('tbl_news');
		$ketqua = $ketqua->result_array();
		$soluongtin = count($ketqua);
		$soTrang = ceil($soluongtin/$soluongtin1trang);
		return $soTrang;
	}

	// lay tin theo trang 

	public function loadTinTheoTrang($soluongtin1trang,$trang){
		$this->db->select('*');
		$this->db->join('tbl_news', 'tbl_news.id_dm = tbl_danhmucnews.id', 'left');
		// lay so luong tin de phan trang
		$vitri = ($trang-1)*$soluongtin1trang;
		$ketqua = $this->db->get('tbl_danhmucnews',$soluongtin1trang,$vitri);
		$ketqua= $ketqua->result_array();
		return $ketqua;
	}

	



}

/* End of file News_model.php */
/* Location: ./application/models/News_model.php */