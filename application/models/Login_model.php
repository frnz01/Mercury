<?php
class Login_model extends CI_Model {

    public function get_user($username, $password){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get();
        // $query->num_rows();
        return $query->row();
    }
}
?>

