<?php

class Purchase_Model extends CI_model{

    public function get_lowStock(){
        $this->db->select('*');
        $this->db->from('tbl_products');
        $this->db->where('stock <= 10');
        $query = $this->db->get();
        return $query->result();
    }

    public function create_purchase($username, $p_id, $p_name, $p_price, $quantity, $supplier, $date_purchase, $total)
    {
        $data = array(
            'username' => $username,
            'p_id' => $p_id,
            'p_name' => $p_name,
            'p_price' => $p_price,
            'quantity' => $quantity,
            'supplier' => $supplier,
            'date_purchase' => $date_purchase,
            'total' => $total
        );
    
        $this->db->insert('purchase', $data);
    }
    
    public function get_paid()
    {
        $currentDate = date('Y-m-d');
        
        $this->db->select('purchase.*, inventory.status');
        $this->db->from('purchase');
        $this->db->join('inventory', 'purchase.p_id = inventory.p_id');
        // $this->db->where('DATE(purchase.date_purchase)', $currentDate);
        $this->db->where('purchase.payment', 'Paid');
        $this->db->where('inventory.status', 'Incomplete');
        
        $query = $this->db->get();
        return $query->result();
    }
    

    public function update_status($p_id)
{
    $data = array(
        'status' => 'Complete'
    );

    $this->db->where('p_id', $p_id);
    $this->db->update('inventory', $data);
}
    
    
}
?>