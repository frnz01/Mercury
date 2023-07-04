<?php

class Purchase extends CI_Controller {

    public function index() {
        $this->load->model("Purchase_Model");
        $data['products'] = $this->Purchase_Model->get_lowStock();
        $this->load->view('manage_purchase', $data);
    }

    public function add()
    {
        $this->load->model('Purchase_Model'); // Load the User_Model
    
        $data = array(
            'username' => $this->input->post('username'),
            'p_id' => $this->input->post('p_id'),
            'p_name' => $this->input->post('p_name'),
            'p_price' => $this->input->post('p_price'),
            'quantity' => $this->input->post('quantity'),
            'supplier' => $this->input->post('supplier'),
            'date_purchase' => $this->input->post('date_purchase'),
            'total' => $this->input->post('total'),
        );
        $this->Purchase_Model->create_purchase(
            $data['username'],
            $data['p_id'],
            $data['p_name'],
            $data['p_price'],
            $data['quantity'],
            $data['supplier'],
            $data['date_purchase'],
            $data['total']
        );
        $this->session->set_flashdata('purchase_success', true);
        redirect('purchase');
    }

    public function update()
{
    $this->load->model('Purchase_Model'); // Load the Purchase_Model

    $p_id = $this->input->post('p_id');
    $this->Purchase_Model->update_status($p_id);

    redirect('n_arrival');
}

}
?>