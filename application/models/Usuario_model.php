<?php

class Usuario_model extends CI_Model {

    public function register($enc_password) {
        // User data array
        $data = array(
            'nome' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'telefone' => $this->input->post('telefone')
        );

        // Insert user
        return $this->db->insert('usuario', $data);
    }

    // Log user in
    public function login($username, $password) {
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('usuario');

        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    // Check username exists
    public function check_username_exists($username) {
        $query = $this->db->get_where('usuario', array('username' => $username));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

    // Check email exists
    public function check_email_exists($email) {
        $query = $this->db->get_where('usuario', array('email' => $email));
        if (empty($query->row_array())) {
            return true;
        } else {
            return false;
        }
    }

}
