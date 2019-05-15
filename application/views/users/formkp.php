<?php echo form_open('users/formkp'); ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap/css/formkp.css">
</head>
<body>
<div class="container container-utama">
<div class="row content">
  <div class="col-md-12">
    <center><h1>Form Pengajuan KP JTPI</h1></center>
    <p style="margin-left: 200px; margin-top: 50px">Silahkan isi form dengan lengkap dan benar</p>
   <i><p style="margin-left: 200px">"Kemudian silahkan download form yang terdapat pada link dibawah"</p></i>
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
    <label><b>Nama</b></label>
    <input type="text" class="form-control" name="name" readonly value="<?php echo $row->nama_mhs;?>" required>

    <label><b>NIM</b></label>
    <input type="text" placeholder="NIM" class="form-control" name="nim" readonly value="<?php echo $row->nim;?>" required>


    <label for="prodi"><b>Program Studi</b></label>
    <input type="text" class="form-control" name="viewprodi"  readonly value="<?php echo $row->nama_prodi;?>" required>

    <label><b>No.HP</b></label>
    <input type="text" placeholder="Nomor Hp" class="form-control" name="nomorhp" required>

    <label><b>Tempat KP</b></label>
    <input type="text" placeholder="Nama Instansi / Perusahaan Tempat KP" class="form-control" name="tempatkp" required>

    <label><b>Alamat Tempat KP</b></label>
    <input type="text" placeholder="Alamat Tempat KP" class="form-control" name="alamatkp" required>


        <!--<i><link><a href="<?php echo base_url() ?>users/add_user/"> Ajukan Penambahan Angota</a></i></link>
        &emsp;?-->

    <hr>
    <i><p style="color: #ea2727">/* Periksalah kembali bahwa data yang anda isi sudah benar dan valid</p></i>
    <button style="margin-bottom: 50px" type="submit" onclick="submit" id="btnsubmit" class="registerbtn">Submit</button>
  </div>
</div>
</div>
</body>
</html>
<?php echo form_close(); ?>
