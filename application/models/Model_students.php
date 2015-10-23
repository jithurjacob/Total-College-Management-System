<?php

/**
 *
 */
class Model_students extends CI_Model {

public function send_mail($mail,$sub,$msg)
    {
    	$this->load->library('email');
      $this->load->helper('email');
      if (!valid_email($mail))
      {
           return false;
      }

      $this->email->from('cgpucepoonjar@gmail.com', 'Placement Cell COE Poonjar');
      $this->email->to($mail);
      $this->email->subject($sub);
      $this->email->message($msg);  

      $this->email->send();

     // echo $this->email->print_debugger();
    }

public function student_name_regno($regno='*')
{


       if($regno=='*'){
       	 $branch  = $this->session->userdata('branch');
       
       	$year_pass  = $this->session->userdata('year_pass');

		
		}else{

			$row=$this->year_branch($regno[0]);

			$branch=$row->branch;
			$year_pass=$row->year_pass;

		}
		$this->db->select('regno , name');
		$query = $this->db->where('branch',$branch);
        $query = $this->db->where('year_pass', $year_pass);
        $query = $this->db->where('valid',"1");
        
        	$query = $this->db->get('students');
        return $query->result_array();
}
public function year_branch($regno)
{			
			//$query1 = $this->db->get('students');
			
			//$this->db->where('regno',$regno);
			$query1 = $this->db->query("SELECT * FROM students WHERE regno = '$regno'");
			return $query1->row();
}
public function students_performance()
{
	$this->db->select('name,username,regno');
	
	$this->db->where('year_pass',$this->session->userdata('year_pass'));
	$branch  = $this->session->userdata('branch');
	$this->db->where('branch',$branch);
	$branch  = $this->session->userdata('branch');
	

	$this->db->where('(privacy_academic="anyone" or privacy_academic="classmates" or privacy_academic="batchmates")');
	$this->db->or_where('username',$this->session->userdata('username'));
	$query = $this->db->get('students');
	return $query->result_array();

}
	public function status()
{		
       $query = $this->db->get('students');
       $this->db->select('valid');
       
        return $query->result_array();
}

public function students_list_name() {
		//$query = $this->db->get('students');
		$this->db->select('name,username');
		$query = $this->db->get('students');
		return $query->result_array();

	}

public function profileview($username)
	{
		
		$this->db->where('username', $username);
		$query = $this->db->get('students');

		return $query->result_array();
	}

	public function search()
	{
		$branch=$this->input->post('branch');
		$name=$this->input->post('name');
		$year_pass_min = $this->input->post('year_pass_min');
		$year_pass_max = $this->input->post('year_pass_max');

		//$this->db->select('name,branch,year_pass,pic,regno,username,privacy_profile_pic,privacy_personal,privacy_academic,privacy_resume');

		$this->db->like('name', $name); 
		$this->db->where('year_pass >=', $year_pass_min);
		$this->db->where('year_pass <=', $year_pass_max);
		if($branch!="ALL")
		$this->db->where('branch', $branch);
		$this->db->where('valid', "1");
		$query = $this->db->get('students');

		return $query->result_array();
	}

	public function year_details() {
		
		//$user  = $this->session->userdata('username');
		$query=$this->db->distinct();
		$this->db->select('year_pass');
		$this->db->order_by("year_pass", "desc"); 
		$query = $this->db->get('students');
		
		//$query = $this->db->get_where('students', array('username' => $user));
		return $query->result_array();

	}
	public function get_minmax()
	{
		$this->db->select_max('year_pass', 'max');
		$this->db->select_min('year_pass', 'min');
		$query = $this->db->get('students');
		
		return $query->result_array();
	}
	public function validate_coordinator($valid='r')
	{
		$this->load->library('encrypt');
		$user=$this->encrypt->decode($this->input->post('userid'));
		$val=($valid=="a"?"1":"0");
		$data = array('coordinator' => $val);
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
	}
	public function validate($valid="r")
	{
		$this->load->library('encrypt');
		$this->load->library('email');
		$user=$this->encrypt->decode($this->input->post('userid'));
		$val=($valid=="a"?"1":"-1");

		if($valid=="a")
			$this->send_mail($this->get_mailid($user),"Account Activated","Your account at placement cell portal has been activated.Please visit ".base_url()." for logging in.");
		else
			$this->send_mail($this->get_mailid($user),"Account Request Rejected","Your request for an account at placement cell portal has been rejected by admin.");
		
		$data = array('valid' => $val);
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
	}
	public function get_mailid($user)
	{
		$query = $this->db->get_where('students', array('username' => $user));
		if ($query->num_rows == 1) {
			$row  = $query->row();

            return $row->email;
		}
	}
	public function marks_validate($valid="r")
	{
		$this->load->library('encrypt');
		$user=$this->encrypt->decode($this->input->post('id'));
		$val=($valid=="v"?"1":"-1");
		$data = array('valid' => $val,'verifier'=>$this->session->userdata('username'));
        $query = $this->db->where('id' , $user);
        return $this->db->update('marks', $data);
	}
	
