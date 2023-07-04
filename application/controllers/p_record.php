<?php
class P_record extends CI_Controller {
    public function index()
    {
        $this->load->model("Purchase_Model");
        $data['products'] = $this->Purchase_Model->get_records();
        $this->load->view('purchase_record', $data);
    }

    // public function lowStock()
    // {
    //     $this->load->model("Product_Model");
    //     $data['products'] = $this->Product_Model->get_lowStock();
    //     $this->load->view('all_products', $data);
    // }
}
?>