<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

// view gnration
public function Alumni()
{
	
    $this->load->model('model_branches');
    $data['branches']=$this->model_branches->get_branches();
	$this->load->view('header/index_page_header');
	$this->load->view('alumni_register_page',$data);
	$this->load->view('footer/index_page_footer');
}

public function Students()
{
	$this->load->model('model_semesters');
    $data['semesters']=$this->model_semesters->get_current_semesters();
    $this->load->model('model_branches');
    $data['branches']=$this->model_branches->get_branches_current();
	$this->load->view('header/index_page_header');
	$this->load->view('students_register_page',$data);
	$this->load->view('footer/index_page_footer');
}

//view generation
public function alumni_register()
	{
		$msg='invalid';
		if ($this->input->is_ajax_request()) {
			
			$this->load->model('model_alumni');
			
			
			if($this->model_alumni->register()){
				$data['msg']='success';
				$this->load->view('login_invalid',$data);
			}else{
				$data['msg']=$msg;
				$this->load->view('login_invalid',$data);
			}
			
			
		}else{
			$data['msg']=$msg;
			 $this->load->view('login_invalid',$data);
		}
	}
//// verfcation

public function check()
{
	$data['msg']='failure';
	$this->load->model('model_verify');
	$data['email_status']=$this->model_verify->checkEmail();
    $data['username_status']=$this->model_verify->checkUsername();
    $this->load->view('check_email_username',$data);
}






}






?>