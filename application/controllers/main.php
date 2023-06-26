<?php
class Main extends CI_Controller{
    public function index()
    {
        $this->load->model("Customer_Model");
        $data['customer'] = $this->Customer_Model->get_customer();
        $this->load->view('show_customer', $data);
    }
}
?>