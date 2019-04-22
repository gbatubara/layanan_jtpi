<?php
	class Users extends CI_Controller{
		// Register user
		public function register(){
			if($this->session->has_userdata('login')) {
				redirect('pages/dashboard');
			}
			$data['title'] = 'Daftar';
			$data['nama_prodi'] = $this->user_model->getdata();

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				//$nama_prodi = $this->db->query("SELECT * FROM prodi ORDER BY nama_prodi");
				//$this->db->select('nama_prodi');
				//$nama_prodi = $this->db->get('prodi');
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				// Encrypt password
				$enc_password = md5($this->input->post('password'));

				$this->user_model->register($enc_password);

				// Set message
				$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
						<i class="fa fa-remove"></i></button>
						<i class="fa fa-ok green"></i>
						<strong class="green">
						</strong>You are now registered and can log in </div');

				redirect('users/register');
			}
		}

		// Log in user
		public function login(){
			if($this->session->has_userdata('login')) {
				redirect('home');
			}
			$data['title'] = 'Login';
			//$data['captcha'] = $hasil;

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {

				// Get username
				$email = $this->input->post('email');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// Login user
				$user_id = $this->user_model->login($email, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' 	=> $user_id,
						'email' 		=> $email,
						'logged_in' => true
					);
					$this->session->set_userdata('login', $user_data);
					// Set message
					$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-remove"></i></button>
							<i class="fa fa-ok green"></i>
							<strong class="green">
							</strong>You are now logged in </div>');

					redirect('pages/dashboard');
				} else {
					// Set message
					$this->session->set_flashdata('info', '<div class="alert alert-block alert-warning">
							<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-remove"></i></button>
							<i class="fa fa-ok red"></i>
							<strong class="red">
							</strong>Login is invalid </div');

					redirect('users/login');
				}
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('login');
			/*$this->session->unset_userdata('email');
			$this->session->unset_userdata('logged_in');*/

			// Set message
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
					<i class="fa fa-remove"></i></button>
					<i class="fa fa-ok green"></i>
					<strong class="green">
					</strong>You are now logged out </div');

			redirect('users/login');
		}
		public function captcha()
		{
			// code...
			$listoperator = array('+', '-', 'x');
			$this->bil1 = rand(0, 20);
			$this->bil2 = rand(0, 20);
			$this->operator = $listoperator[rand(0, 2)];
			if ($this->operator == '+'){
				 return $hasil = $this->bil1 + $this->bil2;
			 }
			else if ($this->operator == '-') {
				return $hasil = $this->bil1 - $this->bil2;
			}
			else if ($this->operator == 'x') {
				return $hasil = $this->bil1 * $this->bil2;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('info', '<div class="alert alert-block alert-warning">
					<button type="button" class="close" data-dismiss="alert"></strong>That email is taken. Please choose a different one </div>');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}
		//formkp
		public function formkp(){
			$data['title'] = 'formkp';
			$data['nama_prodi'] = $this->user_model->getdata();


			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('nim', 'Nim', 'required');
			$this->form_validation->set_rules('pilihanprodi', 'Program Studi', 'required');
			$this->form_validation->set_rules('tempatkp', 'Tempat KP', 'required');
			$this->form_validation->set_rules('alamatkp', 'Alamat Tempat KP', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/formkp', $data);
				$this->load->view('templates/footer');
			} else {
				$this->load->model('User_model');
				$this->user_model->insertdata();

				// Set message
				$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
						<button type="button" class="close" data-dismiss="alert">
						<i class="fa fa-remove"></i></button>
						<i class="fa fa-ok green"></i>
						<strong class="green">
						</strong>Kamu Sudah Terdaftar. Silahkan Klik Link di Bawah Untuk Mendownload Form.</div>');

				redirect('users/formkp');
			}
		}
		public function download(){
			force_download('download/Form_KP.docx', NULL);
		}
	public function izinkegiatan(){
		$data['title'] = 'formizinkegiatan';
		$data['nama_prodi'] = $this->user_model->getdata();


		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('nim', 'Nim', 'required');
		$this->form_validation->set_rules('pilihanprodi', 'Program Studi', 'required');
		$this->form_validation->set_rules('namakegiatan', 'Nama Kegiatan', 'required');
		$this->form_validation->set_rules('agenda', 'Agenda Kegiatan', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat Pelaksanaan', 'required');
		$this->form_validation->set_rules('tanggal', 'Tanggal Pelaksanaan', 'required');
		$this->form_validation->set_rules('waktu', 'waktu Pelaksanaan', 'required');
		$this->form_validation->set_rules('namapj', 'Nama Penanggung Jawab', 'required');
		$this->form_validation->set_rules('jabatanpj', 'Jabatan Penanggung Jawab', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/formizinkegiatan', $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->model('User_model');
			$this->user_model->insertdataizin();

			// Set message
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
					<i class="fa fa-remove"></i></button>
					<i class="fa fa-ok green"></i>
					<strong class="green">
					</strong>Kamu Sudah Terdaftar. Silahkan Klik Link di Bawah Untuk Mendownload Form.</div>');

			redirect('users/izinkegiatan');
		}
	}
	public function download1(){
		force_download('download/FORM_ZIN_KEGIATAN_MAHASISWA.docx', NULL);
	}
}
