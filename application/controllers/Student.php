<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->library('session'); 
        if($this->session->userdata('type')!= 'students'){
           	session_destroy();
            redirect(base_url());

        }
    }

	public function index()
	{
		$this->load->view('header/index_page_header');
		$this->load->view('sidebar/student_sidebar_menu');
		$this->load->view('student_dash');
		$this->load->view('footer/student_page_footer');
	}


	
	


}
