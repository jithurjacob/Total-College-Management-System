<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function index()
	{
		$msg='invalid';
		if ($this->input->is_ajax_request()) {
			$data['redirect_url']='google.com';
			$this->load->model('model_admin');
			$this->load->model('model_students');
			$this->load->model('model_faculty');

			$msg=$this->model_admin->check_login();
			if($msg===true){
				$data['redirect_url']='index.php/admin/';
				$this->load->view('login_valid',$data);
			}else if($msg===false){ 
				 $msg=$this->model_students->check_login();

				if($msg===true){
					$data['redirect_url']='index.php/student/';
					$this->load->view('login_valid',$data);
				}else if($msg===false){
					$msg=$this->model_faculty->check_login();
					if($msg===true){
						$data['redirect_url']='index.php/faculty/';
						$this->load->view('login_valid',$data);
					}else if($msg===false){
						$data['msg']='invalid';
					 	$this->load->view('login_invalid',$data);
					}else{
						$data['msg']=$msg;
						$this->load->view('login_invalid',$data);
					}
				}else{

				 $data['msg']=$msg;
				$this->load->view('login_invalid',$data);
			}
			}else{
				$data['msg']=$msg;
				$this->load->view('login_invalid',$data);
			}
			
			
		}else{
			$data['msg']=$msg;
			 $this->load->view('login_invalid',$data);
		}
	}

}


?>