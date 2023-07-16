<?php

class PoSale extends CI_Controller {

    public function index() {
        $this->load->model("Sale_Model");
        $data['products'] = $this->Sale_Model->get_products();
        $this->load->view('pos', $data);
    }

    
    // cashier payment

    public function cash_payment()
    {
        $this->load->model('Sale_Model');
    
        // Retrieve the form data
        $customerName = $this->input->post('customer_name');
        $username = $this->input->post('username');
        $amount = $this->input->post('amount');
        $change = $this->input->post('change');
        $orderDetails = $this->input->post('orderDetails');
        $overallTotal = $this->input->post('overallTotal');

    
        // Perform any necessary processing with the form data
        // Update the database, perform calculations, etc.
    
        // Loop through the order details
        foreach ($orderDetails as $orderDetail) {
            $productId = $orderDetail['p_id'];
            $quantity = $orderDetail['quantity'];
            $total = $orderDetail['total'];
    
            // Perform operations with the individual order details
            // Update the database, perform calculations, etc.
            $this->Sale_Model->addOrder($productId, $quantity, $total, $customerName, $username);
        }

        $this->Sale_Model->addReport($amount, $change, $overallTotal, $customerName, $username);
    
        // Construct the response data
        $response = array(
            'status' => 'success',
            'message' => 'Payment successful',
          );

          // Set the JSON content type header
          header('Content-Type: application/json');

          // Return the response as JSON
          echo json_encode($response);

            }
    

    
}
?>