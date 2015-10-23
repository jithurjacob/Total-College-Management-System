<?php

/**
 *
 */
class Model_marks extends CI_Model {

	public function performance($regno='*')
	{
		
       
       if($regno=='*'){
       	 $branch  = $this->session->userdata('branch');
       
       	$year_pass  = $this->session->userdata('year_pass');

		
		}else{

			$row=$this->year_branch($regno[0]);

			$branch=$row->branch;
			$year_pass=$row->year_pass;

		}

		$this->db->select('regno , sem , percent');
		 $this->db->where('branch',$branch);
		
         $this->db->where('year_pass', $year_pass);
         $this->db->where('valid',"1");
        $this->db->order_by("sem", "asc"); 
       // var_dump($this->db);
        $query = $this->db->get('marks');

        return $query->result_array();
	}
public function year_branch($regno)
{			
			//$query1 = $this->db->get('students');
			
			//$this->db->where('regno',$regno);
			$query1 = $this->db->query("SELECT * FROM students WHERE regno = '$regno'");
			return $query1->row();
}
public function status()
{
       
       $this->db->select('valid');
       
       $query = $this->db->get('marks');
        return $query->result_array();
}
public function profileview($regno)
	{
		

		$this->db->where('regno', $regno);
		$this->db->where('valid', "1");
		$query = $this->db->get('marks');
		return $query->result_array();
	}
public function search()
	{
		$branch=$this->input->post('branch');
		
		$year_pass_min = $this->input->post('year_pass_min');
		$year_pass_max = $this->input->post('year_pass_max');

		//$this->db->select('regno,branch,year_pass,sem,total,percent,arriers,allpass');

		
		$this->db->where('year_pass >=', $year_pass_min);
		$this->db->where('year_pass <=', $year_pass_max);
		if($branch!="ALL")
		$this->db->where('branch', $branch);
		$this->db->where('valid', "1");
		
		$query = $this->db->get('marks');

		return $query->result_array();
	}
	public function addmarks()
	{
		/*
		`regno`, `branch`, `year_pass`, `sem`, `sub1`, `sub1_status`, `sub2`, `sub2_status`, `sub3`, `sub3_status`, `sub4`, `sub4_status`, `sub5`, `sub5_status`, `sub6`, `sub6_status`, `sub7`, `sub7_status`, `sub8`, `sub8_status`, `sub9`, `sub9_status`, `sub10`, `sub10_status`, `sub11`, `sub11_status`, `total`, `percent`, `allpass`
		*/
		$regno  = $this->session->userdata('regno');
		$branch  = $this->session->userdata('branch');
		$year_pass  = $this->session->userdata('year_pass');
		$sem=$this->input->post('add_semester');
		$sub1=$this->input->post('sub1');
		$sub2=$this->input->post('sub2');
		$sub3=$this->input->post('sub3');
		$sub4=$this->input->post('sub4');
		$sub5=$this->input->post('sub5');
		$sub6=$this->input->post('sub6');
		$sub7=$this->input->post('sub7');
		$sub8=$this->input->post('sub8');
		$sub9=$this->input->post('sub9');
		$sub10=$this->input->post('sub10');
		$sub11=$this->input->post('sub11');
		$sub12=$this->input->post('sub12');
		$sub1_status=$this->input->post('sub1_status');
		$sub2_status=$this->input->post('sub2_status');
		$sub3_status=$this->input->post('sub3_status');
		$sub4_status=$this->input->post('sub4_status');
		$sub5_status=$this->input->post('sub5_status');
		$sub6_status=$this->input->post('sub6_status');
		$sub7_status=$this->input->post('sub7_status');
		$sub8_status=$this->input->post('sub8_status');
		$sub9_status=$this->input->post('sub9_status');
		$sub10_status=$this->input->post('sub10_status');
		$sub11_status=$this->input->post('sub11_status');
		$sub12_status=$this->input->post('sub12_status');
		$total=$this->input->post('total');
		$percent=$this->input->post('percent');

		$total_=$sub1+$sub2+$sub3+$sub4+$sub5+$sub6+$sub7+$sub8+$sub9+$sub10+$sub11+$sub12;
		if($total_!=$total)
			return FALSE;
		if ($sem == '2')
			if($this->session->userdata('year_pass')<2015)
            $percent_=(($total_ / 1550) * 100);
        	else
        		$percent_=(($total_ / 1650) * 100);
         else if ($sem == '7')
            $percent_=(($total_ / 1050) * 100);
        else if ($sem == '8')
            $percent=(($total / 1000) * 100);
        else
            $percent_=(($total / 1100) * 100);

        if($percent_!=$percent)
			return FALSE;
		
		$arriers=0;
		$arr=array($sub1_status,$sub2_status,$sub3_status,$sub4_status,$sub5_status,$sub6_status,$sub7_status,$sub8_status,$sub9_status,$sub10_status,$sub11_status,$sub12_status);
		$this->db->where('regno', $regno);
		$this->db->where('sem', $sem);
		$query = $this->db->get('marks');
		if ($query->num_rows != 0)
			return FALSE;

		$allpass=FALSE;
		switch ($sem) {
			case '2':
			if($this->session->userdata('year_pass')<2015)
				if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS" && $sub7_status=="PASS" && $sub8_status=="PASS" && $sub9_status=="PASS" && $sub10_status=="PASS" && $sub11_status=="PASS")
					$allpass=TRUE;
			else
				if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS" && $sub7_status=="PASS" && $sub8_status=="PASS" && $sub9_status=="PASS" && $sub10_status=="PASS" && $sub11_status=="PASS" && $sub12_status=="PASS")
					$allpass=TRUE;	
				break;
			case '3' :
			case '4' :
			case '5' :
			case '6' :
			
			if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS" && $sub7_status=="PASS" && $sub8_status=="PASS")
					$allpass=TRUE;
				$temp_=array_slice($arr,0,8);
				$arriers=$this->find_arriers($temp_);
				
				break;
			case '7' :
			if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS" && $sub7_status=="PASS" && $sub8_status=="PASS" && $sub9_status=="PASS" )
					$allpass=TRUE;
				$temp_=array_slice($arr,0,9);
				$arriers=$this->find_arriers($temp_);
				
			break;	
			case '8' :
			if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS")
					$allpass=TRUE;
				$temp_=array_slice($arr,0,6);
				$arriers=$this->find_arriers($temp_);
				
				break;
			default:
				# code...
				break;
		}
		
		$data = array('regno' => $regno, 'branch' => $branch, 'year_pass' => $year_pass , 'sem' => $sem,   'sub1' => $sub1, 'sub1_status' => $sub1_status, 'sub2' => $sub2, 'sub2_status' => $sub2_status,  'sub3'=> $sub3, 'sub3_status' => $sub3_status, 'sub4' => $sub4, 'sub4_status' => $sub4_status,
			'sub5' => $sub5, 'sub5_status' => $sub5_status, 'sub6' =>$sub6, 'sub6_status' =>$sub6_status,
			'sub7' => $sub7, 'sub7_status' => $sub7_status, 'sub8' =>$sub8, 'sub8_status' =>$sub8_status,'sub9' => $sub9, 'sub9_status' => $sub9_status, 'sub10' =>$sub10, 'sub10_status' =>$sub10_status, 'sub11' =>$sub11,'sub11_status' =>$sub11_status,'sub12' =>$sub12,'sub12_status' =>$sub12_status,
		 'total' => $total, 'percent' => $percent,'arriers'=>$arriers, 'allpass' => $allpass);

		//print_r($data);
		return $this->db->insert('marks', $data);
	}

public function editmarks()
	{
		/*
		`regno`, `branch`, `year_pass`, `sem`, `sub1`, `sub1_status`, `sub2`, `sub2_status`, `sub3`, `sub3_status`, `sub4`, `sub4_status`, `sub5`, `sub5_status`, `sub6`, `sub6_status`, `sub7`, `sub7_status`, `sub8`, `sub8_status`, `sub9`, `sub9_status`, `sub10`, `sub10_status`, `sub11`, `sub11_status`, `total`, `percent`, `allpass`
		*/
		$regno  = $this->session->userdata('regno');
		$branch  = $this->session->userdata('branch');
		$year_pass  = $this->session->userdata('year_pass');
		$sem=$this->input->post('edit_semester');
		$sub1=$this->input->post('edit_sub1');
		$sub2=$this->input->post('edit_sub2');
		$sub3=$this->input->post('edit_sub3');
		$sub4=$this->input->post('edit_sub4');
		$sub5=$this->input->post('edit_sub5');
		$sub6=$this->input->post('edit_sub6');
		$sub7=$this->input->post('edit_sub7');
		$sub8=$this->input->post('edit_sub8');
		$sub9=$this->input->post('edit_sub9');
		$sub10=$this->input->post('edit_sub10');
		$sub11=$this->input->post('edit_sub11');
		$sub12=$this->input->post('edit_sub12');
		$sub1_status=$this->input->post('edit_sub1_status');
		$sub2_status=$this->input->post('edit_sub2_status');
		$sub3_status=$this->input->post('edit_sub3_status');
		$sub4_status=$this->input->post('edit_sub4_status');
		$sub5_status=$this->input->post('edit_sub5_status');
		$sub6_status=$this->input->post('edit_sub6_status');
		$sub7_status=$this->input->post('edit_sub7_status');
		$sub8_status=$this->input->post('edit_sub8_status');
		$sub9_status=$this->input->post('edit_sub9_status');
		$sub10_status=$this->input->post('edit_sub10_status');
		$sub11_status=$this->input->post('edit_sub11_status');
		$sub12_status=$this->input->post('edit_sub12_status');
		$total=$this->input->post('edit_total');
		$percent=$this->input->post('edit_percent');


		$total_=$sub1+$sub2+$sub3+$sub4+$sub5+$sub6+$sub7+$sub8+$sub9+$sub10+$sub11+$sub12;
		if($total_!=$total)
			return FALSE;
		if ($sem == '2')
			if($this->session->userdata('year_pass')<=2015)
                $percent_=(($total_ / 1550) * 100);
        	else
        	    $percent_=(($total_ / 1650) * 100);
         else if ($sem == '7')
            $percent_=(($total_ / 1050) * 100);
        else if ($sem == '8')
            $percent=(($total / 1000) * 100);
        else
            $percent_=(($total / 1100) * 100);
//echo $percent.$percent_;
        if($percent_!=$percent)
			return FALSE;

		$arriers=0;
		$arr=array($sub1_status,$sub2_status,$sub3_status,$sub4_status,$sub5_status,$sub6_status,$sub7_status,$sub8_status,$sub9_status,$sub10_status,$sub11_status,$sub12_status);
		
		$this->db->where('regno', $regno);
		$this->db->where('sem', $sem);
		$query = $this->db->get('marks');
		if ($query->num_rows != 1)
			return FALSE;

		$allpass=FALSE;
		switch ($sem) {
			case '2':
			if($this->session->userdata('year_pass')<2015)
				if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS" && $sub7_status=="PASS" && $sub8_status=="PASS" && $sub9_status=="PASS" && $sub10_status=="PASS" && $sub11_status=="PASS")
					$allpass=TRUE;
				else
					if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS" && $sub7_status=="PASS" && $sub8_status=="PASS" && $sub9_status=="PASS" && $sub10_status=="PASS" && $sub11_status=="PASS" && $sub12_status=="PASS")
					$allpass=TRUE;
				if($this->session->userdata('year_pass')<2015)
				$temp_=array_slice($arr,0,11);
			else
				$temp_=array_slice($arr,0,12);
				$arriers=$this->find_arriers($temp_);
				
				break;
			case '3' :
			case '4' :
			case '5' :
			case '6' :
			
			if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS" && $sub7_status=="PASS" && $sub8_status=="PASS")
					$allpass=TRUE;
				$temp_=array_slice($arr,0,8);
				$arriers=$this->find_arriers($temp_);
				
				break;
			case '7' :
			if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS" && $sub7_status=="PASS" && $sub8_status=="PASS" && $sub9_status=="PASS" )
					$allpass=TRUE;
				$temp_=array_slice($arr,0,9);
				$arriers=$this->find_arriers($temp_);
			
			break;	
			case '8' :
			if($sub1_status=="PASS" && $sub2_status=="PASS" && $sub3_status=="PASS" && $sub4_status=="PASS" && $sub5_status=="PASS" && $sub6_status=="PASS")
					$allpass=TRUE;
				$temp_=array_slice($arr,0,6);
				$arriers=$this->find_arriers($temp_);
				
				break;
			default:
				# code...
				break;
		}
		
		$data = array( 'branch' => $branch, 'year_pass' => $year_pass ,    'sub1' => $sub1, 'sub1_status' => $sub1_status, 'sub2' => $sub2, 'sub2_status' => $sub2_status,  'sub3'=> $sub3, 'sub3_status' => $sub3_status, 'sub4' => $sub4, 'sub4_status' => $sub4_status,
			'sub5' => $sub5, 'sub5_status' => $sub5_status, 'sub6' =>$sub6, 'sub6_status' =>$sub6_status,
			'sub7' => $sub7, 'sub7_status' => $sub7_status, 'sub8' =>$sub8, 'sub8_status' =>$sub8_status,
			'sub9' => $sub9, 'sub9_status' => $sub9_status, 'sub10' =>$sub10, 'sub10_status' =>$sub10_status,'sub11' =>$sub11,'sub11_status' =>$sub11_status,'sub12' =>$sub12,'sub12_status' =>$sub12_status,
		 'total' => $total, 'percent' => $percent,'arriers'=>$arriers, 'allpass' => $allpass,'valid'=>0,'verifier'=>'NULL');

        //print_r($data);
		

        $this->db->where('regno', $regno);
		$this->db->where('sem', $sem);
		return $this->db->update('marks', $data)  ;
	}
	public function find_arriers($arr)
	{$count=0;
		foreach ($arr as $key ) {
			if($key=="FAIL") $count++;

		}
		return $count;
	}
	public function unverified()
	{
		$data = array('verified' => '0' );
		$user  = $this->session->userdata('username');
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
		
	}
	public function verified()
	{
		$data = array('verified' => '1' );
		$this->load->library('encrypt');
		$user=$this->encrypt->decode($this->input->post('id'));
		
        $query = $this->db->where('username' , $user);
        return $this->db->update('students', $data);
		
	}
	public function get_marksdetails_students() {
		//$query = $this->db->get('students');
		//$user  = $this->session->userdata('username');
		$regno  = $this->session->userdata('regno');
		//$year_pass  = $this->session->userdata('year_pass');
		$this->db->order_by("sem", "asc"); 
		$query = $this->db->get_where('marks', array('regno' => $regno));
		return $query->result_array();

	}
	
	


