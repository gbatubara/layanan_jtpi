<!DOCTYPE html>
<html><head>
	<title>Validasi Mahasiswa</title>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"> -->
</head>

<style type="text/css">
.table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
  margin-top: 10px;
  margin-bottom: 20px;
}

.table th {
  padding: 15px 35px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}

.table th:first-child{
  border-left:none;
}

.table tr {
  text-align: center;
  padding-left: 20px;
}

.table td:first-child {
  text-align: left;
  padding-left: 20px;
  border-left: 0;
}

.table td {
  padding: 15px 35px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}

.table tr:last-child td {
  border-bottom: 0;
}

table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}

table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
}







</style>

<body>
	<div class="container">
		<div class="row">
			<h1 align="center">Validasi Mahasiswa</h1>
		<br>
		<div class="col-md-3">

			<table class="table">
					<tr>
						<select name="" class="form-control" id="angkatan">
							<option value="0">show all</option>
							<option value="1">Teknik elektro</option>
							<option value="2">Teknik geofisika</option>
							<option value="3">Teknik informatika</option>
              <option value="4">Teknik Mesin</option>
              <option value="5">Teknik industri</option>
              <option value="6">Teknik kimia</option>
              <option value="7">Teknik geologi</option>
              <option value="8">Teknik fisika</option>
              <option value="9">Teknik Biosistem</option>
              <option value="10">Teknik sistem energi</option>
              <option value="11">Teknik industri Pertanian</option>
              <option value="12">Teknik Teknologi Pangan</option>
              <option value="13">Teknik Pertambangan</option>
              <option value="14">Teknik Material</option>
              <option value="15">Teknik Telekomunikasi</option>
						</select>
					</tr>
			</table>
		</div>
		<div class="col-md-9">
			<table class="table table-hover table-striped" id="mahasiswa">
					<thead>
						<tr>
						<td>#</td>
						<td>Nim</td>
						<td>Nama</td>
						<td>Tempat KP</td>
						<td>alamat KP</td>
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
