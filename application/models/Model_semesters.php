<?php

/**
* 
*/
class Model_semesters extends CI_Model
{	

    public function get_semesters() {
        $query = $this->db->get('semesters');
        return $query->result_array();

    }

    public function get_current_semesters() {
        $query = $this->db->query('select * from semesters where id in (select id from current_sem)');
        return $query->result_array();

    }
}

?>