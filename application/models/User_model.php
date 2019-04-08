<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
			$data = array(
				'nama_mhs'	=> $this->input->post('name'),
				'nim'				=> $this->input->post('nim'),
				'email' 		=> $this->input->post('email'),
				'kode_prodi'=> $this->input->post('pilihanprodi'),
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
			$this->db->select('*');
			$this->db->from('tbl_kp');
			$this->db->join('prodi', 'tbl_kp.kode_prodi = prodi.kode_prodi');
			return $this->db->get();
		}
		public function getdata(){
			return $this->db->query("SELECT * FROM prodi ORDER BY nama_prodi");
		}
		public function insertdata(){
			$data = array(
				'Nim'				=> $this->input->post('nim'),
				'Nama'			=> $this->input->post('name'),
				'kode_prodi'			=> $this->input->post('pilihanprodi'),
				'Tempat_KP'	=> $this->input->post('tempatkp'),
				'Alamat_KP'	=> $this->input->post('alamatkp')

			);
			// Insert formkp
			return $this->db->insert('tbl_kp', $data);
		}
	}
