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
		public function show_data2(){
			return $this->db->query("SELECT id, Nim, Nama, kode_prodi,nama_prodi, Nama_kegiatan, Tempat, Tanggal, Aksi, TIME_FORMAT(Waktu, '%H:%i') AS Waktu FROM tbl_perizinan NATURAL JOIN prodi");
		}
		function getData_kp($id) {
        $query = $this->db->query('SELECT * FROM tbl_kp INNER JOIN prodi ON tbl_kp.kode_prodi = prodi.kode_prodi WHERE `id` =' .$id);
        return $query->row();
    }
		public function updateData_kp($id) {
        $data = array (
					//'Nim'		=> $this->input->post('nim'),
					//'Nama'		=> $this->input->post('name'),
					//'Tempat_KP'	=> $this->input->post('tempatkp'),
					//'Alamat_KP'	=> $this->input->post('alamatkp'),
					'Aksi'		=> $this->input->post('aksi')
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_kp', $data);
    }
		public function deleteData_kp($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_kp');
    }
    	public function getData_izin($id) {
        $query = $this->db->query('SELECT * FROM tbl_perizinan INNER JOIN prodi ON tbl_perizinan.kode_prodi = prodi.kode_prodi WHERE `id` =' .$id);
        return $query->row();
    }
		public function updateData_izin($id) {
        $data = array (
					//'Nim'		=> $this->input->post('nim'),
					//'Nama'		=> $this->input->post('name'),
					//'Tempat_KP'	=> $this->input->post('tempatkp'),
					//'Alamat_KP'	=> $this->input->post('alamatkp'),
					'Aksi'		=> $this->input->post('aksi')
        );
        $this->db->where('id', $id);
        $this->db->update('tbl_perizinan', $data);
    }
		public function deleteData_izin($id) {
        $this->db->where('id', $id);
        $this->db->delete('tbl_perizinan');
    }
}
