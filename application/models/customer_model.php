<?php
class Customer_Model extends CI_model{
    private $CustomerID;
    private $name;
    private $contact_no;
    private $address;
    public function get_customer(){
        $this->db->select('*');
        $this->db->from('customer');
        $query = $this->db->get();
        $query->num_rows();
        return $query->row();
    }
}
?>