<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->library('session'); 
        if($this->session->userdata('type')!= 'admin'){
           	session_destroy();
            redirect(base_url());

        }
    }
   
	public function index()
	{
		$this->load->model('Model_admin');
		$data['profile_pic']=$this->Model_admin->get_pic();
		$data['name']=$this->Model_admin->get_name();

		$this->load->view('header/index_page_header');
		$this->load->view('sidebar/admin_sidebar_menu',$data);
		$this->load->view('admin_dash');
		$this->load->view('footer/admin_page_footer');
	}

	public function profile()
	{
		$this->load->model('Model_admin');
		$data['profile_pic']=$this->Model_admin->get_pic();
		$data['name']=$this->Model_admin->get_name();

		$this->load->view('header/index_page_header');
		$this->load->view('sidebar/admin_sidebar_menu',$data);
		$this->load->view('admin/profile');
		$this->load->view('footer/admin_page_footer');
	}

	public function timeline()
	{
		$this->load->model('Model_admin');
		$data['profile_pic']=$this->Model_admin->get_pic();
		$data['name']=$this->Model_admin->get_name();

		$this->load->view('header/index_page_header');
		$this->load->view('sidebar/admin_sidebar_menu',$data);
		$this->load->view('under_construction');
		$this->load->view('footer/admin_page_footer');
	}
	
	public function search()
	{
		$this->load->model('Model_admin');
		$data['profile_pic']=$this->Model_admin->get_pic();
		$data['name']=$this->Model_admin->get_name();

		$this->load->view('header/index_page_header');
		$this->load->view('sidebar/admin_sidebar_menu',$data);
		$this->load->view('under_construction');
		$this->load->view('footer/admin_page_footer');
	}

	//view for branch mgmnt
	public function branch()
	{
		$this->load->model('Model_admin');
		$data['profile_pic']=$this->Model_admin->get_pic();
		$data['name']=$this->Model_admin->get_name();

		$this->load->model('Model_branches');
		$data['branches_current']=$this->Model_branches->get_branches_current_();
		$data['branches_previous']=$this->Model_branches->get_branches_previous();

		$this->load->view('header/index_page_header');
		$this->load->view('sidebar/admin_sidebar_menu',$data);
		$this->load->view('admin/branch_management');
		$this->load->view('footer/admin_page_footer');
	}

	public function branch_delete($value='')
	{
		if ($this->input->is_ajax_request()) {
			$this->load->model('Model_branches');
			if($this->Model_branches->delete($table,$operation))
			$data['msg']="success";
			else
			$data['msg']="failure";
			$this->load->view('json_status',$data);
		}else{
			$data['msg']="Invalid";
			 $this->load->view('json_status',$data);
		}
	}

	//view for branch mgmnt

	///// user management

	// view for verify alumni,fac,stud
	public function verify($val="")
	{
		$this->load->model('Model_admin');
		$data['profile_pic']=$this->Model_admin->get_pic();
		$data['name']=$this->Model_admin->get_name();

		$this->load->model('Model_verify');

		$this->load->view('header/index_page_header');
		$this->load->view('sidebar/admin_sidebar_menu',$data);
		if($val=="alumni"){
			$data['alumnees']=$this->Model_verify->get_newreg('alumni');
			$this->load->view('admin/user_management/verify/verify_alumni',$data);
		}
		else if($val=="student"){
			$data['students']=$this->Model_verify->get_newreg('student');
			$this->load->view('admin/user_management/verify/verify_student',$data);
		}
		else if($val=="faculty"){
			$data['faculties']=$this->Model_verify->get_newreg('faculty');
			$this->load->view('admin/user_management/verify/verify_faculty',$data);
		}
		else
		$this->load->view('under_construction');
		$this->load->view('footer/admin_page_footer');
	}
	//ajax opn to accept or reject user
	public function verify_user($table='',$operation='')
	{
		if ($this->input->is_ajax_request()) {
			$this->load->model('Model_verify');
			if($this->Model_verify->validate($table,$operation))
			$data['msg']="success";
			else
			$data['msg']="failure";
			$this->load->view('json_status',$data);
		}else{
			$data['msg']="Invalid";
			 $this->load->view('json_status',$data);
		}
	}
///// user mgmnt
}
