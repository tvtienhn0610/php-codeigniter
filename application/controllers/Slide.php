<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Slide_model');
	}

	public function index()
	{
		$dulieu = array();
		$dulieu = $this->Slide_model->getAllData();
		$dulieu = json_decode($dulieu);

		$dulieu = array('mangketqua' => $dulieu);

		$this->load->view('editSlide_veiw', $dulieu, FALSE);
		// $dulieu = array();
		// $dulieu = $this->Slide_model->getAllData();
		// $dulieu = json_decode($dulieu);
		// echo '<pre>';
		//  var_dump($dulieu);
		//  echo "</pre>";
	}

	public function addSlide()
	{
		//lay du lieu tu slides_topbanner xon du du lieu vao
		$dulieu = array();

		$dulieu = $this->Slide_model->getAllData();
		$dulieu = json_decode($dulieu);
		

		//lay link anh
		$target_dir = "Fileupload/";
		$target_file = $target_dir . basename($_FILES["slide_image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["slide_image"]["tmp_name"]);
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
		if ($_FILES["slide_image"]["size"] > 5000000) {
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
		    if (move_uploaded_file($_FILES["slide_image"]["tmp_name"], $target_file)) {
		       // echo "The file ". basename( $_FILES["nv_avata"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}

		$slide_image = base_url()."Fileupload/".basename($_FILES["slide_image"]["name"]);

		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$button_link = $this->input->post('button_link');
		$button_text = $this->input->post('button_text');

		$con = array(
			'title' => $title ,
			'description' => $description,
			'button_link' => $button_link,
			'button_text' => $button_text,
			'slide_image' => $slide_image
			 );

		array_push($dulieu,$con);
		$dulieu = json_encode($dulieu);

		 // echo '<pre>';
		 // var_dump($dulieu);
		 // echo "</pre>";

		if($this->Slide_model->updateData($dulieu)){
		 	$this->load->view('thanhcong');
		 }


	}

	public function editSlide()
	{
		$dulieu = array();
		$dulieu = $this->Slide_model->getAllData();
		$dulieu = json_decode($dulieu);

		$dulieu = array('mangketqua' => $dulieu);

		$this->load->view('editSlide_veiw', $dulieu, FALSE);
	}

	public function do_editSlide()
	{
		$dulieu = array();

		$title = $this->input->post('title');
		$description = $this->input->post('description');
		$button_link = $this->input->post('button_link');
		$button_text = $this->input->post('button_text');

		$cacanh = $_FILES['slide_image']['name'];
		$filevatly = $_FILES['slide_image']['tmp_name'];

		$slide_image = array();
		$slide_image_old = $this->input->post('slide_image2');

		for ($i=0; $i < count($cacanh); $i++) { 
			if(empty($cacanh[$i])){
				$slide_image[$i] = $slide_image_old[$i];
			}
			else{
				$duongdan = 'Fileupload/'.$cacanh[$i];
				move_uploaded_file($filevatly[$i] , $duongdan);
				$slide_image[$i]=base_url().'Fileupload/'.$cacanh[$i];

			}

			
		}

		for ($i=0; $i < count($title); $i++) { 
			$trunggian = array();
			$trunggian['title'] = $title[$i];
			$trunggian['description'] = $description[$i];
			$trunggian['button_link'] = $button_link[$i];
			$trunggian['button_text'] = $button_text[$i];
			$trunggian['slide_image'] = $slide_image[$i];
			array_push($dulieu,$trunggian);
		}

		$dulieu = json_encode($dulieu);
		if($this->Slide_model->updateData($dulieu)){
			echo "thanhcong";
			//$this->load->view('thanhcong');
		}
		else{
			echo "that ban";
		}
	}
	public function addSlidev()
	{
		$this->load->view('addSlide_veiw');
	}

}


/* End of file Slide.php */
/* Location: ./application/controllers/Slide.php */