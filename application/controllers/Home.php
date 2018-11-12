 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require('mail/PHPMailerAutoload.php');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Slide_model');
		$this->load->model('home_model');
		$this->load->model('monan_model');
		$this->load->model('header_model');
		$this->load->model('News_model');
		
	}

	public function index()
	{
		$dulieuheader = $this->header_model->getAllDataHeader();
	 	$dulieuheader =json_decode($dulieuheader,TRUE);
	 	$dulieumenuheader = $this->header_model->getAllDataMenuHeader();
	 	$dulieumenuheader =json_decode($dulieumenuheader,TRUE);
	 	//dua 3 tin vao trng chu
	 	$soluongtin = $this->News_model->getsotin();
	 	$dulieunews = $this->News_model->getDataSendHome($soluongtin);
		//$this->load->view('trangchu');
		//lay du lieu cac mon an theo 
		$dulieumonan = $this->monan_model->getAllDatamonan();
		
		$dulieuslide = $this->Slide_model->getAllData();
		// lay du lieu cac mon an
		$dulieuAllSpecial = $this->monan_model->getAllDatamonanSp();
		$dulieumonansang = $this->monan_model->getAllDatamonanBf();
		$dulieumonantrua = $this->monan_model->getAllDatamonanLu();
		$dulieumonantoi = $this->monan_model->getAllDatamonanDi();

		$dulieuslide = json_decode($dulieuslide,true);
		$dulieu = array(
						'mangdulieumonanSpecial' => $dulieuAllSpecial,
						'mangdulieumenuheader'=> $dulieumenuheader,
						'mangdulieutintuc' => $dulieunews,
						'mangdulieuheader' => $dulieuheader,
						'mangdulieu' => $dulieuslide,
						'mangmonansang' => $dulieumonansang,
						'mangmonantrua' => $dulieumonantrua,
						'mangmonantoi' => $dulieumonantoi,
						'mangdulieumonan' => $dulieumonan );
		$this->load->view('trangchu', $dulieu, FALSE);
	}

	//khach hang dat ban

	public function oder_table()
	{
		$name_kh = $this->input->post('name_kh');
		$email_kh =$this->input->post('email_kh');
		$phone_kh =$this->input->post('phone_kh');
		$date_kh =$this->input->post('date_kh');
		$hour_kh =$this->input->post('hour_kh');

		$a = (string)$date_kh;
		$b = (string)$hour_kh;
		$hour_kh = $a." ".$b;
		$number_kh = $this->input->post('number_kh');

		// insert dư liue

		if($this->home_model->insert_oder_table($name_kh , $email_kh ,$phone_kh ,$date_kh ,$hour_kh,$number_kh)){
			$this->load->view('thanhcong');


			// sau khi innsert gui mail thong bao dat ban
			$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
		    //Server settings
		    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // cai dat may chu
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'kemxucuocsong@gmail.com';                 // email de gui
		    $mail->Password = 'fzqdcechmbepkxtv';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->charset = "UTF-8";
		    $mail->setFrom('viet@fedu.vn',"kemxucuocsong");	//ten hien thi
		    $mail->addAddress('kemxucuocsong@outlook.com', 'tien');     // email can gui 
		    // $mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    // //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Thông Báo Có Khách Vừa Đặt Bàn có tên là: '.$name_kh.'và có số điện thoại là:'.$phone_kh;
		    $mail->Body    = "Nội dung Trong Cơ Sở Dữ Liệu";
		   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
		}


	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */ 