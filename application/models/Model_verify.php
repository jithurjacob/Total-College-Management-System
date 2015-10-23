<?php

class Model_verify extends CI_Model
{	

public function validate($table,$operation)
{
    $valid=$operation=="accept"?1:-1;
     $qr="update ".$table." set valid=".$valid." where username='".$this->security->xss_clean($this->input->post('username'))."'";
    return $this->db->simple_query($qr);
}
public function get_newreg($table)
    {
        if($table=="student")
            $qr="select students.name,username,mobno,email,admnno,regno,rollno,branches.name as branch,semesters.name as semester,year_pass from students join branches on branches.id=students.branch join semesters on semesters.id=students.semester where students.valid=0 and students.semester<9";
        else if($table=="alumni")
            $qr="select students.name,username,mobno,email,admnno,regno,branches.name as branch,year_pass from students join branches on branches.id=students.branch where students.valid=0 and students.semester=9";
        else
            $qr="facult";
        $query = $this->db->query($qr);
        return $query->result_array();
    }
public function checkEmail()
{
	
        $email = $this->security->xss_clean($this->input->post('email'));
        //$this->db->where('email', $email);
         $qr="select email from admin where email='$email' union select email from faculty where email='$email' union select email from students where email='$email'";
        $query = $this->db->query($qr);
        if($query->num_rows() == 0)
        {
            return true;
        }else{
            return false;
        }
    
}
public function checkUsername()
{
	
        $username = $this->security->xss_clean($this->input->post('username'));
        //$this->db->where('username', $username);
         $qr="select username from admin where username='$username' union select username from faculty where username='$username' union select username from students where username='$username'";
        $query = $this->db->query($qr);
        if($query->num_rows() == 0)
        {
            return true;
        }else{
            return false;
        }
    
}

}


?>