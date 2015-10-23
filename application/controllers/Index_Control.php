<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Control extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('header/index_page_header');
		$this->load->view('index_page');
		$this->load->view('footer/index_page_footer');
	}

	public function logout()
	{
		session_destroy();
        redirect(base_url());
	}

	public function lock()
	{
		
		session_destroy();
        redirect(base_url());
	}
}
