<?php

class Usuarios extends CI_Controller {

    public function verificar_sessao() {

        if ($this->session->userdata('logado') == false) {
            redirect('login');
        }
    }

    // Register user
    public function novo() {
        $this->verificar_sessao();
        $data['titulo'] = 'Cadastrar';

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('usuarios/cadastro', $data);
        } else {
            // Encrypt password
            $enc_password = md5($this->input->post('password'));

            $this->usuario_model->register($enc_password);

            // Set message
            $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

            redirect('posts');
        }
    }

    // Log in user
    public function login() {
        $data['titulo'] = 'Sign In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('usuarios/login', $data);
        } else {

            // Get username
            $username = $this->input->post('username');
            // Get and encrypt the password
            $password = md5($this->input->post('password'));

            // Login user
            $user_id = $this->usuario_model->login($username, $password);

            if ($user_id) {
                // Create session
                $user_data = array(
                    'usuario_id' => $user_id,
                    'username' => $username,
                    "logado" => true,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect('posts/criar');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Login is invalid');

                redirect('usuarios/login');
            }
        }
    }

    // Log user out
    public function logout() {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('usuario_id');
        $this->session->unset_userdata('username');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('usuarios/login');
    }

    // Check if username exists
    public function check_username_exists($username) {
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
        if ($this->usuario_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }

    // Check if email exists
    public function check_email_exists($email) {
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
        if ($this->usuario_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }

}
