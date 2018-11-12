<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	private $soluongtin1trang;
	private $soluongtin1nhung;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('News_model');
		$this->load->model('header_model');
		$this->soluongtin1trang = 2;
		$this->soluongtin1nhung = 3;
	}
	//load danh sach tin va phan trang luon
	public function index()
	{
		// $dulieu1 = $this->News_model->getAllDataDm_News($this->soluongtin1trang);
		// $dulieu2 = $this->News_model->soTrangTin($this->soluongtin1trang);
		// $dulieu3 = $this->News_model->getAllDataDm();
		// $dulieu = array('mangdulieu' => $dulieu1,
		// 				'sotrang'    => $dulieu2,
		// 				'mangdanhmuc'=> $dulieu3
		// );
		// $this->load->view('Tintuc', $dulieu, FALSE);

	}
	//nhan vao so trang

	public function page($trang){
		//tinh vi tri

		$dulieuheader = $this->header_model->getAllDataHeader();
	 	$dulieuheader =json_decode($dulieuheader,TRUE);

	 	$dulieumenuheader = $this->header_model->getAllDataMenuHeader();
	 	$dulieumenuheader =json_decode($dulieumenuheader,TRUE);

		$dulieu1 = $this->News_model->loadTinTheoTrang($this->soluongtin1trang,$trang);
		$dulieu2 = $this->News_model->soTrangTin($this->soluongtin1trang);
		$dulieu3 = $this->News_model->getAllDataDm();
		$dulieu = array('mangdulieumenuheader' => $dulieumenuheader,
						'mangdulieuheader' => $dulieuheader,
						'mangdulieu' => $dulieu1,
						'sotrang'    => $dulieu2,
						'mangdanhmuc'=> $dulieu3
		);
		$this->load->view('Tintuc', $dulieu, FALSE);
	}

	//xem chi tiet cua tin và lấy các tin liên quan cho vao o nhung

	public function chiTietTin($id){

		//lay id cua danh muc thuoc vao tin
		$iddanhmuc = $this->News_model->getIdDmByIdNews($id);

		$dulieuheader = $this->header_model->getAllDataHeader();
	 	$dulieuheader =json_decode($dulieuheader,TRUE);

	 	$dulieumenuheader = $this->header_model->getAllDataMenuHeader();
	 	$dulieumenuheader =json_decode($dulieumenuheader,TRUE);

		//lay du lieu cac tin them vao nhung
		$dulieu2 = $this->News_model->getAllDataTinlienquan($this->soluongtin1nhung,$iddanhmuc,$id);


		$dulieu1 = $this->News_model->getDataNewsByID($id);
		$dulieu3 = $this->News_model->getAllDataDm();
		$dulieu = array('mangdulieumenuheader' => $dulieumenuheader,
						'mangdulieuheader' => $dulieuheader,
						'mangdulieu' => $dulieu1,
						'mangdanhmuc'=> $dulieu3,
						'mangdulieunhung' => $dulieu2
		 );
		$this->load->view('tinTuc_detail', $dulieu, FALSE);
	}

	//load danh sach tin theo danh muc

	public function danhmuc($id){
		$dulieu1 = $this->News_model->getAllDataDm_News($this->soluongtin1trang,$id);
		$dulieu2 = $this->News_model->soTrangTin($this->soluongtin1trang);
		$dulieu3 = $this->News_model->getAllDataDm();

		$dulieuheader = $this->header_model->getAllDataHeader();
	 	$dulieuheader =json_decode($dulieuheader,TRUE);

		$dulieumenuheader = $this->header_model->getAllDataMenuHeader();
	 	$dulieumenuheader =json_decode($dulieumenuheader,TRUE);
		$dulieu = array('mangdulieumenuheader' => $dulieumenuheader,
						'mangdulieuheader' => $dulieuheader,
						'mangdulieu' => $dulieu1,
						'sotrang'    => $dulieu2,
						'mangdanhmuc'=> $dulieu3
		);
		$this->load->view('Tintuc', $dulieu, FALSE);
	}


	//xem danh muc tin

	public function danhmuctin()
	{	
		$dulieu = $this->News_model->getAllDataDm();
		$dulieu = array('mangketqua' => $dulieu );
		$this->load->view('News_veiw_admin',$dulieu,False);
	}
	//them danh muc 

	public function addDm()
	{
		$tendm = $this->input->post('name_dm');
		$this->News_model->insertDmNews($tendm);
		//lay ra id gui lai ham ajax xu ly jquery
		echo json_encode($this->db->insert_id());

	}

	// sửa danh muc

	public function editDm($iddanhmuc)
	{
		$dulieu = $this->News_model->getDataById($iddanhmuc);
		$dulieu = array('mangketqua' => $dulieu );
		$this->load->view('editDm_veiw', $dulieu, FALSE);
	}

	//update

	public function do_editDm()
	{
		$id = $this->input->post('id');
		$name_dm = $this->input->post('name_dm');
		if($this->News_model->updateDataDm($id,$name_dm)){
			$this->load->view('thanhcongnews');
		}
		else{
			echo "that bai";
		}
	}

	//delete
	// tim kiem cac bai viet co trong danh muc chuyen het sang danh muc chua phan loai

	public function deleteDm($idnhanduoc)
	{
		// if($this->News_model->getDataNewsByID_Dm($idnhanduoc));
		//tiem kiem cac danh muc thuoc tin chuyen sang danh muc tin chua duoc phan loai
		if($dulieu = $this->News_model->deleteDataDm($idnhanduoc)){
			$this->load->view('thanhcongnews');		
		}
		else{
			echo "that bai";
		}

	}

	//quan ly tin tuc
	public function quanlytin(){
		$dulieu1 = $this->News_model->getAllDataDm();
		$dulieu2 = $this->News_model->getAllDatanews();

		$dulieu = array('mangdulieudanhmuc' => $dulieu1,
						'mangdulieutin' => $dulieu2
						 );
		$this->load->view('Tin_veiw', $dulieu, FALSE);

	}

	public function addNews(){
		//upload anh
		//lay link anh
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["avata_news"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avata_news"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Đã có file tồn tại !!!.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["avata_news"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["avata_news"]["tmp_name"], $target_file)) {
		       // echo "The file ". basename( $_FILES["nv_avata"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$avata_news = base_url()."Fileupload/".basename($_FILES["avata_news"]["name"]);

		//ket thuc lay link anh
		$tieude = $this->input->post('tieude');
		$id_dm = $this->input->post('id_dm');
		$noidung  = $this->input->post('noidung');
		$trichdan = $this->input->post('trichdan');

		if($this->News_model->insertDataNews($tieude , $id_dm , $noidung ,$avata_news ,$trichdan)){
			$dulieu1 = $this->News_model->getAllDataDm();
			$dulieu2 = $this->News_model->getAllDatanews();

			$dulieu = array('mangdulieudanhmuc' => $dulieu1,
						'mangdulieutin' => $dulieu2
						 );
			$this->load->view('Tin_veiw', $dulieu, FALSE);
			
		}
		else{
			echo 'that bai!!!';
		}
	}

	public function editNews($id){
		$dulieu1 = $this->News_model->getDataNewsByID($id);

		$dulieu2 = $this->News_model->getDataDmByID($id);

		$dulieu3 = $this->News_model->getAllDataDm();
		//lay gia tri ten danh muc

		$dulieu = array('mangdulieutin' => $dulieu1,
						'mangdanhmuc'	=> $dulieu3,
						'tendanhmuc'	=> $dulieu2
		 );
		$this->load->view('editNews_veiw', $dulieu, FALSE);
	}

	public function do_editNews(){

		$id = $this->input->post('id');
		$tieude = $this->input->post('tieude');
		$id_dm = $this->input->post('id_dm');
		$trichdan = $this->input->post('trichdan');
		$noidung = $this->input->post('noidung');	


		// xu ly phan anh avata doi duong dan upload va filetoupload thanh nv_avata
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["avata_news"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avata_news"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		// if (file_exists($target_file)) {
		//     echo "Đã có file tồn tại !!!.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["avata_news"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["avata_news"]["tmp_name"], $target_file)) {
		       // echo "The file ". basename( $_FILES["nv_avata"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$anh = basename($_FILES["avata_news"]["name"]);

		//kiem tra dieu kien

		if($anh){
			$avata_news = base_url()."Fileupload/".basename($_FILES["avata_news"]["name"]);

		}
		else{
			$avata_news = $this->input->post('avata_news2');
		}

		// update du liue

		if( $this->News_model->updateDataNews($id,$tieude,$avata_news,$id_dm,$noidung,$trichdan)){
			$this->load->view('thanhcong');
		}
		else{
			echo "that bai !!!!";
		}
	
		
	}

	public function deleteNews($id){
		if($this->News_model->deleteDataById($id)){
			$this->load->view('thanhcong');
		}
		else{
			echo "that bai !!!!";
		}
	}

	// public function tintuc(){
	// 	$this->load->view('Tintuc');
	// }

}

/* End of file News.php */
/* Location: ./application/controllers/News.php */ 