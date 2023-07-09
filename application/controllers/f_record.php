<?php

class F_record extends CI_Controller {

    public function index() {
        $this->load->model("Accounting_Model");
        $data['products'] = $this->Accounting_Model->get_financialRec();
        $this->load->view('financial_record', $data);
    }
}
?>