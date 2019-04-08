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

		$this->load->view('pages/filter',$data, FALSE);

	}
	public function load_mahasiswa()
	{
		$angkatan= $_GET['angkatan'];
		if ($angkatan == 0) {
		$data = $this->db->get('users')->result();

		}else{
		$data = $this->db->get_where('users', ['zipcode'=>$angkatan])->result();
		}
		if (!empty($data)) {
		$no=1; foreach ($data as $row): ?>
		<tr>
		<td><?php echo $no++ ?></td>
		<td><?php echo $row->name ?></td>
		<td><?php echo $row->zipcode ?></td>
		<td><?php echo $row->prodi ?></td>
		<td><?php echo $row->email ?></td>
		</tr>
		<?php endforeach ?> <?php
		}else{
			?>
			<tr><td align="center">Tidak ada data</td></tr>
			<?php
		}


	}
}
