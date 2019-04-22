<!DOCTYPE html>
<html><head>
	<title>filter data di php codeigniter</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap/css/tablefilter.css">
</head>


<body>
	<div class="container" style="background:#fff;margin-top:0px; padding-top:30px; padding-bottom:15px; border-bottom:solid thin #e8e8e8; box-shadow:         0px -6px 22px 0px rgba(0, 0, 0, 0.2); border-radius: 3px;">
		<div class="row">
			<h1 align="center">Daftar Mahasiswa Pengajuan KP</h1>
		<br>
		<div class="col-md-3">

			<table class="table">
					<tr>
						<select name="" class="form-control" id="angkatan">
							<option value="0">show all</option>
							<option value="123">informatika</option>
							<option value="2">2018</option>
							<option value="3">2019</option>
						</select>
					</tr>
			</table>
		</div>
		<div class="col-md-9">
			<table class="table table-hover table-striped" id="mahasiswa">
					<thead>
						<tr>
						<td>No</td>
						<td>Nama</td>
						<td>Nim</td>
						<td>Email</td>
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
