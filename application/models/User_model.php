<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'nama_mhs'	=> $this->input->post('name'),
				'nim'				=> $this->input->post('nim'),
				'email' 		=> $this->input->post('email'),
				'prodi'			=> $this->input->post('pilihanprodi'),
        'password'	=> $enc_password

			);

			// Insert user
			return $this->db->insert('mahasiswa', $data);
		}

		// Log user in
		public function login($email, $password){
			// Validate
			$this->db->where('email', $email);
			$this->db->where('password', $password);
			$result = $this->db->get('mahasiswa');

			if($result->num_rows() == 1){
				return $result->row()->nim;
			} else {
				return false;
			}
		}

		// Check username exists
		/*public function check_username_exists($username){
			$query = $this->db->get_where('mahasiswa', array('username' => $username));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}*/

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('mahasiswa', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}
		public function show_data(){
			return $this->db->get('tbl_kp');
		}
		public function insertdata(){
			$data = array(
				'Nim'				=> $this->input->post('nim'),
				'Nama'			=> $this->input->post('name'),
				'Prodi'			=> $this->input->post('pilihanprodi'),
				'Tempat_KP'	=> $this->input->post('tempatkp'),
				'Alamat_KP'	=> $this->input->post('alamatkp')

			);
			// Insert formkp
			return $this->db->insert('tbl_kp', $data);
		}
	}
