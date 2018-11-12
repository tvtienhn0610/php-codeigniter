<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function insert_oder_table($name_kh , $email_kh ,$phone_kh ,$date_kh ,$hour_kh,$number_kh)
	{
		$oder_kh = array(
			'name_kh' => $name_kh,
			'email_kh' => $email_kh,
			'phone_kh' => $phone_kh,
			'date_kh' => $date_kh,
			'hour_kh' => $hour_kh,
			'number_kh' => $number_kh
		 );
		return $this->db->insert('tbl_datban', $oder_kh);
	}

}

/* End of file home_model.php */
/* Location: ./application/models/home_model.php */