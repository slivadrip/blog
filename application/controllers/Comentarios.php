<?php
	class Comentarios extends CI_Controller{
		public function criar($post_id){
			$slug = $this->input->post('slug');
			$data['post'] = $this->post_model->get_posts($slug);

			$this->form_validation->set_rules('nome', 'Nome', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');

			$this->form_validation->set_rules('conteudo', 'Conteudo', 'required');


			if($this->form_validation->run() === FALSE){
				$this->load->view('posts/visualizar', $data);
			} else {
				$this->comentario_model->criar_comentario($post_id);
				redirect('posts/'.$slug);
			}
		}
	}