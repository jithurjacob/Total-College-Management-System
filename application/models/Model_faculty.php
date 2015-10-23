<?php

/**
* 
*/
class Model_faculty extends CI_Model
{	
public function resetpwd($user)
    { 
      if($this->input->post('rec')=="")
    return false;
      $this->db->where('recoverykey', $this->input->post('rec'));
      $this->db->where('username',$user);
      $query = $this->db->get('students');
      if ($query->num_rows != 1) 
        return false;

      $data = array('password' => $this->encrypt->sha1($this->input->post('password')."jithu$&"),'recoverykey'=>"");
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
    }
    public function recover($value)
    {
        $this->db->where('recoverykey', $value);
        $query = $this->db->get('faculty');
        $row = $query->row();
        if ($query->num_rows == 1) 
        return $row->username;
         else return "";
    }
    public function check_username_exists(){
        $username = $this->security->xss_clean($this->input->post('username'));
        $this->db->where('username', $username);
        $query = $this->db->get('faculty');
        if($query->num_rows != 0)
        {
            return true;
        }else{
            return false;
        }
    }

	const DB_TABLE = 'faculty';
	const DB_TABLE_PK = 'username';
	
	
	public $faculty_id;
	
	public $username;
	
	public $password;

    public function forgot_pwd($value='')
    {
        $email  = $this->input->post('email');
        $this->db->where('email', $email);
        $query = $this->db->get('faculty');

        // Let's check if there are any results
        if ($query->num_rows == 1) {
            $recoverykey= random_string('alnum', 50);
             $data = array('recoverykey' => $recoverykey);
              $query = $this->db->where('email' , $email);
              $this->send_mail($email,"Password reset link","Use the following link to reset your password ".base_url()."index.php/placement/home/resetpwd/resetpwd/".$recoverykey."");
             
             return $this->db->update('faculty', $data);
        }else{
            return FALSE;
        }

    }
public function send_mail($mail,$sub,$msg)
    {$this->load->library('email');
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

      //echo $this->email->print_debugger();
    }
	public function check_login(){
        $this->load->library('encrypt');
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password',sha1($password."jithu$&"));
        
        // Run the query
        $query = $this->db->get('faculty');
        // Let's check if there are any results
        if($query->num_rows() == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();

            if($row->valid ==0)
                return "PENDING";
            if($row->valid == -1)
                return "REJECT";
            $data = array(
                    'username' => $row->username,
                    'type' => 'faculty',
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}

?>