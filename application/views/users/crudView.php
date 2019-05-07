
    <div class="container">
    <br>
    <br>

        


        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nim</th>
                <th scope="col">Nama</th>
                <th scope="col">Nama prodi</th>
                <th scope="col">Tempat KP</th>
                <th scope="col">Alamat KP</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $row) {?>
                  <?php
                  if ($row->Aksi == 0) {
                    $status = '<label class="label label-warning">Diproses</label>';
                  }
                  elseif ($row->Aksi == 1) {
                    $status = '<label class="label label-success">Selesai</label>';
                  }
                  else {
                    $status = '<label class="label label-danger">Revisi</label>';
                  }
                  ?>

                <tr>
                <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->Nim;?></td>
                <td><?php echo $row->Nama;?></td>
                <td><?php echo $row->nama_prodi;?></td>
                <td><?php echo $row->Tempat_KP;?></td>
                <td><?php echo $row->Alamat_KP;?></td>
                <td><?php echo $status; ?></td>

                <td> <a href="<?php echo site_url('users/edit');?>/<?php echo $row->id;?>">Edit</a>  |
                   <a href="<?php echo site_url('users/delete');?>/<?php echo $row->id;?>">Delete</a> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
  </body>
</html>
