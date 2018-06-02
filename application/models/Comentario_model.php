<?php
	class Comentario_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function criar_comentario($post_id){
			$data = array(
				'post_id' => $post_id,
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'conteudo' => $this->input->post('conteudo')
			);

			return $this->db->insert('comentarios', $data);
		}

		public function get_comentarios($post_id){
			$query = $this->db->get_where('comentarios', array('post_id' => $post_id));
			return $query->result_array();
		}
	}