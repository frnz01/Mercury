<?php
class Sales_rep extends CI_Controller{

    public function index(){
        $this->load->model('Sale_Model');
        $data['reports'] = $this->Sale_Model->getRecords();
        $this->load->view('sales_record', $data);
    }
}

?>