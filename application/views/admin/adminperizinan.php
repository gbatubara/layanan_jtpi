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
          <th>No</th>
          <th>Nim</th>
          <th>Nama</th>
          <th>Program Studi</th>
          <th>Nama Kegiatan</th>
          <th>Tempat Kegiatan</th>
          <th>Waktu Kegiatan</th>
          <th>Status</th>
          </tr>
    </thead>
    <!-- /.box-body -->
    <?php
    $no=1;
    foreach ($isi->result() as $row) {
      ?>
      <td><?php echo $no++;?></td>
      <td><?php echo $row->nim;?></td>
      <td><?php echo $row->nama;?></td>
      <td><?php echo $row->nama_prodi;?></td>
      <td><?php echo $row->nama_kegiatan;?></td>
      <td><?php echo $row->tempat;?></td>
      <td><?php echo $row->tanggal." ".$row->waktu;?></td>
      <td>  <?php
        if ($row->aksi == 0) {
          echo $status = '<label class="label label-success">Diproses</label>';
        }
        elseif ($row->aksi == 1) {
          echo $status = '<label class="label label-success">Diterima</label>';
        }
        else {
          echo $status = '<label class="label label-danger">Ditolak</label>';
        }
        ?>
  <select name="status" id="status" class="texbox" class="span4" value="<?php echo $status; ?>">
  <option>--Pilih--</option>
  <option value="1">Diterima</option>
  <option value="2">Ditolak</option>
  <option value="0">Diproses</option>
  </select></td>
    <!--a href="<?php echo site_url('admin/edit/'.$row->id) ?>"
                       class="btn btn-small"><i class="fas fa-edit"></i> Edit</a-->
                     </td>
    </tr>
  <?php } ?>
    </div>
</div>
</div>
