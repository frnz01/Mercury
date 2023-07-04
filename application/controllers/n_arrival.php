<?php

class N_arrival extends CI_Controller {

    public function index() {
        $this->load->model("Purchase_Model");
        $data['products'] = $this->Purchase_Model->get_paid();
        $this->load->view('new_arrival', $data);
    }
}
?>