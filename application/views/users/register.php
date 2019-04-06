<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://localhost/projectppl/assets/css/cssregister.css">
	<title></title>
</head>
<body>
	<div class="container container-utama">
<div class="row content">
          <div class="col-md-12">
	<div class="row" style="background-color: #ffff">
		<div class="col-md-4 col-md-offset-4">
			<h1 class="text-center"><?= $title; ?></h1>
			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="name" placeholder="Name">
			</div>
			<div class="form-group">
				<label>NIM</label>
				<input type="text" class="form-control" name="zipcode" placeholder="NIM">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" class="form-control" name="password2" placeholder="Confirm Password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Submit</button>
		</div>
	</div>
</div>
</div>
</div>
</body>
</html>
<?php echo form_close(); ?>
