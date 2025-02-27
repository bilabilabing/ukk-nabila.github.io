<?php 
include("config.php");
$hasil=mysqli_query($mysqli,"select * from tbl_todo where id='$_GET[id]'");
$row=mysqli_fetch_array($hasil);
?>

<div class="d-flex justify-content-center">
    <div class="card col-md-6">
        <div class="card-header">
            Edit Tugas
    </div>
    <form method="POST" action="aksi_edit_todo.php">
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Tugas</label>
                <input type="text" class="form-control" placeholder="Tugas" name="tugas" value="<?= $row['tugas']?>">
                <input type="hidden" class="form-control" placeholder="Tugas" name="id" value="<?= $row['id']?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jangka Waktu</label>
                <input type="date" class="form-control" placeholder="Tugas" name="jangka_waktu" value="<?= $row['jangka_waktu']?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Status</label>
                <select class="form-control" name="keterangan">
                    <option>Pilih</option>
                    <option selected <?php echo $row['keterangan']=='Belum Selesai'? 'selected':'' ?>>Belum Selesai</option>
                    <option <?php echo $row['keterangan']=='Selesai'?'selected':'' ?>>Selesai</option>
                </select>
                <div class="mb-3">
                    <label class="form-label">Prioritas</label>
                    <select class="form-control" name="prioritas">
                        <option value="Low">Low</option>
                        <option value="Medium" selected>Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-body-secondary">
            <a href="index.php?halaman=todo">
                <button type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"></i>Kembali</button>
            </a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
