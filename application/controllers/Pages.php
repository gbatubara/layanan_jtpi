<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Pages extends CI_Controller{
		public function view($page = 'home'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			$data['title'] = ucfirst($page);

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}

		public function dashboard($page = 'dashboard_user'){
	    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
	      show_404();
	    }

			$this->load->model('user_model');
	    $data['title'] = ucfirst($page);
			$data['isi'] = $this->user_model->show_data();

	    $this->load->view('templates/header1');
	    $this->load->view('templates/sidebar');
			$this->load->view('pages/'.$page, $data);
	  }
		public function formkp($page = 'formkp'){
	    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
	      show_404();
	    }

	    $data['title'] = ucfirst($page);

	    $this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
	  }

	}