	public function get_details() {
		//$query = $this->db->get('students');
		$user  = $this->session->userdata('username');
		$query = $this->db->get_where('students', array('username' => $user));
		return $query->result_array();

	}

	  public function forgot_pwd($value='')
    {
         $email  = $this->input->post('email');
        $this->db->where('email', $email);
        $query = $this->db->get('students');

        // Let's check if there are any results
        if ($query->num_rows == 1) {
            $recoverykey= random_string('alnum', 50);
             $data = array('recoverykey' => $recoverykey);
              $query = $this->db->where('email' , $email);
              $this->send_mail($email,"Password reset link","Use the following link to reset your password ".base_url()."index.php/placement/home/resetpwd/resetpwd/".$recoverykey."");
             return $this->db->update('students', $data);
        }else{
            return FALSE;
        }
    }
 public function recover($value)
    {
        $this->db->where('recoverykey', $value);
        $query = $this->db->get('students');
        $row = $query->row();
        if ($query->num_rows == 1) 
        return $row->username;
    else return "";
    }
    public function resetpwd($user)
    {	if($this->input->post('rec')=="")
    return false;
    	$this->db->where('recoverykey', $this->input->post('rec'));
    	$this->db->where('username',$user);
    	$query = $this->db->get('students');
    	if ($query->num_rows != 1) 
    		return false;

    	$data = array('password' => sha1($this->input->post('password')."jithu$&"),'recoverykey'=>"");
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
    }
	public function get_coordinator_markdetails()
	{
		$branch  = $this->session->userdata('branch');
		$year_pass=$this->session->userdata('year_pass');
		
		$this->db->order_by("regno", "asc");
		$this->db->order_by("sem", "asc");  
		$query = $this->db->get_where('marks', array('branch' => $branch,'year_pass'=>$year_pass,'valid'=>'0'));
		
		return $query->result_array();
		
	}
	public function get_admin_markdetails()
	{
		
		$this->db->order_by("regno", "asc");
		$this->db->order_by("sem", "asc");  
		$query = $this->db->get_where('marks', array('valid'=>'0'));
		
		return $query->result_array();
		
	}
	public function coordinator_list() {
		//$query = $this->db->get('students');
		//$user  = $this->session->userdata('username');
		//$this->db->select('student_id,username,name,year_pass,branch');
		$query = $this->db->get_where('students', array('coordinator' => '1'));
		return $query->result_array();

	}

	public function student_list_year_branch($user="") {
		//$query = $this->db->get('students');
		//$user  = $this->session->userdata('username');
		//$this->db->select('username,name');
		$branch  = $this->session->userdata('branch');
		$year_pass=$this->session->userdata('year_pass');
		if($user=="admin")
		$query = $this->db->get('students');	
		else if($user=="coordinator")
		$query = $this->db->get_where('students', array('year_pass' => $year_pass , 'branch' => $branch ));
		else	
			$query = $this->db->get_where('students', array('year_pass' => $this->input->post('year_pass') , 'branch' => $this->input->post('branch') ,'coordinator' =>'0'));
		
		return $query->result_array();

	}

	
    public function profile_pic_update($value)
    {

        $user  = $this->session->userdata('username');
        $query = $this->db->get_where('students', array('username' => $user));
         $row=$query->row();
         if ($row->pic!="default.jpg") {
             $file = "profile_pics/".$row->pic;
            if(file_exists($file))
            if (!unlink($file))
             {
             //echo ("Error deleting $file");
                 }
            else
             {
              //echo ("Deleted $file");
                      }
         }
        $data = array('pic' => $value.".jpg");
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
    }

