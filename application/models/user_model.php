<?php
// class User_Model extends CI_model{
//     private $userid;
//     private $username;
//     private $password;
//     private $user_role;
//     private $date_created;

//     public function get_user(){
//         $this->db->select('*');
//         $this->db->from('tbl_user');
//         $query = $this->db->get();
//         // $query->num_rows();
//         return $query->row();
//     }
// }

class User_Model extends CI_model{
    private $userid;
    private $username;
    private $password;
    private $user_role;
    private $date_created;

    public function get_users(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $query = $this->db->get();
        return $query->result();
    }

    public function create_user($username, $password, $user_role, $date_created)
    {
        $data = array(
            'username' => $username,
            'password' => $password,
            'user_role' => $user_role,
            'date_created' => $date_created
        );
    
        $this->db->insert('tbl_user', $data);
    }
    
}
?>