	// back stds
	public function get_details() {
		//$query = $this->db->get('students');
		$user  = $this->session->userdata('username');
		$query = $this->db->get_where('students', array('username' => $user));
		return $query->result_array();

	}

	public function register() {
		$this->load->library('encrypt');
		$name      = $this->input->post('name');
		$username  = $this->input->post('username');
		$email     = $this->input->post('email');
		$password  = $this->encrypt->sha1($this->input->post('password')."jithu$&");
		$admnno    = $this->input->post('admnno');
		$regno     = $this->input->post('regno');
		$year_pass = $this->input->post('year_pass');

		$data = array('name' => $name, 'username' => $username, 'email' => $email, 'password' => $password, 'admnno' => $admnno, 'regno' => $regno, 'year_pass' => $year_pass);
		return $this->db->insert('students', $data);
	}

    // public function update() {
    //     $name      = $this->input->post('name');
    //     $gender  = $this->input->post('gender');
    //     $branch  = $this->input->post('branch');
    //     $semester  = $this->input->post('semester');
    //     $dob    = $this->input->post('dob');
    //     $perm_addr  = $this->input->post('perm_addr');
    //     $temp_addr   = $this->input->post('temp_addr');
    //     $mobno    = $this->input->post('mobno');
    //     $contactno = $this->input->post('contactno');
    //     $tenth  = $this->input->post('tenth');
    //     $twelth  = $this->input->post('twelth');
    //     $entrance_rank  = $this->input->post('entrance_rank');
    //     $year_pass  = $this->input->post('year_pass');
    //     $data = array('name' => $name, 'gender' => $gender, 'branch' => $branch, 'semester' => $semester,
    //      'dob' => $dob, 'perm_addr' => $perm_addr, 'temp_addr' => $temp_addr,'mobno'=>$mobno,
    //      'contactno'=>$contactno,'tenth'=>$tenth,'twelth'=>$twelth,'entrance_rank'=>$entrance_rank,'year_pass'=>$year_pass);
        
    //     $user  = $this->session->userdata('username');
    //     $query = $this->db->where('username' , $user);
    //     return $this->db->update('students', $data);
    // }
}
?>