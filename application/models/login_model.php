<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getDataAdmin($email,$pass){
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', $pass);
		$dulieu = $this->db->get('tbl_admin');
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */