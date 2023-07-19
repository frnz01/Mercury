<?php

class Dashboard extends CI_Controller {

    public function index() {
        $data = array();
        $data['sales'] = $this->sales();
        $this->load->view('dashboard', $data);
    }

    public function sales() {
        $this->load->model('Sale_Model');
        return $this->Sale_Model->getSales();
    }
}
?>