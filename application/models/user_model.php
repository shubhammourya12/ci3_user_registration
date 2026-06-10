<?php

class User_model extends CI_Model {

    // GET ALL USERS
    public function getAllUsers() {
        return $this->db->get('users')->result();
    }

    // INSERT USER
    public function insertUser($data) {
        return $this->db->insert('users', $data);
    }

    // GET SINGLE USER
    public function getUserById($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    // UPDATE USER
    public function updateUser($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }

    // DELETE USER
    public function deleteUser($id) {
        return $this->db->where('id', $id)->delete('users');

    }

public function getUserCount($search = '') {

    if(!empty($search)) {

        $this->db->group_start();

        $this->db->like('name', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('city', $search);

        $this->db->group_end();
    }

    return $this->db->count_all_results('users');
}



public function getUsersPagination($limit, $start, $search = '') {

    if(!empty($search)) {

        $this->db->group_start();

        $this->db->like('name', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('city', $search);

        $this->db->group_end();
    }

    $this->db->limit($limit, $start);

    return $this->db->get('users')->result();
}
}