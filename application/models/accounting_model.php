<?php
class Accounting_Model extends CI_model{
   
    public function get_payments(){
        $this->db->select('*');
        $this->db->from('purchase');
        $this->db->where('payment', 'Unpaid');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_financialRec(){

        $this->db->select('payment_record.*, purchase.p_name, purchase.p_price, purchase.quantity');
        $this->db->from('payment_record');
        $this->db->join('purchase', 'payment_record.p_id = purchase.p_id');
        $this->db->order_by('payment_record.payment_date', 'DESC');
        
        $query = $this->db->get();
        return $query->result();

    }

    public function update_payment($p_id)
{
    $data = array(
        'payment' => 'Paid'
    );

    $this->db->where('p_id', $p_id);
    $this->db->update('purchase', $data);
}

public function update_paymentAll($p_id)
{
  $data = array(
    'payment' => 'Paid'
  );

  $this->db->where('p_id', $p_id);
  $this->db->update('purchase', $data);
}



}
?>