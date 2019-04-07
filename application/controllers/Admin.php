<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Admin extends CI_Controller{
		public function dashboard($page = 'dashboard_admin'){
			if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
				show_404();
			}

      $this->load->model('user_model');
  		$data['isi'] = $this->user_model->show_data();
			$data['title'] = ucfirst($page);

			$this->load->view('admin/'.$page, $data);
		}
    public function login($page = 'login_admin'){
      if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
        show_404();
      }

      $data['title'] = ucfirst($page);

      $this->load->view('admin/'.$page, $data);
    }
    public function add($page = 'add_admin'){
      if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
        show_404();
      }

      $data['title'] = ucfirst($page);

      $this->load->view('admin/'.$page, $data);
    }
}
