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
<p><h1><center>Welcome to the JTPI application</p>
        </div>
      </div>
  </div>
