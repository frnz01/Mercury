<?php

class Payment extends CI_Controller {

    public function index() {
        $this->load->model("Accounting_Model");
        $products = $this->Accounting_Model->get_payments();
    
        // Group products by supplier and calculate the total for each group
        $products_by_supplier = array();
        foreach ($products as $prod) {
            $supplier = $prod->supplier;
    
            // If the supplier doesn't exist in the array, initialize an empty array for it
            if (!isset($products_by_supplier[$supplier])) {
                $products_by_supplier[$supplier] = array(
                    'products' => array(),
                    'total' => 0
                );
            }
    
            // Add the product to the corresponding supplier array
            $products_by_supplier[$supplier]['products'][] = $prod;
    
            // Calculate the total for the supplier
            $products_by_supplier[$supplier]['total'] += $prod->total;
        }
    
        $data['products_by_supplier'] = $products_by_supplier;
        
        $this->load->view('payment_ui', $data);
    }

    public function update()
    {
    $this->load->model('Accounting_Model'); 

    $data = array(
        'p_id' => $this->input->post('p_id'),
    );
    $this->Accounting_Model->update_payment(
        $data['p_id']
    );
    redirect('payment');
    }

    public function updateAll()
    {
      $this->load->model('Accounting_Model');
    
      $productIds = $this->input->post('productIds'); // Assuming POST method is used
      $productIdsArray = explode(',', $productIds); // Convert the comma-separated string to an array
    
      var_dump($productIds); // Display the value of $productIds
      var_dump($productIdsArray); // Display the value of $productIdsArray
    
      foreach ($productIdsArray as $productId) {
        $this->Accounting_Model->update_paymentAll($productId);
      }
    
      redirect('payment');
    }
    


    
    
}
?>