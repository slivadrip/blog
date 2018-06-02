<?php
	class Categoria_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_categorias(){
			$this->db->order_by('nome');
			$query = $this->db->get('categorias');
			return $query->result_array();
		}

		public function criar_categoria(){
			$data = array(
				'nome' => $this->input->post('nome'),
				'usuario_id' => $this->session->userdata('usuario_id')
			);

			return $this->db->insert('categorias', $data);
		}

		public function get_categoria($id){
			$query = $this->db->get_where('categorias', array('id' => $id));
			return $query->row();
		}

		public function deletar_categoria($id){
			$this->db->where('id', $id);
			$this->db->delete('categorias');
			return true;
		}
	}