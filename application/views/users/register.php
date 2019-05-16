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
				<?php echo validation_errors(); ?>
	<div class="row" style="background-color: #ffff">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group" class="col-log-9">
				<label>Nama</label>
				<input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required>
			</div>
			<div class="form-group">
				<label>NIM</label>
				<input type="text" class="form-control" name="nim" id="nim" onkeypress="return isNumberKey(event)" placeholder="NIM" maxlength="10" required>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" id="email" placeholder="example.nim@student.itera.ac.id" required>
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
				<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
			</div>
			<div class="form-group">
				<label>Konfirmasi Password</label>
				<input type="password" class="form-control" name="password2" id="password2" placeholder="Konfirmasi Password" required>
			</div>
			<button type="submit" id="btnsubmit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
</div>
</div>
</div>
</body>
<script type="text/javascript">
			 function isNumberKey(evt)
			 {
				 var kodeASCII = (evt.which) ? evt.which : event.keyCode
				 if (kodeASCII > 31 && (kodeASCII < 48 || kodeASCII > 57)){
					 return false;
					}
					return true;
				}
			 </script>
			 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnsubmit").click(function () {
								let email = $("#email").val();
								let nim = $("#nim").val();
								let vemail = email.substr(-20);
								let pstring = email.length;
								let charB = pstring-20;
								let kemail = email.substr(0, charB);
								let charA = kemail.indexOf('.');
								let vnim = kemail.substr(charA+1, charB);
                if ((vemail!="@student.itera.ac.id") || (nim != vnim)) {
                    alert("Email Tidak Sesuai Format.");
                    $("#email").focus();
                    return false;
                }
                return true;
            });
        });
    </script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnsubmit").click(function () {
                var password = $("#password").val();
                var confirmPassword = $("#password2").val();
                if (password != confirmPassword) {
                    alert("Passwords Tidak Sama.");
                    $("#password2").focus();
                    return false;
                }
                return true;
            	
            });
        });
			</script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#btnsubmit").click(function () {
                var password = $("#password").val();
                if (password.length<8 || password.length>12) {
                    alert("Password Minimal 8 - 12 Karakter");
                    $("#password").focus();
                    return false;
                }
                return true;
            	
            });
        });
			</script>	
</html>
<?php echo form_close(); ?>
