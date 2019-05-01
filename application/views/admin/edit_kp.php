
<div class="col-md-9">
    <div class="box box-success">
    <div class="box-header">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        <h3 class="box-title text-center">Edit Status KP</h3>
    </div>
</div>
        <form method="post" action="<?php echo site_url('Admin/update_kp')?>/<?php echo $row->id; ?>">
            <div class="form-group">
                <label for="Nim">Nim</label>
                <input type="text" class="form-control" name="nim" readonly value="<?php echo $row->Nim; ?>">
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control" name="name" readonly value="<?php echo $row->Nama; ?>">
            </div>
            <div class="form-group">
                <label for="Tempat KP">Tempat KP</label>
                <input type="text" class="form-control" name="tempatkp" readonly value="<?php echo $row->Tempat_KP; ?>">
            </div>
            <div class="form-group">
                <label for="Alamat KP">Alamat KP</label>
                <input type="text" class="form-control" name="alamatkp" readonly value="<?php echo $row->Alamat_KP; ?>">
            </div>
             <div class="form-group">
                <label for="Status">Status</label>
                <select name="aksi" id="aksi" class="texbox" class="span4" value="<?php echo $Aksi; ?>">
                <option>--Pilih--</option>
                <option value="1">Diterima</option>
                <option value="2">Ditolak</option>
                <option value="0">Diproses</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Admin/t_kp')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>
    </div>