<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #98FB98; /* Warna hijau mint */
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

<?php
include "config.php";
$hasil = mysqli_query($mysqli, "SELECT * FROM tbl_todo;");
?>

<?php
if (isset($_GET['pesan_tambah'])) {
    ?>
    <div class="alert alert-<?php echo $_GET['pesan_tambah'] == 'berhasil' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['pesan_tambah'] == 'berhasil' ? 'Berhasil' : 'Gagal'; ?> ditambah!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}

if (isset($_GET['pesan_edit'])) {
    ?>
    <div class="alert alert-<?php echo $_GET['pesan_edit'] == 'berhasil' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['pesan_edit'] == 'berhasil' ? 'Berhasil' : 'Gagal'; ?> diedit!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}

if (isset($_GET['pesan_hapus'])) {
    ?>
    <div class="alert alert-<?php echo $_GET['pesan_hapus']=='berhasil'?'success':'danger';?> alert-dismissible fade show" role="alert">
        <strong><?php echo $_GET['pesan_hapus']=='berhasil'?'Berhasil':'Gagal';?> dihapus!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
}
?>

<div class="container mt-4">
    <h2>Kegiatan Kamu</h2>

    <!-- Button trigger modal -->
    <button style="float: right;" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-plus"></i> Tambah
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title text-body" id="exampleModalLabel">Tambah Tugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="aksi_tambah_todo.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Tugas</label>
                            <input type="text" class="form-control" placeholder="Tugas" name="tugas" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jangka Waktu</label>
                            <input type="date" class="form-control" name="jangka_waktu" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <select class="form-control" name="keterangan">
                                <option>Belum Selesai</option>
                                <option>Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prioritas</label>
                            <select class="form-control" name="prioritas">
                                <option value="Low">Low</option>
                                <option value="Medium" selected>Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <table class="table table-bordered mt-3">
        <tr>
            <th>No</th>
            <th>Tugas</th>
            <th>Jangka Waktu</th>
            <th>Status</th>
            <th>Prioritas</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_array($hasil)) {
            echo "<tr>
            <td>$no</td>
            <td>{$row['tugas']}</td>
            <td>{$row['jangka_waktu']}</td>
            <td>{$row['keterangan']}</td>
            <td>{$row['prioritas']}</td>
            <td>
                <a href='index.php?halaman=edit_todo&id={$row['id']}' class='btn btn-warning btn-sm'>
                    <i class='fas fa-edit'></i> Edit
                </a>
                 <a href='aksi_hapus_todo.php?id={$row['id']}' onclick=\"return confirm('Apakah Anda yakin ingin menghapus?')\" class='btn btn-danger btn-sm'>
                    <i class='fas fa-trash'></i> Hapus
                </a>
            </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
