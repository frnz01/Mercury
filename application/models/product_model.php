<?php

class Product_Model extends CI_model{

    public function get_products(){
        $this->db->select('*');
        $this->db->from('tbl_products');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_lowStock(){
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('stock <= 10');
        $query = $this->db->get();
        return $query->result();
    }
    
}
?>