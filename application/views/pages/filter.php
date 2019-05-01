<!DOCTYPE html>
<html><head>
<link href="<?php echo base_url()?>assets/css/bootstrap/css/filter.css" rel="stylesheet">
<link rel="stylesheet" href="http://jtpi.itera.ac.id/wp-content/themes/itera-1/css/font-awesome/css/font-awesome.min.css">

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"> -->
</head>

<body>
	<div class="container" style="background:#fff">
		<div class="row">
		<h1 align="center">Daftar Mahasiswa Pengajuan KP</h1>
		<br>

		<div class="col-md-9">
		</div>

		<div class="col-md-3">

			<table class="table">
					<tr>
						<div class="col-md-10">
						<select name="" class="form-control" id="angkatan">
							<option value="0">Show all</option>
							<option value="1">Teknik Elektro</option>
							<option value="2">Teknik Geofisika</option>
							<option value="3">Teknik Informatika</option>
              <option value="4">Teknik Mesin</option>
              <option value="5">Teknik Industri</option>
              <option value="6">Teknik Kimia</option>
              <option value="7">Teknik Geologi</option>
              <option value="8">Teknik Fisika</option>
              <option value="9">Teknik Biosistem</option>
              <option value="10">Teknik Sistem Energi</option>
              <option value="11">Teknik Industri Pertanian</option>
              <option value="12">Teknik Teknologi Pangan</option>
              <option value="13">Teknik Pertambangan</option>
              <option value="14">Teknik Material</option>
              <option value="15">Teknik Telekomunikasi</option>
						</select>
						</div>
					</tr>
			</table>
		</div>

		<div class="col-md-12">
			<table class="table table-hover table-striped" id="mahasiswa">
					<thead>
						<tr>
						<td>No</td>
						<td>Nim</td>
						<td>Nama</td>
						<td>Program Studi</td>
						<td>Tempat KP</td>
						<td>Alamat KP</td>
						<td>Status</td>
					</tr>
					</thead>
					<tbody>

					</tbody>
			</table>
		</div>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		mahasiswa();
		$("#angkatan").change(function(){
			// let a =$(this).val();
			// console.log(a);
			mahasiswa();
		});
	});
	function mahasiswa(){
		var angkatan= $("#angkatan").val();
		$.ajax({
			url : "<?= base_url('Filter/load_mahasiswa')?>",
			data: "angkatan=" + angkatan,
			success:function(data){
				//$("#mahasiswa tbody").html('<tr><td colspan="4"align="center">Tidak ada data</td></tr>')
				//console.log(data);
				$("#mahasiswa tbody").html(data);
			}
		});
	}
</script>
</body>
</html>
