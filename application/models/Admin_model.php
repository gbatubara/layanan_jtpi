<?php
	class Admin_model extends CI_Model{
		public function add($enc_password){
			// User data array
			$data = array(
				'email'	    => $this->input->post('email'),
        'password'	=> $enc_password

			);

			// Insert user
			return $this->db->insert('admin', $data);
		}

		// Log user in
		public function login($email, $password){
			// Validate
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$result = $this->db->get('admin');

			if($result->num_rows() == 1){
				return $result->row()->email;
			} else {
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('admin', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		public function show_data(){
			$this->db->select('*');
			$this->db->from('tbl_kp');
			$this->db->join('prodi', 'tbl_kp.kode_prodi = prodi.kode_prodi');
			return $this->db->get();
		}
	}
