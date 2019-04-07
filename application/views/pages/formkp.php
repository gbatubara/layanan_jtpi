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
    <h1>Form Pengajuan KP JTPI</h1>
    <p>Silahkan isi form dengan lengkap</p>
   <i><p>"Kemudian silahkan download form yang terdapat pada link dibawah"</p></i>
  </div>
  <div class="col-md-12">    <hr>
  </div>
<div class="col-md-8 col-md-offset-2">
    <label for="nama"><b>Nama</b></label>
    <input type="text" placeholder="Nama" name="nama" required>

    <label for="nim"><b>NIM</b></label>
    <input type="text" placeholder="NIM" name="nim" required>


    <label for="prodi"><b>Program Studi</b></label>
    <select name="pilihanprodi" id="pilihanprodi" class="form-control">
    <option value='' disabled selected>--Pilih--</option>
    <?php
    foreach ($nama_prodi->result() as $row_prodi) {
    echo "<option value='".$row_prodi->kode_prodi."'>".$row_prodi->nama_prodi."</option>";}
    ?>
    </select>

      <label for="tempatkp"><b>Tempat KP</b></label>
    <input type="text" placeholder="Nama Instansi / Perusahaan Tempat KP" name="tempatkp" required>

    <label for="alamatkp"><b>Alamat Tempat KP</b></label>
    <input type="text" placeholder="Alamat Tempat KP" name="alamatkp" required>

    <button class="btn"><i class="fa fa-download"></i> Ajukan Penambahan Angota</button>
    <hr>

    <i><p style="color: #ea2727">/* Periksalah kembali bahwa data yang anda isi sudah benar dan valid</p></i>
    <button type="submit" class="registerbtn">Submit</button>
  </div>
</div>
</div>



</body>
</html>
