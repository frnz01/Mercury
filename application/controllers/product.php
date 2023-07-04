<?php
class Product extends CI_Controller {
    public function index()
    {
        $this->load->model("Product_Model");
        $data['products'] = $this->Product_Model->get_products();
        $this->load->view('all_products', $data);
    }

    public function lowStock()
    {
        $this->load->model("Product_Model");
        $data['products'] = $this->Product_Model->get_lowStock();
        $this->load->view('all_products', $data);
    }
}
?>