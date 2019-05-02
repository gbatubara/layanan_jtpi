<?php
	class User_model extends CI_Model{
		public function register($enc_password){
			// User data array
				$data = array(
					'nama_mhs'	=> $this->input->post('name'),
					'nim'		=> $this->input->post('nim'),
					'email' 	=> $this->input->post('email'),
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
		public function nim($nim){
			$query = $this->db->get_where('mahasiswa', array('Nim' => $nim));
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
		public function show_data2(){
			return $this->db->query("SELECT Nim, Nama, kode_prodi,nama_prodi, Nama_kegiatan, Tempat, Tanggal, Aksi, TIME_FORMAT(Waktu, '%H:%i') AS Waktu FROM tbl_perizinan NATURAL JOIN prodi");
		}
		public function getdata(){
			return $this->db->query("SELECT * FROM prodi ORDER BY nama_prodi");
		}
		public function gettime(){
			return $this->db->query("SELECT TIME_FORMAT(Waktu, '%H:%i') as Waktu FROM tbl_perizinan");
		}
		public function getcount($email){
			return $this->db->query("SELECT COUNT(Nim) FROM tbl_perizinan WHERE Nim=(SELECT Nim FROM mahasiswa WHERE email = $email)");
		}
		public function insertdata(){
			$data = array(
				'Nim'		=> $this->input->post('nim'),
				'Nama'		=> $this->input->post('name'),
				'kode_prodi'=> $this->input->post('pilihanprodi'),
				'Tempat_KP'	=> $this->input->post('tempatkp'),
				'Alamat_KP'	=> $this->input->post('alamatkp')

			);
			// Insert formkp
			return $this->db->insert('tbl_kp', $data);
		}
		public function insertdataizin(){
			$data = array(
				'nama'					=> $this->input->post('name'),
				'nim'						=> $this->input->post('nim'),
				'kode_prodi'		=> $this->input->post('pilihanprodi'),
				'nama_kegiatan'	=> $this->input->post('namakegiatan'),
				'agenda'				=> $this->input->post('agenda'),
				'tempat'				=> $this->input->post('tempat'),
				'tanggal'				=> $this->input->post('tanggal'),
				'waktu'					=> $this->input->post('waktu'),
				'namapj'				=> $this->input->post('namapj'),
				'jabatanpj'			=> $this->input->post('jabatanpj')

			);
			// Insert formkp
			return $this->db->insert('tbl_perizinan', $data);
		}

		//crud
		/*function getAllData() {
        $query = $this->db->query('SELECT * FROM tbl_kp INNER JOIN prodi ON tbl_kp.kode_prodi = prodi.kode_prodi');
        return $query->result();
    }*/

	}
