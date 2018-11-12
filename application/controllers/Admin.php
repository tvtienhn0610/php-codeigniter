<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('monan_model');
		$this->load->model('header_model');
	}

	public function index()
	{
		$this->load->view('admin_veiw');
	}

	//quan ly danh muc mon ăn

	public function danhmucmonan(){
	 	$dulieu = $this->monan_model->getAllDataDmma();
	 	$dulieu = array('mangdulieu' => $dulieu );
	 	$this->load->view('admin_danhmucmonan_veiw',$dulieu);
	 }

	public function addDmma(){
	 	$tendmma = $this->input->post('name_dmma');

		$this->monan_model->insertDmma($tendmma);
		//lay ra id gui lai ham ajax xu ly jquery
		echo json_encode($this->db->insert_id());
	 }

	 public function do_editDmma(){
	 	$id = $this->input->post('id');
	 	$tendmma = $this->input->post('name_dmma');
	 	$this->monan_model->updateDataDmma($id,$tendmma);
	 }

	 public function deleteDmma($id){
	 	if($dulieu = $this->monan_model->deleteDataDmma($id)){
			$this->load->view('thanhcongnews');		
		}
		else{
			echo "that bai";
		}
	 }

	 //quan ly mon an

	 public function quanlymonan(){
	 	$dulieuDm =$this->monan_model->getAllDataDmma();
	 	$dulieuMa = $this->monan_model->getAllDatamonan();
	 	$dulieu = array('mangdulieudanhmuc' => $dulieuDm,
	 					'mangdulieumonan'  => $dulieuMa
	 					 );
	 	$this->load->view('admin_quanlymonan_veiw',$dulieu);
	 }

	 public function addMonan(){
	 	$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["avata_monan"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avata_monan"]["tmp_name"]);
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
		if ($_FILES["avata_monan"]["size"] > 5000000) {
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
		    if (move_uploaded_file($_FILES["avata_monan"]["tmp_name"], $target_file)) {
		       // echo "The file ". basename( $_FILES["nv_avata"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$avata_monan = base_url()."Fileupload/".basename($_FILES["avata_monan"]["name"]);

		//ket thuc lay link anh
		$tieude_monan = $this->input->post('tieude_monan');
		$gia_monan = $this->input->post('gia_monan');
		$mota_monan  = $this->input->post('mota_monan');
		$new_monan = $this->input->post('new_monan');
		$id_dmma = $this->input->post('id_dmma');

		if($this->monan_model->insertDatamonan($avata_monan,$tieude_monan,$gia_monan,$mota_monan,$new_monan,$id_dmma)){
			redirect('../Admin/quanlymonan','refresh');
		}
		else{
			echo "that bai!!!";
		}
	 }

	 public function deleteMa($id){
	 	if($this->monan_model->deleteDataMa($id)){
	 		redirect('../Admin/quanlymonan','refresh');
	 	}
	 	else{
	 		echo "that bai!!!";
	 	}
	 }

	 public function editMa($id){
	 	$dulieuMa = $this->monan_model->getDataMaByID($id);
	 	$dulieuDm = $this->monan_model->getAllDataDmma();
	 	$dulieu = array('mangdulieuMa' =>  $dulieuMa,
	 					'mangdulieuDm' => $dulieuDm
	 				 );
	 	$this->load->view('admin_editmonan_veiw',$dulieu);
	 }

	 public function do_editMa(){
	 	$id = $this->input->post('id');
		$tieude_monan = $this->input->post('tieude_monan');
		$gia_monan = $this->input->post('gia_monan');
		$mota_monan = $this->input->post('mota_monan');
		$new_monan = $this->input->post('new_monan');
		$id_dmma = $this->input->post('id_dmma');


		// xu ly phan anh avata doi duong dan upload va filetoupload thanh nv_avata
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["avata_monan"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avata_monan"]["tmp_name"]);
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
		if ($_FILES["avata_monan"]["size"] > 5000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["avata_monan"]["tmp_name"], $target_file)) {
		       // echo "The file ". basename( $_FILES["nv_avata"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$anh = basename($_FILES["avata_monan"]["name"]);

		//kiem tra dieu kien

		if($anh){
			$avata_monan = base_url()."Fileupload/".basename($_FILES["avata_monan"]["name"]);

		}
		else{
			$avata_monan = $this->input->post('avata_monan2');
		}

		// update du liue

		if( $this->monan_model->updateDataMa($id,$avata_monan,$tieude_monan,$gia_monan,$mota_monan,$new_monan ,$id_dmma)){
			redirect('../Admin/quanlymonan','refresh');
		}
		else{
			echo "that bai !!!!";
		}
	
	 }


	 public function quanlyheader(){
	 	// $dlHeader = array(
	 	// 	'mangXH' => array(
	 	// 		'linkFB' => "http",
	 	// 		'linkTwitter' => "http",
	 	// 		'linkP' => "http",
	 	// 		'linkGP' => "http"
	 	// 		 ),
	 	// 	'soHotLine' => array(
	 	// 		'textHotLine' => "Goi De Dat Ban" ,
	 	// 		'sDT' => "01638451202" ,

	 	// 		 ),
	 	// 	'gioMoCua' => array(
	 	// 		'text' => "Goi Mo Cua", 
	 	// 		'gio' => "9h-20h"
	 	// 		),
	 	// 	'logo' => "http://localhost/php/07/images/logo.png"
	 	//  );
	 	$dulieu = $this->header_model->getAllDataHeader();
	 	$dulieu =json_decode($dulieu,TRUE);
	 	
	 	$dulieu = array('mangdulieuheader' => $dulieu );
	 	// echo '<pre>';
	 	// var_dump($dulieu);
	 	// echo "</pre>";

	 	$this->load->view('admin_editHeader',$dulieu ,FALSE);
	 	
	 }

	 public function updateHeader(){
	 	
	 	$dulieu = array();

		$linkFB = $this->input->post('linkFB');
		$linkTwitter = $this->input->post('linkTwitter');
		$linkP = $this->input->post('linkP');
		$linkGP = $this->input->post('linkGP');
		$textHotLine = $this->input->post('textHotLine');
		$sDT = $this->input->post('sDT');
		$text = $this->input->post('text');
		$gio = $this->input->post('gio');


		$cacanh = $_FILES['logo']['name'];
		$filevatly = $_FILES['logo']['tmp_name'];

		$logo_image_old = $this->input->post('logo2');

			if(empty($cacanh)){
				$logo = $logo_image_old;
			}
			else{
				$duongdan = 'Fileupload/'.$cacanh;
				move_uploaded_file($filevatly , $duongdan);
				$logo=base_url().'Fileupload/'.$cacanh;

			}

		$dlHeader = array(
	 		'mangXH' => array(
	 			'linkFB' => $linkFB,
	 			'linkTwitter' =>$linkTwitter ,
	 			'linkP' => $linkP,
	 			'linkGP' => $linkGP
	 			 ),
	 		'soHotLine' => array(
	 			'textHotLine' => $textHotLine ,
	 			'sDT' => $sDT,

	 			 ),
	 		'gioMoCua' => array(
	 			'text' => $text, 
	 			'gio' => $gio
	 			),
	 		'logo' => $logo
	 	 );


		$dlHeader = json_encode($dlHeader);
		if($this->header_model->updateDataHeader($dlHeader)){
			redirect('../Admin','refresh');
		}
		else{
			echo "that ban";
		}

	
	 }

	 //quan ly menu

	 public function quanlymenuheader(){

	 	$dulieu = $this->header_model->getAllDataMenuHeader();
	 	$dulieu =json_decode($dulieu,TRUE);
	 	
	 	$dulieu = array('mangdulieumenuheader' => $dulieu );
	 	// echo '<pre>';
	 	// var_dump($dulieu);
	 	// echo "</pre>";

	 	$this->load->view('admin_editMenuHeader',$dulieu ,FALSE);
	 	
	 }

	 public function updateMenuHeader(){
	 	
	 	$dulieu = array();

		$text_home = $this->input->post('text_home');
		$link_home = $this->input->post('link_home');
		$text_about = $this->input->post('text_about');
		$link_about = $this->input->post('link_about');
		$text_news = $this->input->post('text_news');
		$link_news = $this->input->post('link_news');
		$text_menu = $this->input->post('text_menu');
		$link_menu = $this->input->post('link_menu');
		$text_contact = $this->input->post('text_contact');
		$link_contact = $this->input->post('link_contact');
		$text_reser = $this->input->post('text_reser');
		$link_reser = $this->input->post('link_reser');


			 	$dlMenu = array(
	 		'Home' => array(
	 			'text_home' => $text_home ,
	 			'link_home' => $link_home
	 			 ),
	 		'About' => array(
	 			'text_about' => $text_about,
	 			'link_about' => $link_about 

	 			 ),
	 		'News' => array(
	 			'text_news' => $text_news, 
	 			'link_news' => $link_news
	 			),
	 		'Menu' => array(
	 			'text_menu' => $text_menu, 
	 			'link_menu' => $link_menu
	 			),
	 		'Contact' => array(
	 			'text_contact' => $text_contact, 
	 			'link_contact' =>  $link_contact
	 			),
	 		'Reservation' => array(
	 			'text_reser' => $text_reser, 
	 			'link_reser' => $link_reser
	 			),
	 		
	 	 );

		$dlMenu = json_encode($dlMenu);
		if($this->header_model->updateDataMenuHeader($dlMenu)){
			redirect('../Admin','refresh');
		}
		else{
			echo "that ban";
		}
	 }




}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */