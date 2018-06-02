<?php

class Posts extends CI_Controller {

    public function verificar_sessao() {

        if ($this->session->userdata('logado') == false) {
            redirect('login');
        }
    }
    public function index($offset = 0) {
        // Pagination Config	
        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['attributes'] = array('class' => 'pagination-link');

        // Init Pagination
        $this->pagination->initialize($config);

        $data['titulo'] = 'Últimos Posts';

        $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);
   
        
         $this->load->model("categoria_model");

        $data['categorias'] = $this->categoria_model->get_categorias();

        $this->load->view('posts/index', $data);
    }

    public function visualizar($slug = NULL) {
        $data['post'] = $this->post_model->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comentarios'] = $this->comentario_model->get_comentarios($post_id);
       $totalComentarios =  count($data['comentarios']);

       $data['totalComentarios'] =$totalComentarios;
        if (empty($data['post'])) {
         
            show_404();
        }

        $data['titulo'] = $data['post']['titulo'];

        $this->load->view('posts/visualizar', $data);
    }

    public function criar() {
   $this->verificar_sessao();

        $data['titulo'] = 'Criar Post';

        $data['categorias'] = $this->post_model->get_categorias();

        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('conteudo', 'Conteudo', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('posts/criar', $data);
        } else {
            // Upload Image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $errors = array('error' => $this->upload->display_errors());
                $post_image = 'noimage.jpg';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $post_image = $_FILES['userfile']['name'];
            }

            $this->post_model->criar_post($post_image);

            // Set message
            $this->session->set_flashdata('post_criado', 'Seu Post Foi Criado');

            redirect('posts');
        }
    }

    public function deletar($id) {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('usuarios/login');
        }

        $this->post_model->deletar_post($id);

        // Set message
        $this->session->set_flashdata('post_deleted', 'Your post has been deleted');

        redirect('posts');
    }

    public function editar($slug) {
   

        $data['post'] = $this->post_model->get_posts($slug);

        if ($this->session->userdata('usuario_id') != $this->post_model->get_posts($slug)['usuario_id']) {
            redirect('posts');
        }

        $data['categorias'] = $this->post_model->get_categorias();

        if (empty($data['post'])) {
            show_404();
        }

        $data['titulo'] = 'Editar Post';

        $this->load->view('posts/editar', $data);
    }

    public function update() {
        // Check login
        if (!$this->session->userdata('logged_in')) {
            redirect('usuarios/login');
        }

        $this->post_model->update_post();

        // Set message
        $this->session->set_flashdata('post_updated', 'Seu Post foi Atualizado');

        redirect('posts');
    }

}
