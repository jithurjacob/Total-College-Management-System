<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->library('session'); 
        if($this->session->userdata('type')!= 'faculty'){
           	session_destroy();
            redirect(base_url());

        }
    }

	public function index()
	{
		$this->load->view('header/index_page_header');
		$this->load->view('sidebar/faculty_sidebar_menu');
		$this->load->view('faculty_dash');
		$this->load->view('footer/faculty_page_footer');
	}


	
	


}
