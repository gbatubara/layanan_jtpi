<?php echo form_open('users/register'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container container-utama">
<div class="row content">
          <div class="col-md-12">
						<?php
		                $info = $this->session->flashdata('info');
		                if(!empty($info))
		                {
		                  echo $info;
		                }
		                ?>
	<div class="row" style="background-color: #ffff">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group" class="col-log-9">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name" required>
			</div>
			<div class="form-group">
				<label>Nim</label>
				<input type="text" class="form-control" name="nim" placeholder="NIM" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email" required>
			</div>
			<div class="form-group">
				<label>Program Studi</label>
				<select name="pilihanprodi" id="pilihanprodi" class="form-control">
        <option value='' disabled selected>--Pilih--</option>
				<?php
        foreach ($nama_prodi->result() as $row_prodi) {
        echo "<option value='".$row_prodi->kode_prodi."'>".$row_prodi->nama_prodi."</option>";}
        ?>
				</select>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password" required>
			</div>
			<div class="form-group">
				<label>Konfirmasi Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required>
			</div>
			<button type="submit" id="btnsubmit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>
<?php echo form_close(); ?>
