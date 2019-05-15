<head>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/text.css">
</head>

<div class="container content">
<div class="col-md-9">
<div class="box box-success">
    <div class="box-header">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        <h3 class="box-title text-center">Tabel Mahasiswa yang Mengajukan Izin Kegiatan</h3>
    </div>
    <div class="box-body">
        <!--Konten diisi di dalam sini-->
        <a href="<?php echo base_url() ?>admin/exports">Download File</a><br/><br/>
        <table class="table">
          <tr>
          <th>Nim</th>
          <th>Nama</th>
          <th>Program Studi</th>
          <th>Nama Kegiatan</th>
          <th>Agenda</th>
          <th>Tempat Kegiatan</th>
          <th>Waktu Kegiatan</th>
          <th>Nama PJ</th>
          <th>Jabatan PJ</th>
          <th>Status</th>
          <th>Aksi</th>
          </tr>
    </thead>
    <!-- /.box-body -->
    <?php
    $no=1;
    foreach ($isi->result() as $row) {
      ?>
      <td><?php echo $row->Nim;?></td>
      <td><?php echo $row->Nama;?></td>
      <td><?php echo $row->nama_prodi;?></td>
      <td><?php echo $row->Nama_kegiatan;?></td>
      <td><?php echo $row->Agenda;?></td>
      <td><?php echo $row->Tempat;?></td>
      <td><?php echo $row->Tanggal." ".$row->Waktu;?></td>
      <td><?php echo $row->Namapj;?></td>
      <td><?php echo $row->Jabatanpj;?></td>      
      <td>  <?php
        if ($row->Aksi == 0) {
          echo $status = '<label class="label label-warning">Diproses</label>';
        }
        elseif ($row->Aksi == 1) {
          echo $status = '<label class="label label-success">Selesai</label>';
        }
        else {
          echo $status = '<label class="label label-danger">Revisi</label>';
        }
        ?></td>
        <td>
    <a href="<?php echo site_url('Admin/edit_izin');?>/<?php echo $row->id;?>"><i class="fa fa-edit"> Edit</a></i>  |
    <a href="<?php echo site_url('Admin/delete_izin');?>/<?php echo $row->id;?>"><i class="fa fa-trash"> Delete</a></i> </td>
    </tr>
  <?php } ?>
    </div>
  </div>
  </table>
</div>
</div>
</div>
</div>
