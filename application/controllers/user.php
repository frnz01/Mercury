<?php
class User extends CI_Controller {
    public function index()
    {
        $this->load->model("User_Model");
        $data['users'] = $this->User_Model->get_users();
        $this->load->view('show_user', $data);
    }
 
    public function add()
{
    $this->load->model('User_Model'); // Load the User_Model

    $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'user_role' => $this->input->post('user_role'),
        'date_created' => $this->input->post('date_created'),
    );
    $this->User_Model->create_user(
        $data['username'],
        $data['password'],
        $data['user_role'],
        $data['date_created']
    );
    redirect('user');
}

public function update()
{
    $this->load->model('User_Model'); // Load the User_Model

    $data = array(
        'userid' => $this->input->post('userid'),
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password'),
        'user_role' => $this->input->post('user_role'),
    );
    $this->User_Model->update_user(
        $data['userid'],
        $data['username'],
        $data['password'],
        $data['user_role']
    );
    redirect('user');
}


    
}


?>