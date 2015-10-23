<?php

/**
* 
*/
class Model_alumni extends CI_Model
{	

    public function register() {
		$this->load->helper('inflector'); 
		$name      = humanize($this->input->post('name'));
		$email     = $this->input->post('email');
		$mobno     = $this->input->post('mobno');
		$dob     = $this->input->post('dob');

		$username  = $this->input->post('username');
		$password  = sha1($this->input->post('password')."jithu$&");

		$branch     = $this->input->post('branch');		
		$admnno    = $this->input->post('admnno');
		$regno     = $this->input->post('regno');
		$year_pass = $this->input->post('yearofpass');
		$lateral = $this->input->post('lateral');

		$data = array('name' => $name,
					 'username' => $username, 
					 'dob'=>$dob,
					 'mobno'=>$mobno,
					 'email' => $email, 
					 'password' => $password,
					 'branch'=>$branch, 
					 'admnno' => $admnno, 
					 'regno' => $regno,
					  'year_pass' => $year_pass,
					  'lateral'=>$lateral,
					  'semester'=>9,
					  'valid'=>'0');
		return $this->db->insert('students', $data);
	}
}

?>