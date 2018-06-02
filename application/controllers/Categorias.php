<?php

class Categorias extends CI_Controller {

    public function verificar_sessao() {

        if ($this->session->userdata('logado') == false) {
            redirect('login');
        }
    }

    public function index() {
        $data['titulo'] = 'Categorias';

        $data['categorias'] = $this->categoria_model->get_categorias();

        $this->load->view('categorias/index', $data);
    }

    public function criar() {
        $this->verificar_sessao();
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('usuarios/login');
        }

        $data['title'] = 'Criar Categoria';

        $this->form_validation->set_rules('nome', 'Nome', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('categorias/criar', $data);
        } else {
            $this->categoria_model->criar_categoria();

            // Set message
            $this->session->set_flashdata('categoria_criar', 'Sua Categoria foi criada');

            redirect('categorias');
        }
    }

    public function posts($id) {
        $data['titulo'] = $this->categoria_model->get_categoria($id)->name;

        $data['posts'] = $this->post_model->get_posts_by_categoria($id);

        $this->load->view('posts/index', $data);
    }

    public function deletar($id) {
        $this->verificar_sessao();
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('usuarios/login');
        }

        $this->categoria_model->deletar_categoria($id);

        // Set message
        $this->session->set_flashdata('categoria_deletar', 'A Categoria Foi Deletada');

        redirect('categorias');
    }

}
