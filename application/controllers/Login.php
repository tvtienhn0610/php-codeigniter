<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('login_veiw');
	}

	public function check(){
		$email = $this->input->post('email');
		$pass = $this->input->post('password');

		$dulieu = $this->login_model->getDataAdmin($email,$pass);

		if(empty($dulieu)){
			redirect('../Login','refresh');
		}
		else {
			$dulieunguoidung = array(
					'email' => $email,
					'password' => $pass
			);
			
			$this->session->set_userdata($dulieunguoidung);
			redirect('../Admin','refresh');
	}
}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */