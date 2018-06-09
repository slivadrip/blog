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
        $totalComentarios = count($data['comentarios']);

        $data['totalComentarios'] = $totalComentarios;
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
        public function procurar2() {

            echo 'teste';
            die();
        
        }
    

    public function procurar() {
        
           
        $this->load->model('post_model', 'post');
        $data['categorias'] = $this->categoria_model->get_categorias();
        
          if ($_GET || $this->uri->segment(5)) {
            $por_pagina = 2; //resultado por pagina
            $inicio = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0; // pega o inicio da consulta (limit)
            $post = ($this->input->get('q')) ? $this->input->get('q') : $this->uri->segment(3);
            $post = urldecode($post);

            $termo = $this->input->get('q');

            if ($inicio == 1) {
                $inicio = 0;
            }
            $posts_encontrados = $this->post->buscar_posts($post, $por_pagina, $inicio);
            if ($post == null) {
                $post = "tudo";

                $posts_encontrados = $this->post->buscar_posts($post, $por_pagina, $inicio);
            }

            if ($post == "tudo") {
                $posts_encontrados = $this->post->buscar_posts($post, $por_pagina, $inicio);
            }

            $data['posts'] = $posts_encontrados;


            $limite = count($data['posts']); //5
            $limite = $limite / 2; //2.5
            $limite = round($limite); // 3

            if ($limite == 1) {
                $limite = 1;
            } else if ($limite % 2 == 0) {
                $limite = (int) $limite;
            } else {
                $limite = (int) $limite - 1; //4
            }


            /* dados para paginacao */
            $this->load->library('pagination');
            $config['base_url'] = base_url('posts/procurar') . '/' . $post . '/page/';
            $config['per_page'] = $por_pagina;
            $config['total_rows'] = $this->post->get_total_posts_busca($post);
            $config['num_links'] = 5;
            $config['first_url'] = '1';
            $config['uri_segment'] = 5;
            $config['last_link'] = 'Último';
            $config['next_link'] = 'Próximo';
            $config['prev_link'] = 'Anterior';
            $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
            $config['full_tag_close'] = '</ul></nav></div>';
            $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close'] = '</span></li>';
            $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close'] = '</span></li>';
            $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close'] = '</span></li>';

            /* inciailizar a paginacao */
            $this->pagination->initialize($config);
            /* criar links da paginacao */
            $data['paginacao'] = $this->pagination->create_links();
        } else {
            //se nao clicou no form mandar para pagina inicial
            //redirect(site_url());
        }

        $data["resultado_pesquisa"] = $this->post->get_total_posts_busca($post);

        if ($this->uri->segment(3) == null) {
            $data["termo"] = urldecode($termo);
        } else {
            $data["termo"] = urldecode($this->uri->segment(3));
        }

        $this->load->view('posts/resultado-pesquisa', $data);
    }

}
