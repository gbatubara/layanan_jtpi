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
		public function index($page = 'crudView'){
	    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
	      show_404();
	    }

	    $data['title'] = ucfirst($page);
	    $data['result'] = $this->crud_model->tampil_data()->result();

	    $this->load->view('templates/header');
	    $this->load->view('pages/'.$page, $data);
	    $this->load->view('templates/footer');
	  }

	}
