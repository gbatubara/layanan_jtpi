<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Admin extends CI_Controller{
		public function t_kp($page = 'adminkp'){
			if(!$this->session->has_userdata('loginadmin')) {
				redirect('admin/login');
			}
			if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
				show_404();
			}

      $this->load->model('admin_model');
  		$data['isi'] = $this->admin_model->show_data();
			$data['title'] = ucfirst($page);

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/'.$page, $data);
		}
		public function t_perizinan($page = 'adminperizinan'){
			if(!$this->session->has_userdata('loginadmin')) {
				redirect('admin/login');
			}
			if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
				show_404();
			}

      $this->load->model('admin_model');
  		$data['isi'] = $this->admin_model->show_data2();
			$data['title'] = ucfirst($page);

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar2');
			$this->load->view('admin/'.$page, $data);
		}
		/*public function login(){
			if($this->session->has_userdata('login_admin')) {
				redirect('admin/t_kp');
			}
			$data['title'] = 'Login Admin';
			//$data['captcha'] = $hasil;

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('admin/login_admin', $data);
			} else {

				// Get username
				$email = $this->input->post('email');
				// Get and encrypt the password
				$password = md5($this->input->post('password'));

				// Login user
				$this->load->model('Admin_model');
				$user_id = $this->Admin_model->login($email, $password);

				if($user_id){
					// Create session
					$user_data = array(
						'user_id' 	=> $user_id,
						'email' 		=> $email,
						'logged_in' => true
					);
					$this->session->set_userdata('login_admin', $user_data);
					// Set message
					$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
							<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-remove"></i></button>
							<i class="fa fa-ok green"></i>
							<strong class="green">
							</strong>You are now logged in </div>');

					redirect('admin/t_kp');
				} else {
					// Set message
					$this->session->set_flashdata('info', '<div class="alert alert-block alert-warning">
							<button type="button" class="close" data-dismiss="alert">
							<i class="fa fa-remove"></i></button>
							<i class="fa fa-ok red"></i>
							<strong class="red">
							</strong>Login is invalid </div');

					redirect('admin/login');
				}
			}
		}

		// Log user out
		public function logout(){
			// Unset user data
			$this->session->unset_userdata('login_admin');
			/*$this->session->unset_userdata('email');
			$this->session->unset_userdata('logged_in');*/

			// Set message
			/*$this->session->set_flashdata('info', '<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
					<i class="fa fa-remove"></i></button>
					<i class="fa fa-ok green"></i>
					<strong class="green">
					</strong>You are now logged out </div');

			redirect('admin/login');
		}*/
    public function add($page = 'add_admin'){
			if(!$this->session->has_userdata('loginadmin')) {
				redirect('admin/login');
			}
      if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
        show_404();
      }

      $data['title'] = ucfirst($page);

			$this->load->view('admin/header');
			$this->load->view('admin/sidebar1');
      		$this->load->view('admin/'.$page, $data);
    }
    public function edit_kp($id) {
    		$this->load->model('admin_model');
			$data['row'] = $this->admin_model->getData_kp($id);
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/edit_kp', $data);

	}
	public function update_kp($id) {
		$this->load->model('admin_model');
		$this->admin_model->updateData_kp($id);
		redirect("Admin/t_kp");

	}
	public function delete_kp($id) {
		$this->load->model('admin_model');
		$this->admin_model->deleteData_kp($id);
		redirect("Admin/t_kp");

	}
	public function edit_izin($id) {
			$this->load->model('admin_model');
			$data['row'] = $this->admin_model->getData_izin($id);
			$this->load->view('admin/header');
			$this->load->view('admin/sidebar2');
			$this->load->view('admin/edit_izin', $data);

	}
	public function update_izin($id) {
		$this->load->model('admin_model');
		$this->admin_model->updateData_izin($id);
		redirect("Admin/t_perizinan");

	}
	public function delete_izin($id) {
		$this->load->model('admin_model');
		$this->admin_model->deleteData_izin($id);
		redirect("Admin/t_perizinan");

			}
}
