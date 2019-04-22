<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8" />

	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/images/logo%20itera%20oke.png"/>
	<title>Jurusan Teknologi Produksi, Industri, dan Informasi</title>

	<link rel="stylesheet" href="assets/css/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome/font-awesome.css">

	<link rel='stylesheet' id='open-sans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=4.4.2' type='text/css' media='all' />

	<!-- jquery ui -->
	<script src="<?php echo base_url()?>bootstrap-3.3.6/dist/js/jquery-2.2.1.min.js"></script>
	<script src="<?php echo base_url()?>bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>

	<!-- Bootstrap -->
	<link href="<?php echo base_url()?>assets/bootstrap-3.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/bootstrap-3.3.6/dist/css/bootstrap.css">
	<link rel="stylesheet" href="http://jtpi.itera.ac.id/wp-content/themes/itera-1/css/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/style.css" type="text/css" media="screen" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

	<body>
		<div class="container" style="background:#fff;margin-top:0px; padding-top:30px; padding-bottom:15px; border-bottom:solid thin #e8e8e8; box-shadow:         0px -6px 22px 0px rgba(0, 0, 0, 0.2); border-radius: 3px;">

		      <!-- top -->
		    <div class="container ">
		      <div class="row ">
		        <div class="col-md-1">
		            <a href="<?php echo base_url()?>">
		              <img src="<?php echo base_url()?>assets/images/logo%20itera%20oke.png" width="70px" style="margin-bottom:10px; "/>

		            </a>

		        </div>
		        <div class="col-md-5">
		          <h3>Jurusan Teknologi Produksi, Industri, dan Informasi</h3>
		          <p><em>"Institut Teknologi Sumatera"</em></p>
		        </div>
		        <div class="col-md-6">

		        </div>
		      </div>
		    </div>
		    <!-- end top -->
</div>




    <div class="container top" style="background:#daa520;" >
    <nav class="navbar navbar-default ">
        <div class="container">
            <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-left menu">
            <li><a href="<?php echo base_url() ?>"><i class="glyphicon glyphicon-home"></i> Home</a></li>
						<li><a href="<?php echo base_url(); ?>filter">Validasi</a></li>
			<li><a href="#"><i class="glyphicon glyphicon-user"></i> Profil</a></li>
			<li><a href="#">Program Studi</a></li>
			<li><a href="<?php echo base_url() ?>kalenderakademik"><i class="glyphicon glyphicon-calendar"></i> Kalender Akademik</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right menu">
           <?php if(!$this->session->userdata('login')) : ?>
             <li><a href="<?php echo base_url() ?>users/login"><i class="glyphicon glyphicon-log-in"></i> Login</a></li>
            <li><a href="<?php echo base_url() ?>users/register"><i class="glyphicon glyphicon-user"></i> Register</a></li>
						<li><a href="<?php echo base_url() ?>users/crudView">crud</a></li>
          <?php else : ?>
						<li><a href="<?php echo base_url() ?>pages/dashboard"><i class="glyphicon glyphicon-user"></i> Dashboard</a></li>
						<li><a href="<?php echo base_url() ?>users/logout"><i class="glyphicon glyphicon-log-out"></i> Log out</a></li>
          <?php endif; ?>

          </ul>

        </div>
      </div>
    </nav>
  </div>

	<!-- Flash messages -->
	      <!--?php if($this->session->flashdata('user_registered')): ?-->
	        <!--?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?-->
	      <!--?php endif; ?-->

	      <!--?php if($this->session->flashdata('login_failed')): ?-->
	        <!--?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?-->
	      <!--?php endif; ?-->

	      <!--?php if($this->session->flashdata('user_loggedin')): ?-->
	        <!--?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?-->
	      <!--?php endif; ?-->

	       <!--?php if($this->session->flashdata('user_loggedout')): ?-->
	        <!--?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?-->
	      <!--?php endif; ?-->
</body>
</html>
