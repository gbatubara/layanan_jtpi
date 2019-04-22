<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Filter extends CI_Controller
{

	public function index()
	{
		$data['data']=$this->db->get('users')->result();
		$data['isi'] = $this->show_data();
		$this->load->view('pages/filter',$data, FALSE);

	}


	public function load_mahasiswa()
	{

		$angkatan= $_GET['angkatan'];
		if ($angkatan == 0) {
			$this->db->select('*');
			$this->db->from('tbl_kp');
			$this->db->join('prodi','tbl_kp.kode_prodi = prodi.kode_prodi','left');
			// $this->db->join('status','status.id = prodi.aksi','left');
		$data = $this->db->get()->result();
		// else{
		// 	$getText=
		// 	$data = $this->db->query("SELECT * FROM tbl_kp NATURAL JOIN prodi WHERE `nama_prodi` = "$getText)->result();
		// }
	}else {
     $data = $this->db->query("SELECT * FROM tbl_kp NATURAL JOIN prodi WHERE `kode_prodi` = '$angkatan'")->result();
		}

		if (!empty($data)) {
		$no=1; foreach ($data as $row): ?>
		<?php
		if ($row->Aksi == 0) {
			$status = '<label class="label label-warning">Diproses</label>';
		}
		elseif ($row->Aksi == 1) {
			$status = '<label class="label label-success">Diterima</label>';
		}
		else {
			$status = '<label class="label label-danger">Ditolak</label>';
		}
		?>
		<tr>
		<th scope="row"><?php echo $row->id; ?></th>
		<td><?php echo $row->Nim;?></td>
		<td><?php echo $row->Nama;?></td>
		<td><?php echo $row->nama_prodi;?></td>
		<td><?php echo $row->Tempat_KP;?></td>
		<td><?php echo $row->Alamat_KP;?></td>
		<td><?php echo $status; ?></td>


		</tr>
		<?php endforeach ?> <?php
		}else{
			?>
			<tr><td align="center">Tidak ada data</td></tr>
			<?php
		}


	}
}
