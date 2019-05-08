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
                foreach ($isi->result() as $row) {
                  ?>
                  <?php
                  if ($row->Aksi == 0) {
                    $status = '<label class="label label-warning">Diproses</label>';
                  }
                  elseif ($row->Aksi == 1) {
                    $status = '<label class="label label-success">Selesai</label>';
                  }
                  else {
                    $status = '<label class="label label-danger">Revisi</label>';
                  }

                  ?>
                <td><?php echo $row->Nim;?></td>
                <td><?php echo $row->Nama;?></td>
                <td><?php echo $row->nama_prodi;?></td>
                <td><?php echo $row->Nama_kegiatan;?></td>
                <td><?php echo $row->Tempat;?></td>
                <td><?php echo $row->Tanggal."  ".$row->Waktu;?></td>
                <td><?php echo $status; ?></td>
                </tr>
              <?php } ?>

        </table>
    </div>
</div>
<?php if($getcount==true) : ?>
<i><a href="<?php echo base_url() ?>users/download1/">Download file</a></i>
<?php endif; ?>
</div>
