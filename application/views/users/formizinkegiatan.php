<?php echo form_open('users/izinkegiatan'); ?>
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
    <h1>Form Perizinan Kegiatan JTPI</h1>
    <p>Silahkan isi form dengan lengkap dan benar</p>
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
    <label for="name"><b>Nama</b></label>
    <input type="text" placeholder="Nama" class="form-control" name="name" required>

    <label for="nim"><b>NIM</b></label>
    <input type="text" placeholder="NIM" class="form-control" name="nim" required>

    <label for="prodi"><b>Program Studi</b></label>
    <select name="pilihanprodi" id="pilihanprodi" class="form-control" required>
    <option value='' disabled selected>--Pilih--</option>
    <?php
    foreach ($nama_prodi->result() as $row_prodi) {
    echo "<option value='".$row_prodi->kode_prodi."'>".$row_prodi->nama_prodi."</option>";}
    ?>
    </select>

    <label for="namakegiatan"><b>Nama Kegiatan</b></label>
    <input type="text" placeholder="Nama Kegiatan" class="form-control" name="namakegiatan" required>

    <label for="agenda"><b>Agenda Kegiatan</b></label>
    <input type="text" placeholder="Agenda Kegiatan" class="form-control" name="agenda" required>

    <label for="tempat"><b>Tempat Pelaksanaan</b></label>
    <input type="text" placeholder="Tempat Pelaksanaan" class="form-control" name="tempat" required>


    <label for="tanggal"><b>Tanggal Pelaksanaan</b></label>
    <input type="date" placeholder="Tanggal" class="form-control" name="tanggal" value="" required>


    <label for="waktu"><b>Waktu Pelaksanaan</b></label>
    <input type="time" placeholder="Waktu" class="form-control" name="waktu" value="" required>


    <label for="namapj"><b>Nama Penanggung Jawab</b></label>
    <input type="text" placeholder="Nama Penanggung Jawab" class="form-control" name="namapj" required>

    <label for="jabatanpj"><b>Jabatan Penanggung Jawab</b></label>
    <input type="text" placeholder="Jabatan Penanggung Jawab" class="form-control" name="jabatanpj" required>

    <hr>
    <i><p style="color: #ea2727">Catatan:</p></i>
    <p>Menunjukkan surat pernyataan dari prodi/pembina/surat tugas/ proposal.
Siap menerima sanksi disiplin apabila pelaksanaan kegiatan melewati jadwal yang telah ditentukan.</p>
<i><p style="color: #ea2727">/* Periksalah kembali bahwa data yang anda isi sudah benar dan valid</p></i>
    <button type="submit" onclick="submit" id="btnsubmit" class="registerbtn">Submit</button>

  </div>
</div>
</div>
</body>
</html>
<?php echo form_close(); ?>
