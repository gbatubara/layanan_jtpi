<?php echo form_open('Pages/crudView'); ?>
  <div class="container container-utama">
<div class="row content">
          <div class="col-md-12">
    <br>
    <br>




        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Tempat KP</th>
                <th scope="col">Alamat KP</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
              <tr>
                <?php
                $no=1;
                foreach ($data->result() as $row) {
                  ?>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->nim; ?></td>
                <td><?php echo $row->nama; ?></td>
                <td><?php echo $row->prodi; ?></td>
                <td><?php echo $row->temat_kp; ?></td>
                <td><?php echo $row->alamat_kp; ?></td>
                <td> <a href="<?php echo site_url('CrudController/edit');?>/<?php echo $row->id;?>">Edit</a>  |
                   <a href="<?php echo site_url('CrudController/delete');?>/<?php echo $row->id;?>">Delete</a> </td>
                </tr>
              <?php } ?>
        </table>
    </div>
  </div>
</div>
</div>
<?php echo form_close(); ?>
