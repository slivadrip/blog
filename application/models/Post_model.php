<?php

class Post_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    
       public function verificar_sessao() {

        if ($this->session->userdata('logado') == false) {
            redirect('login');
        }
    }


    public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE) {
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        if ($slug === FALSE) {
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categorias', 'categorias.id = posts.categoria_id');
            $query = $this->db->get('posts');
        
            return $query->result_array();
         
        }

        $query = $this->db->get_where('posts', array('slug' => $slug));
   
        return $query->row_array();
    }

    public function criar_post($post_image) {
         $this->verificar_sessao();
        $slug = url_title($this->input->post('titulo'));
        $slug = preg_replace('/[`^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $slug));

        $data = array(
            'titulo' => $this->input->post('titulo'),
            'slug' => $slug,
            'conteudo' => $this->input->post('conteudo'),
            'categoria_id' => $this->input->post('categoria_id'),
            'usuario_id' => $this->session->userdata('usuario_id'),
            'post_image' => $post_image
        );

        return $this->db->insert('posts', $data);
    }

    public function deletar_post($id) {
         $this->verificar_sessao();
        $image_file_name = $this->db->select('post_image')->get_where('posts', array('id' => $id))->row()->post_image;
        $cwd = getcwd(); // save the current working directory
        $image_file_path = $cwd . "\\assets\\images\\posts\\";
        chdir($image_file_path);
        unlink($image_file_name);
        chdir($cwd); // Restore the previous working directory
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }

    public function update_post() {
         $this->verificar_sessao();
        $slug = url_title($this->input->post('titulo'));

        $data = array(
            'titulo' => $this->input->post('titulo'),
            'slug' => $slug,
            'conteudo' => $this->input->post('conteudo'),
            'categoria_id' => $this->input->post('categoria_id')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
    }

    public function get_categorias() {
        $this->db->order_by('nome');
        $query = $this->db->get('categorias');
        return $query->result_array();
    }

    public function get_posts_by_categoria($categoria_id) {
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categorias', 'categorias.id = posts.categoria_id');
        $query = $this->db->get_where('posts', array('categoria_id' => $categoria_id));
        return $query->result_array();
    }

}
