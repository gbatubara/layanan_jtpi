<?php
	class Users extends CI_Controller{
		// Register user
		public function register(){
			if($this->session->has_userdata('login')) {
				redirect('pages/dashboard');
			}
			$data['title'] = 'Daftar';
			$data['nama_prodi'] = $this->user_model->getdata();

			//$this->form_validation->set_rules('nama', 'Name', 'required');
			$this->form_validation->set_rules('nim', 'NIM', 'required|callback_cek_nim');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				 
				//$vemail = substr($this->input->post('email'), -20);
				//if($vemail=='@student.itera.ac.id'){
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
			//else {
				//echo "<script>window.alert('Email tidak sesuai format')</script>";
			  //echo "<meta http-equiv='refresh' content='0;url=http://localhost/layanan_jtpi/users/register'>";
			//}
		}

		// Log in user
		public function login(){
			if($this->session->has_userdata('login')) {
				redirect('page/dashboard');
			}
			if($this->session->has_userdata('loginadmin')) {
				redirect('admin/t_kp');
			}
			$data['title'] = 'Login';
			$data['captcha'] = $this->captcha();
			$data['result'] = $this->resultcaptcha();
			//$data['captcha'] = $hasil;

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('kode', '', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} else {
				$resultcapt = $this->input->post('inicaptcha');
				$inputcapt = $this->input->post('kode');
				if($inputcapt == $resultcapt){
				// Get username
				$email = $this->input->post('email');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));
				// Login user
				$user_id = $this->user_model->login($email, $password);
				$this->load->model('Admin_model');
				$user_id2 = $this->Admin_model->login($email, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' 	=> $user_id,
						'logged_in' => true,
						'email' 	=> $email
					);
					$this->session->set_userdata('login', $user_data);
					// Set message
					$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
							<i class="fa fa-ok green"></i>
							<strong class="green">
							</strong>Anda Berhasil Login.</div>');

					redirect('pages/dashboard');
				}elseif($user_id2){

					$user_data = array(
						'user_id' 	=> $user_id2,
						'email' 	=> $email,
						'logged_in' => true
					);
					$this->session->set_userdata('loginadmin', $user_data);
					// Set message
					$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
							<i class="fa fa-ok green"></i>
							<strong class="green">
							</strong>Anda Berhasil Logout.</div>');

					redirect('admin/t_kp');
				} else {
					// Set message
					$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger">
							<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-remove"></i></button>
							<i class="fa fa-ok red"></i>
							<strong class="red">
							</strong>Login Gagal. Emai atau Password Anda Salah.</div');

					redirect('users/login');
				}
			}
				else {
					$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger">
							<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-remove"></i></button>
							<i class="fa fa-ok red"></i>
							<strong class="red">
							</strong>Captcha Salah</div');

							redirect('users/login');
						}
					}
				}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('login');
			$this->session->unset_userdata('loginadmin');
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
			$this->bil1 = rand(0, 9);
			$this->bil2 = rand(0, 9);
			$this->operator = $listoperator[rand(0, 2)];
			}
			/*function showcaptcha(){
				$this->captcha();
				echo "Berapa hasil dari ".$this->bil1." ".$this->operator." ".$this->bil2." ? ";
			}*/
			function resultcaptcha()
    {
			$this->captcha();
			if ($this->operator == '+') $hasil = $this->bil1 + $this->bil2;
			else if ($this->operator == '-') $hasil = $this->bil1 - $this->bil2;
			else if ($this->operator == 'x') $hasil = $this->bil1 * $this->bil2;
			return $hasilkode['kode'] = $hasil;
    }

		// Check if email exists
		public function cek_nim($nim){
			if($this->user_model->nim($nim)){
				return true;
			} else {
				$this->form_validation->set_message('cek_nim', '<div class="alert alert-block alert-danger">
						<button type="button" class="close" data-dismiss="alert">
						<i class="fa fa-remove"></i></button>
						<i class="fa fa-ok red"></i>
						</strong>Nim Sudah Digunakan </div>');
				return false;
			}
		}
		//formkp
		public function formkp(){
			$data['title'] = 'formkp';
			$data['nama_prodi'] = $this->user_model->getdata();
			$data['getdata'] = $this->user_model->show_data();
			$data['row'] = $this->user_model->getdatasession();



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

				redirect('pages/dashboard');
			}
		}
		public function download(){
			force_download('download/Form_KP.docx', NULL);
		}

		public function count(){
			$this->load->model('User_model');
			$getcount = $this->User_model->getcount();
			foreach ($getcount->result() as $row) {
				# code...
			}
			if($row->count<2){
				return true;
			}else{
				return false;
			}
		}
		public function count1(){
			$this->load->model('User_model');
			//$getcount = $this->User_model->getcount();
			$getcount1 = $this->User_model->getcount1();
			foreach ($getcount1->result() as $row) {
				# code...
			}
			if($row->count<2){
				return true;
			}else{
				return false;
			}
		}

	public function izinkegiatan(){
		$data['title'] = 'formizinkegiatan';
		//$data['nama'] = $this->user_model->getdatasession();
		//$data['nim'] = $this->user_model->getdatasession();
		//$data['nama_prodi'] = $this->user_model->getdatasession();
		//$data['email'] = $this->db->query("SELECT * FROM mahasiswa where email= '$coba'");
		$data['row'] = $this->user_model->getdatasession1();


		//$this->form_validation->set_rules('name', 'Name', 'required');
		//$this->form_validation->set_rules('nim', 'Nim', 'required');
		//$this->form_validation->set_rules('prodi', 'Program Studi', 'required');
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
			if($this->count() == true){
			$this->load->model('User_model');
			$this->user_model->insertdataizin();

			// Set message
			$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
					<i class="fa fa-remove"></i></button>
					<i class="fa fa-ok green"></i>
					<strong class="green">
					</strong>Kamu Sudah Terdaftar. Silahkan Klik Link di Bawah Untuk Mendownload Form.</div>');

			redirect('pages/dashboard2');
			}else{
				$this->session->set_flashdata('info', '<div class="alert alert-block alert-danger">
					<button type="button" class="close" data-dismiss="alert">
					<i class="fa fa-remove"></i></button>
					<i class="fa fa-ok green"></i>
					<strong class="green">
					</strong>Maaf, Anda Sudah Mendaftar Sebanyak 2 Kali.</div>');
				redirect('users/izinkegiatan');
			}
		}
	}
	public function download1(){
		force_download('download/FORM_ZIN_KEGIATAN_MAHASISWA.docx', NULL);
	}
	//crud
public function crudView() {
	$data['result'] = $this->user_model->getAllData();
	$this->load->view('templates/header');
	$this->load->view('users/crudView', $data);
	$this->load->view('templates/footer');

}


}
