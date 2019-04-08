<?php echo form_open('users/add_user'); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap/css/formkp.css">
</head>
<body>
<div class="container container-utama">
<div class="row content">
  <div class="col-md-5">
      <?php echo validation_errors(); ?>
    <h1>Form Pengajuan KP JTPI</h1>
    <p>Silahkan isi form dengan lengkap</p>
   <i><p>"Kemudian silahkan download form yang terdapat pada link dibawah"</p></i>
  </div>
  <div class="col-md-12">    <hr>
    <?php
            $info = $this->session->flashdata('info');
            if(!empty($info))
            {
              echo $info;
            }
            ?>
  </div>
<div class="col-md-8 col-md-offset-2">
    <label><b>Name</b></label>
    <input type="text" placeholder="Nama" class="form-control" name="name">

    <label><b>Nim</b></label>
    <input type="number" placeholder="NIM" class="form-control" name="nim">


    <label><b>Program Studi</b></label>
    <select name="pilihanprodi" id="pilihanprodi" class="form-control">
    <option value='' disabled selected>--Pilih--</option>
    <?php
    foreach ($nama_prodi->result() as $row_prodi) {
    echo "<option value='".$row_prodi->kode_prodi."'>".$row_prodi->nama_prodi."</option>";}
    ?>
    </select>

    <label><b>Tempat KP</b></label>
    <input type="text" placeholder="Nama Instansi / Perusahaan Tempat KP" class="form-control" name="tempatkp">

    <label><b>Alamat Tempat KP</b></label>
    <input type="text" placeholder="Alamat Tempat KP" class="form-control" name="alamatkp">


        <button class="btn"><i class="fa fa-user-plus"></i> Ajukan Penambahan Angota</button>
        &emsp;
        <a href="<?php echo base_url() ?>users/download/">Download file</a>

    <hr>
    <i><p style="color: #ea2727">/* Periksalah kembali bahwa data yang anda isi sudah benar dan valid</p></i>
    <button type="submit" onclick="submit" id="btnsubmit" class="registerbtn">Submit</button>
  </div>
</div>
</div>
</body>
</html>
<?php echo form_close(); ?>
