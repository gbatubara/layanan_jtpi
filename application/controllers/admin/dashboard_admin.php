<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {

	public function index()
	{
		$this->load->model('user_model');
		$data['isi'] = $this->user_model->show_data();
		$this->load->view('admin/dashboard_admin' , $data);
	}
}
