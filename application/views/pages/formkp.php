<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css/formkp.css">

</head>
<body>

<div class="container container-utama">
<div class="row content">
          <form action=".php">
  <div class="container container-utama">
    <h1>Form Pengajuan KP JTPI</h1>
    <p>Silahkan isi form dengan lengkap</p>
   <i><p>"Kemudian silahkan download form yang terdapat pada link dibawah"</p></i>
    <hr>

    <label for="nama"><b>Nama</b></label>
    <input type="text" placeholder="Nama" name="nama" required>

    <label for="nim"><b>NIM</b></label>
    <input type="text" placeholder="NIM" name="nim" required>


    <label for="prodi"><b>Program Studi</b></label>
    <input type="text" placeholder="Program Studi" name="prodi" required>

      <label for="tempatkp"><b>Tempat KP</b></label>
    <input type="text" placeholder="Nama Instansi / Perusahaan Tempat KP" name="tempatkp" required>

    <label for="alamatkp"><b>Alamat Tempat KP</b></label>
    <input type="text" placeholder="Alamat Tempat KP" name="alamatkp" required>

    <button class="btn"><i class="fa fa-download"></i> Download Form</button>
    <hr>

    <i><p style="color: #ea2727">/* Periksalah kembali bahwa data yang anda isi sudah benar dan valid</p></i>
    <button type="submit" class="registerbtn">Submit</button>
  </div>
</form>



</body>
</html>
