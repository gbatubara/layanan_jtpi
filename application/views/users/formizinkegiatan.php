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

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
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
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="/action_page.php">
  <div class="container">
    <h1>Form Perizinan Kegiatan JTPI</h1>
    <p>Silahkan isi form dengan lengkap dan benar</p>
    <i><p>"Kemudian silahkan download form yang terdapat pada link dibawah"</p></i>
    <hr>

    <label for="nama"><b>Nama</b></label>
    <input type="text" placeholder="Nama" name="nama" required>
    
        <label for="nim"><b>NIM</b></label>
    <input type="text" placeholder="NIM" name="nim" required>
    
        <label for="prodi"><b>Program Studi</b></label>
    <input type="text" placeholder="Program Studi" name="prodi" required>
    	 <hr>
        <label for="namakegiatan"><b>Nama Kegiatan</b></label>
    <input type="text" placeholder="Nama Kegiatan" name="namakegiatan" required>
    
        <label for="agenda"><b>Agenda Kegiatan</b></label>
    <input type="text" placeholder="Agenda Kegiatan" name="agenda" required>
    
        <label for="tempat"><b>Tempat Pelaksanaan</b></label>
    <input type="text" placeholder="Tempat Pelaksanaan" name="tempat" required>
        <hr>
        <label for="tanggal"><b>Tanggal Pelaksanaan</b></label>
    <input type="text" placeholder="Tanggal" name="tanggal" required>
    
        <label for="waktu"><b>Waktu Pelaksanaan</b></label>
    <input type="text" placeholder="Waktu" name="waktu" required>
    
        <label for="namapj"><b>Nama Penanggung Jawab</b></label>
    <input type="text" placeholder="Nama Penanggung Jawab" name="namapj" required>
    
        <label for="jabatanpj"><b>Jabatan Penanggung Jawab</b></label>
    <input type="text" placeholder="Jabatan Penanggung Jawab" name="jabatanpj" required>
    
   
    <hr>
    <i><p style="color: #ea2727">Catatan:</p></i>
    <p>Menunjukkan surat pernyataan dari prodi/pembina/surat tugas/ proposal.
Siap menerima sanksi disiplin apabila pelaksanaan kegiatan melewati jadwal yang telah ditentukan.</p>
<i><p style="color: #ea2727">/* Periksalah kembali bahwa data yang anda isi sudah benar dan valid</p></i>
    <button type="submit" onclick="submit" id="btnsubmit" class="registerbtn">Submit</button>

</form>

</body>
</html>
