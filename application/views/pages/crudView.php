<?php echo form_open('Pages/crudView'); ?>
  <div class="container container-utama">
<div class="row content">
          <div class="col-md-12">
    <br>
    <br>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add
        </button>
    <br>
    <br>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('CrudController/create')?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" name="lastName" aria-describedby="emailHelp" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" class="form-control" name="firstName" aria-describedby="emailHelp" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" aria-describedby="emailHelp" placeholder="Enter birthdate">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact No</label>
                        <input type="text" class="form-control" name="contactNo" aria-describedby="emailHelp" placeholder="Enter contact no">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bio</label>
                        <input type="text" class="form-control" name="bio" aria-describedby="emailHelp" placeholder="Enter bio">
                    </div>
                    <button type="submit" class="btn btn-primary" value="save">Submit</button>
                </form>
            </div>
            </div>
        </div>
        </div>


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
                <?php foreach($result as $row) {
                  ?>
                <tr>
                <th scope="row"><?php echo $row->id; ?></th>
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
