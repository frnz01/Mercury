<?php

class I_records extends CI_Controller {

    public function index() {
        $this->load->model("Inventory_Model");
        $data['products'] = $this->Inventory_Model->get_inventory();
        $this->load->view('inventory_records', $data);
    }
}
?>