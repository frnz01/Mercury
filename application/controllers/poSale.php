<?php

class PoSale extends CI_Controller {

    public function index() {
        $this->load->model("Sale_Model");
        $data['products'] = $this->Sale_Model->get_products();
        $this->load->view('pos', $data);
    }
}
?>