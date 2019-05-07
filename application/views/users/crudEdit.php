
    <div class="container">
    <br>
    <br>
        <form method="post" action="<?php echo site_url('Users/update')?>/<?php echo $row->id; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nim</label>
                <input type="text" class="form-control" name="nim" value="<?php echo $row->Nim; ?>" aria-describedby="emailHelp" placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row->Nama; ?>" aria-describedby="emailHelp" placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tempat KP</label>
                <input type="text" class="form-control" name="tempatkp" value="<?php echo $row->Tempat_KP; ?>" aria-describedby="emailHelp" placeholder="Enter contact no">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat KP</label>
                <input type="text" class="form-control" name="alamatkp" value="<?php echo $row->Alamat_KP; ?>" aria-describedby="emailHelp" placeholder="Enter bio">
            </div>
             <div class="form-group">
                <label for="exampleInputEmail1">Status</label>
                <select name="aksi" id="status_bayar" class="texbox" class="span4" value="<?php echo $Aksi; ?>">
                <option>--Pilih--</option>
                <option value="1">Selesai</option>
                <option value="2">Revisi</option>
                <option value="0">Diproses</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Users/crudView')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>
    </div>


  </body>
</html>
