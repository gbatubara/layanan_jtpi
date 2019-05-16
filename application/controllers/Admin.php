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

			public function export(){
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel.php';
				
				// Panggil class PHPExcel nya
				$excel = new PHPExcel();
				// Settingan awal fil excel
				$excel->getProperties()->setCreator('My Notes Code')
							 ->setLastModifiedBy('My Notes Code')
							 ->setTitle("Data Siswa yang Mengajukan KP")
							 ->setSubject("Mahasiswa")
							 ->setDescription("Laporan Semua Data Mahasiswa")
							 ->setKeywords("Data Mahasiswa");
				// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
				$style_col = array(
				  'font' => array('bold' => true), // Set font nya jadi bold
				  'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				  ),
				  'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				  )
				);
				// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
				$style_row = array(
				  'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				  ),
				  'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				  )
				);
				$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MAHASISWA YANG MENGAJUKAN KP"); // Set kolom A1 dengan tulisan "DATA SISWA"
				$excel->getActiveSheet()->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai E1
				$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
				$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
				$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
				// Buat header tabel nya pada baris ke 3
				$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
				$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIM"); // Set kolom B3 dengan tulisan "NIS"
				$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
				$excel->setActiveSheetIndex(0)->setCellValue('D3', "PROGRAM STUDI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
				$excel->setActiveSheetIndex(0)->setCellValue('E3', "TEMPAT KP"); // Set kolom E3 dengan tulisan "TEMPAT KP"
				$excel->setActiveSheetIndex(0)->setCellValue('F3', "ALAMAT KP"); // Set kolom E3 dengan tulisan "ALAMAT KP"
				// Apply style header yang telah kita buat tadi ke masing-masing kolom header
				$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
				// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
				$this->load->model('admin_model');
				$Msiswa = $this->admin_model->show_data();
				$no = 1; // Untuk penomoran tabel, di awal set dengan 1
				$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
				foreach($Msiswa->result() as $data){ // Lakukan looping pada variabel siswa
				  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->Nim);
				  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->Nama);
				  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_prodi);
				  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->Tempat_KP);
				  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->Alamat_KP);
				  
				  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
				  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
				  
				  $no++; // Tambah 1 setiap kali looping
				  $numrow++; // Tambah 1 setiap kali looping
				}
				// Set width kolom
				$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
				$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
				$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
				$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
				$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
				$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom F
				
				// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
				$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
				// Set orientasi kertas jadi LANDSCAPE
				$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
				// Set judul file excel nya
				$excel->getActiveSheet(0)->setTitle("Laporan Data Mahasiswa");
				$excel->setActiveSheetIndex(0);
				// Proses file excel
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment; filename="Data Mahasiswa yang Mengajukan KP.xlsx"'); // Set nama file excel nya
				header('Cache-Control: max-age=0');
				$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
				$write->save('php://output');
			  }

			  public function exports(){
				// Load plugin PHPExcel nya
				include APPPATH.'third_party/PHPExcel.php';
				
				// Panggil class PHPExcel nya
				$excel = new PHPExcel();
				// Settingan awal fil excel
				$excel->getProperties()->setCreator('My Notes Code')
							 ->setLastModifiedBy('My Notes Code')
							 ->setTitle("Data Siswa yang Mengajukan Izin Kegiatan")
							 ->setSubject("Mahasiswa")
							 ->setDescription("Laporan Semua Data Mahasiswa")
							 ->setKeywords("Data Mahasiswa");
				// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
				$style_col = array(
				  'font' => array('bold' => true), // Set font nya jadi bold
				  'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				  ),
				  'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				  )
				);
				// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
				$style_row = array(
				  'alignment' => array(
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				  ),
				  'borders' => array(
					'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
					'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
					'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
					'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				  )
				);
				$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MAHASISWA YANG MENGAJUKAN KP"); // Set kolom A1 dengan tulisan "DATA SISWA"
				$excel->getActiveSheet()->mergeCells('A1:J1'); // Set Merge Cell pada kolom A1 sampai E1
				$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
				$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
				$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
				// Buat header tabel nya pada baris ke 3
				$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
				$excel->setActiveSheetIndex(0)->setCellValue('B3', "NIM"); // Set kolom B3 dengan tulisan "NIS"
				$excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA"); // Set kolom C3 dengan tulisan "NAMA"
				$excel->setActiveSheetIndex(0)->setCellValue('D3', "PROGRAM STUDI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
				$excel->setActiveSheetIndex(0)->setCellValue('E3', "NAMA KEGIATAN"); // Set kolom E3 dengan tulisan "TEMPAT KP"
				$excel->setActiveSheetIndex(0)->setCellValue('F3', "AGENDA"); // Set kolom E3 dengan tulisan "ALAMAT KP"
				$excel->setActiveSheetIndex(0)->setCellValue('G3', "TEMPAT"); // Set kolom E3 dengan tulisan "ALAMAT KP"
				$excel->setActiveSheetIndex(0)->setCellValue('H3', "TANGGAL & WAKTU"); // Set kolom E3 dengan tulisan "ALAMAT KP"
				$excel->setActiveSheetIndex(0)->setCellValue('I3', "NAMA PENAGGUNG JAWAB"); // Set kolom E3 dengan tulisan "ALAMAT KP"
				$excel->setActiveSheetIndex(0)->setCellValue('J3', "JABATAN PENANGGUNG JAWAB"); // Set kolom E3 dengan tulisan "ALAMAT KP"
				// Apply style header yang telah kita buat tadi ke masing-masing kolom header
				$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
				$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
				// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
				$this->load->model('admin_model');
				$Msiswa = $this->admin_model->show_data2();
				$no = 1; // Untuk penomoran tabel, di awal set dengan 1
				$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
				foreach($Msiswa->result() as $data){ // Lakukan looping pada variabel siswa
				  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
				  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->Nim);
				  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->Nama);
				  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama_prodi);
				  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->Nama_kegiatan);
				  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->Agenda);
				  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->Tempat);
				  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->Tanggal." ".$data->Waktu);
				  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->Namapj);
				  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->Jabatanpj);
				  
				  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
				  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
				  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
				  
				  $no++; // Tambah 1 setiap kali looping
				  $numrow++; // Tambah 1 setiap kali looping
				}
				// Set width kolom
				$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
				$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
				$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
				$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
				$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
				$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom F
				$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom F
				$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom F
				$excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom F
				$excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom F
				
				// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
				$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
				// Set orientasi kertas jadi LANDSCAPE
				$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
				// Set judul file excel nya
				$excel->getActiveSheet(0)->setTitle("Laporan Data Mahasiswa");
				$excel->setActiveSheetIndex(0);
				// Proses file excel
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment; filename="Data Mahasiswa yang Mengajukan Izin Kegiatan.xlsx"'); // Set nama file excel nya
				header('Cache-Control: max-age=0');
				$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
				$write->save('php://output');
			  }
}
