<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// require file mail vao trong controller

require('mail/PHPMailerAutoload.php');

class Sendmail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('sendmail_veiw');
	}

	public function do_sendmail()
	{

		// nhan ve thong tin

		$email = $this->input->post('email');
		$nguoigui = $this->input->post('nguoigui');
		$noidung = $this->input->post('noidung');



		


		
		// Import PHPMailer classes into the global namespace
		// These must be at the top of your script, not inside a function
		// use PHPMailer\PHPMailer\PHPMailer;
		// use PHPMailer\PHPMailer\Exception;

		// //Load Composer's autoloader
		// require 'vendor/autoload.php';

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
		    $mail->setFrom('viet@fedu.vn',$nguoigui);	//ten hien thi
		    $mail->addAddress($email, 'tien');     // email can gui 
		    // $mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    // //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $nguoigui;
		    $mail->Body    = $noidung;
		   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}

}

/* End of file Senmail.php */
/* Location: ./application/controllers/Senmail.php */