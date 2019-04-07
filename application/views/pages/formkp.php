<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #ae8319;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  font-size:20px;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 15px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}

</style>
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
