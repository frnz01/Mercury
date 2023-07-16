<?php
class Sale_Model extends CI_model{
   
    public function get_products(){
        $this->db->select('*');
        $this->db->from('tbl_products');
        $query = $this->db->get();
        return $query->result();
    }

    public function addOrder($productId, $quantity, $total, $customerName, $username) {
        // Perform operations to add the order details to the database
        // You can customize this method based on your database structure and requirements
        
        // Example code to insert the order details into the 'orders' table
        $currentDate = date('Y-m-d H:i:s');
        $data = array(
          'cus_name' => $customerName,
          'emp_name' => $username,
          'p_id' => $productId,
          'quantity' => $quantity,
          'total' => $total,
          'date' => $currentDate
        );
        $this->db->insert('sales', $data);

        if ($this->db->error()) {
            log_message('error', 'Database Error: ' . $this->db->error()['message']);
            // Or display the error message
            // echo 'Database Error: ' . $this->db->error()['message'];
        }


      }
      public function addReport($amount, $change, $overallTotal, $customerName, $username) {
        // Perform operations to add the order details to the database
        // You can customize this method based on your database structure and requirements
        
        // Example code to insert the order details into the 'orders' table
        $currentDate = date('Y-m-d H:i:s');
        $data = array(
          'customer' => $customerName,
          'cashier' => $username,
          'total_amount' => $overallTotal,
          'payment' => $amount,
          'change' => $change,
          'date' => $currentDate
        );
        $this->db->insert('sales_report', $data);

        if ($this->db->error()) {
            log_message('error', 'Database Error: ' . $this->db->error()['message']);
            // Or display the error message
            // echo 'Database Error: ' . $this->db->error()['message'];
        }


      }

      public function getRecords(){
        $this->db->select('*');
        $this->db->from('sales_report');
        $query = $this->db->get();
        return $query->result();
      }

}
?>