<?php
class Cate_model extends CI_Model {

    public function __construct()
    {

        parent::__construct();
        $this->load->database();
        // Your own constructor code
    }

    public function getItems() {
    	$query = $this->db->query("select * from cates");
    	return $query->result_array();
    }

}


?>