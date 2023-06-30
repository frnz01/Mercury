<?php

// class User extends CI_Controller{
//     public function index()
//     {
//         $this->load->model("User_Model");
//         $data['users'] = $this->User_Model->get_users();
//         $this->load->view('show_user', $data);
//     }
// }

class User extends CI_Controller {
    public function index()
    {
        $this->load->model("User_Model");

        // Check if the form is submitted
        // if ($this->input->post('save_user')) {
            // Get the form data
            // $username = $this->input->post('username');
            // $password = $this->input->post('password');
            // $user_role = $this->input->post('role');
            // $date_created = $this->input->post('date_created');

            // Create a new user
        //     $this->User_Model->create_user($username, $password, $user_role, $date_created);
        // }

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

    
}


?>