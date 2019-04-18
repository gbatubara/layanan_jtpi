<div class="col-md-9">
<div class="box box-success">
    <div class="box-header">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        <h3 class="box-title text-center">Tabel Mahasiswa yang Mengajukan Izin Kegiatan</h3>
    </div>
    <div class="box-body">
        <!--Konten diisi di dalam sini-->
        <table class="table">
      <tr>
        <th>Nim</th>
        <th>Nama</th>
        <th>Program Studi</th>
        <th>Tempat KP</th>
        <th>Alamat KP</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <!-- /.box-body -->
    <?php
    foreach ($isi->result() as $row) {
      ?>
      <?php
      if ($row->Aksi == 0) {
        $status = '<label class="label label-success">Diproses</label>';
      }
      elseif ($row->Aksi == 1) {
        $status = '<label class="label label-success">Diterima</label>';
      }
      else {
        $status = '<label class="label label-danger">Ditolak</label>';
      }
      ?>
    <td><?php echo $row->Nim;?></td>
    <td><?php echo $row->Nama;?></td>
    <td><?php echo $row->nama_prodi;?></td>
    <td><?php echo $row->Tempat_KP;?></td>
    <td><?php echo $row->Alamat_KP;?></td>
    <td><?php echo $status; ?></td>
    <td>
  <select name="status" id="status" class="texbox" class="span4" value="<?php echo $status; ?>">
  <option>--Pilih--</option>
  <option value="1">Diterima</option>
  <option value="2">Ditolak</option>
  <option value="0">Diproses</option>
  </select>
    <a href="<?php echo site_url('admin/edit/'.$row->id) ?>"class="btn btn-small"><i class="fa fa-save"></i> Save</a >
                     </td>
    </tr>
  <?php } ?>
    </div>
</div>
</div>
