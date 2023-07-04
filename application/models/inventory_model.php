<?php

class Inventory_Model extends CI_model{

    public function get_inventory(){
        $this->db->select('*');
        $this->db->from('inventory');
        $this->db->order_by('date_received', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
?>