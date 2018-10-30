<?php
class Label_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getItems() {
    	$query = $this->db->query("select * from labels");
    	return $query->result_array();
    }



}


?>
