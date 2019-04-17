<div class="col-md-9">
  <?php
          $info = $this->session->flashdata('info');
          if(!empty($info))
          {
            echo $info;
          }
          ?>
<div class="box box-success">
    <div class="box-header">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        <h3 class="box-title text-center">Tabel Mahasiswa yang Mengajukan Izin Kegiatan</h3>
    </div>
    <div class="box-body">
        <!--Konten diisi di dalam sini-->
        <table class="table">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Nama Kegiatan</th>
                <th scope="col">Tempat Kegiatan</th>
                <th scope="col">Waktu Kegiatan</th>
                <th scope="col">Status</th>
                </tr>
              <tr>
                <?php
                $no=1;
                foreach ($isi->result() as $row) {
                  ?>
                  <?php
                  if ($row->aksi == 0) {
                    $status = '<label class="label label-warning">Diproses</label>';
                  }
                  elseif ($row->aksi == 1) {
                    $status = '<label class="label label-success">Diterima</label>';
                  }
                  else {
                    $status = '<label class="label label-danger">Ditolak</label>';
                  }
                  ?>
                <td><?php echo $no++;?></td>
                <td><?php echo $row->nim;?></td>
                <td><?php echo $row->nama;?></td>
                <td><?php echo $row->nama_prodi;?></td>
                <td><?php echo $row->nama_kegiatan;?></td>
                <td><?php echo $row->tempat;?></td>
                <td><?php echo $row->tanggal." ".$row->waktu;?></td>
                <td><?php echo $status; ?></td>
                </tr>
              <?php } ?>
        </table>
    </div>
</div>
</div>
