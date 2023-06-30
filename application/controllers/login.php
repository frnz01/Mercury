<?php

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login_ui');
    }

    public function authenticate(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Login_model->get_user($username, $password);

        If($user){
            //check if admin
            // if($user->user_role === 'Administrator'){
                $userdata = array (
                    'userid' => $user->userid,
                    'username' => $user->username,
                    'password' => $user->password,
                    'user_role' => $user->user_role,
                    'date_created' => $user->date_created,
                );
                $this->session->set_userdata('user', $userdata);
                redirect('dashboard');
            // }
           
        }else{
            $data['error'] = 'Invalid username or password';
            echo '<script> alert("' . $data['error'] . '");</script>';
            $this->load->view('login_ui', $data);

        }
    }

    public function logout(){
        $this->session->unset_userdata('user');
        redirect('login');
    }   
}
?>
