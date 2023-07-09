<?php
class Sale_Model extends CI_model{
   
    public function get_products(){
        $this->db->select('*');
        $this->db->from('tbl_products');
        $query = $this->db->get();
        return $query->result();
    }

}
?>