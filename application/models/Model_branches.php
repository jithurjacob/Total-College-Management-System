<?php

/**
* 
*/
class Model_branches extends CI_Model
{	

    public function get_branches() {
    	$this->db->order_by('name', 'ASC');
        $query = $this->db->get('branches');
        return $query->result_array();

    }
     public function get_branches_current() {
    	$this->db->order_by('name', 'ASC');
    	$this->db->where('valid', '1');
        $query = $this->db->get('branches');
        return $query->result_array();

    }
    public function get_branches_current_() {
    	//$this->db->order_by('name', 'ASC');
    	//$this->db->where('valid', '1');
        //$query = $this->db->get('branches');
        $query = $this->db->query("select b.id as b_id,b.name as b_name,b.hod,f.name as f_name,(select count(student_id) from students s where s.branch=b.id and s.semester<9 ) as current_count,(select count(student_id) from students s where s.branch=b.id and s.semester=9 ) as previous_count from branches b 
			left join faculty f on b.hod=f.faculty_id
			where b.valid=1 
			group by b.id
			order by b.name");
        return $query->result_array();

    }
     public function get_branches_previous() {
    	// $this->db->order_by('name', 'ASC');
    	// $this->db->where('valid', '-1');
     //    $query = $this->db->get('branches');
     	$query = $this->db->query("select b.id as b_id,b.name as b_name,b.hod,f.name as f_name,(select count(student_id) from students s where s.branch=b.id and s.semester<9 ) as current_count,(select count(student_id) from students s where s.branch=b.id and s.semester=9 ) as previous_count from branches b 
			left join faculty f on b.hod=f.faculty_id
			where b.valid=-1 
			group by b.id
			order by b.name");
        return $query->result_array();

    }
}

?>