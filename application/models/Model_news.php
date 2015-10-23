<?php

/**
* 
*/
class Model_news extends CI_Model
{	

    public function get_news() {
        $query = $this->db->get('news');
        return $query->result_array();

    }

    public function add_news()
    {
    	$data = array(
   'title' => $this->input->post('title') ,
   'desc' => $this->input->post('desc') 
);

return $this->db->insert('news', $data); 
    }

    public function news_delete($id)
    {
       // echo $id;
        return $this->db->delete('news', array('id' => $id));
    }

    
}

?>