<?php

class User_Model extends CI_model{

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

    public function update_user($userid, $username, $password, $user_role)
{
    $data = array(
        'username' => $username,
        'password' => $password,
        'user_role' => $user_role
    );

    $this->db->where('userid', $userid);
    $this->db->update('tbl_user', $data);
}

    
}
?>

