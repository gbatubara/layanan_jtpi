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
		public function getdatasession1(){
			$getdata= $this->session->userdata('login');
			$data = $getdata ['email'];
			$query = $this->db->query("SELECT * FROM mahasiswa NATURAL JOIN prodi WHERE email='$data'");
			return $query->row();
		}
		public function getdatasession(){
			$getdata= $this->session->userdata('login');
			$data = $getdata ['email'];
			$query = $this->db->query("SELECT * FROM mahasiswa NATURAL JOIN prodi WHERE email='$data'");
			return $query->row();
		}
		public function gettime(){
			return $this->db->query("SELECT TIME_FORMAT(Waktu, '%H:%i') as Waktu FROM tbl_perizinan");
		}
		public function getcount(){
			$getdata= $this->session->userdata('login');
			$data = $getdata ['email'];
			return $this->db->query("SELECT COUNT(Nim) as count FROM tbl_kp NATURAL JOIN mahasiswa WHERE email = '$data'");
		}
		public function getcount1(){
			$getdata= $this->session->userdata('login');
			$data = $getdata ['email'];
			return $this->db->query("SELECT COUNT(Nim) as count FROM tbl_perizinan NATURAL JOIN mahasiswa WHERE email = '$data'");
		}
		public function insertdata(){
			$getdata= $this->session->userdata('login');
			$data = $getdata ['email'];
			$prodi=$this->db->query("SELECT kode_prodi FROM mahasiswa WHERE email='$data'");
			foreach ($prodi->result() as $kd_prodi) {
			$data = array(
				'Nim'		=> $this->input->post('nim'),
				'Nama'		=> $this->input->post('name'),
				'kode_prodi'=> $kd_prodi->kode_prodi,
				'Tempat_KP'	=> $this->input->post('tempatkp'),
				'Alamat_KP'	=> $this->input->post('alamatkp')

			);
		}
			// Insert formkp
			return $this->db->insert('tbl_kp', $data);
		}
		public function insertdataizin(){
			$getdata= $this->session->userdata('login');
			$data = $getdata ['email'];
			$prodi=$this->db->query("SELECT kode_prodi FROM mahasiswa WHERE email='$data'");
			foreach ($prodi->result() as $kd_prodi) {
			$data = array(
				'Nama'					=> $this->input->post('name'),
				'Nim'						=> $this->input->post('nim'),
				'kode_prodi'		=> $kd_prodi->kode_prodi, //$this->input->post('prodi'),
				'Nama_kegiatan'	=> $this->input->post('namakegiatan'),
				'Agenda'				=> $this->input->post('agenda'),
				'Tempat'				=> $this->input->post('tempat'),
				'Tanggal'				=> $this->input->post('tanggal'),
				'Waktu'					=> $this->input->post('waktu'),
				'Namapj'				=> $this->input->post('namapj'),
				'Jabatanpj'			=> $this->input->post('jabatanpj')

			);
		}
			// Insert formkp
			return $this->db->insert('tbl_perizinan', $data);
		}

		//crud
		/*function getAllData() {
        $query = $this->db->query('SELECT * FROM tbl_kp INNER JOIN prodi ON tbl_kp.kode_prodi = prodi.kode_prodi');
        return $query->result();
    }*/

	}