    public function resume_update($value)
    {

        $user  = $this->session->userdata('username');
        $query = $this->db->get_where('students', array('username' => $user));
         $row=$query->row();
         if ($row->resume!=NULL) {
             $file = "resume/".$row->resume;
            if(file_exists($file))
            if (!unlink($file))
             {
             //echo ("Error deleting $file");
                 }
            else
             {
              //echo ("Deleted $file");
                      }
         }
        $data = array('resume' => $value.".pdf");
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
    }

    public function changepwd($value='')
    {$this->load->library('encrypt');
    $user  = $this->session->userdata('username');
    	$data = array('password' =>sha1($this->input->post('password')."jithu$&"));
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
    }
      public function changeprivacy($value='')
    {$user  = $this->session->userdata('username');
    	$data = array('privacy_profile_pic' => $this->input->post('privacy_profile_pic'),
    		'privacy_personal' => $this->input->post('privacy_personal'),
    		'privacy_academic' => $this->input->post('privacy_academic'),
    		'privacy_resume' => $this->input->post('privacy_resume'));
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
    }
    public function update() {
        $name      = $this->input->post('name');
        $gender  = $this->input->post('gender');
        //$branch  = $this->input->post('branch');
        $semester  = $this->input->post('semester');
        $dob    = $this->input->post('dob');
        $perm_addr  = $this->input->post('perm_addr');
        $temp_addr   = $this->input->post('temp_addr');
        $mobno    = $this->input->post('mobno');
//        $contactno = $this->input->post('contactno');
        $tenth  = $this->input->post('tenth');
        $twelth  = $this->input->post('twelth');
        $entrance_rank  = $this->input->post('entrance_rank');
        //$year_pass  = $this->input->post('year_pass');
        $data = array('name' => $name, 'gender' => $gender, 'semester' => $semester,
         'dob' => $dob, 'perm_addr' => $perm_addr, 'temp_addr' => $temp_addr,'mobno'=>$mobno,
         'tenth'=>$tenth,'twelth'=>$twelth,'entrance_rank'=>$entrance_rank);
        
        $user  = $this->session->userdata('username');
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
    }
	public function check_username_exists() {
		$username = $this->security->xss_clean($this->input->post('username'));
		$this->db->where('username', $username);
		$query = $this->db->get('students');
		if ($query->num_rows != 0) {
			return true;
		} else {
			return false;
		}
	}
/////////////////////////////////////////////////////////////////////////////
	public function check_login() {
		$this->load->library('encrypt');

		// grab user input
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));

		// Prep the query
		$this->db->where('username', $username);
		// $this->db->where('valid', 1);
		$this->db->where('password', sha1($password."jithu$&"));

		// Run the query
		$query = $this->db->get('students');

		// Let's check if there are any results
		//print_r( $query);
		if ($query->num_rows() == 1) {

			// If there is a user, then create session data
			 $row  = $query->row();
            if($row->valid == 0)
                return "PENDING";
            if($row->valid == -1)
                return "REJECT";

			$data = array('username' => $row->username,'email'=>$row->email,
				'branch'=> $row->branch,'regno'=> $row->regno,
				'year_pass'=> $row->year_pass, 'type' => 'students','sem'=>$row->semester,
				 'validated' => true,'coordinator'=>$row->coordinator);
			$this->session->set_userdata($data);
			return true;
		}

		// If the previous process did not validate
		// then return false.
		return false;
	}


	public function register() {
		$this->load->helper('inflector'); 
		$this->load->library('encrypt');
		$name      = humanize($this->input->post('name'));
		$username  = $this->input->post('username');
		$email     = $this->input->post('email');
		$branch     = $this->input->post('branch');
		$password  = sha1($this->input->post('password')."jithu$&");
		$admnno    = $this->input->post('admnno');
		$regno     = $this->input->post('regno');
		$rollno     = $this->input->post('rollno');
		$year_pass = $this->input->post('year_pass');

		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'password' => $password,'branch'=>$branch, 'admnno' => $admnno, 'regno' => $regno,'rollno' => $rollno, 'year_pass' => $year_pass,'valid'=>'0');
		return $this->db->insert('students', $data);
	}
}
?>