
<div class="col-md-9">
    <div class="box box-success">
    <div class="box-header">
        <i class="fa fa-info-circle" aria-hidden="true"></i>
        <h3 class="box-title text-center">Edit Status Perizinan</h3>
    </div>
</div>
        <form method="post" action="<?php echo site_url('Admin/update_izin')?>/<?php echo $row->id; ?>">
            <div class="form-group">
                <label for="Nim">Nim</label>
                <input type="text" class="form-control" name="nim" readonly value="<?php echo $row->Nim; ?>">
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control" name="name" readonly value="<?php echo $row->Nama; ?>">
            </div>
            <div class="form-group">
                <label for="Nama Kegiatan">Nama Kegiatan</label>
                <input type="text" class="form-control" name="tempatkp" readonly value="<?php echo $row->Nama_kegiatan; ?>">
            </div>
            <div class="form-group">
                <label for="Agenda">Agenda</label>
                <input type="text" class="form-control" name="alamatkp" readonly value="<?php echo $row->Agenda; ?>">
            </div>
             <div class="form-group">
                <label for="Tempat">Tempat</label>
                <input type="text" class="form-control" name="alamatkp" readonly value="<?php echo $row->Tempat; ?>">
            </div>
             <div class="form-group">
                <label for="Tanggal/Waktu">Tanggal/Waktu</label>
                <input type="text" class="form-control" name="alamatkp" readonly value="<?php echo $row->Tanggal." ".$row->Waktu; ?>">
            </div>
             <div class="form-group">
                <label for="namapj">Nama Penanggung Jawab</label>
                <input type="text" class="form-control" name="alamatkp" readonly value="<?php echo $row->Namapj; ?>">
            </div>
             <div class="form-group">
                <label for="jabatanpj">Jabatan Penanggung Jawab</label>
                <input type="text" class="form-control" name="alamatkp" readonly value="<?php echo $row->Jabatanpj; ?>">
            </div>
             <div class="form-group">
                <label for="Status">Status</label>
                <select name="aksi" id="aksi" class="texbox" class="span4" value="<?php echo $Aksi; ?>">
                <option>--Pilih--</option>
                <option value="1">Selesai</option>
                <option value="2">Revisi</option>
                <option value="0">Diproses</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" value="save">Submit</button>
            <a href="<?php echo site_url('Admin/t_perizinan')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        </form>
    </div>
