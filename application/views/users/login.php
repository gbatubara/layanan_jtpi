<?php echo form_open('users/login'); ?>
<div class="container container-utama">
<div class="row content">
	<div class="row"  >
		<div class="col-md-4 col-md-offset-4">
      <?php
              $info = $this->session->flashdata('info');
              if(!empty($info))
              {
                echo $info;
              }
              ?>
      <div class="col-md-12">
			<h1 class="text-center"><?php echo $title; ?></h1>
			<div class="form-group">
        <label>Email</label>
				<input type="text" name="email" class="form-control" placeholder="Enter Email" required autofocus>
			</div>
			<div class="form-group">
        <label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
			</div>
			<label><?php echo "Berapa hasil dari ".$this->bil1." ".$this->operator." ".$this->bil2." ? "; ?></label>

							<input type="text" name="inicaptcha" value="<?php echo $result; ?>" hidden>
      <div class="form-group">
			<input type="text" name="kode" class="form-control" placeholder="Enter captcha" required autofocus>
      </div>
			<button type="submit" class="btn btn-primary btn-block">Login</button>
		</div>
	</div>
</div>
</div>
</div>
<?php echo form_close(); ?>
