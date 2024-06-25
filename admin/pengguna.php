<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='hapus') {
        mysqli_query($conn,"DELETE FROM tbl_pengguna WHERE id_pengguna='$_GET[id_pengguna]'");
        header("location:pengguna.php");

    }
}   
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Pengguna</h5>
        </div>

        <div class="card-body">
            <a href="pengguna-simpan.php" class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp; Tambah Data</a>
            <br>
            <br>


            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Jenis Kelamin</th>
                        <th class="text-center">Umur</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                    <?php 
                    $data = mysqli_query($conn,"SELECT * FROM tbl_pengguna ORDER BY id_pengguna");
                    $no=1;
                    while ($a=mysqli_fetch_array($data)) {?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $a['nama_lengkap'] ?></td>
                            <td class="text-center"><?= $a['jenis_kelamin'] ?></td>
                            <td class="text-center"><?= $a['umur'] ?></td>
                            <td class="text-center">
                                <a href="pengguna-ubah.php?id_pengguna=<?= $a['id_pengguna'] ?>" class="btn btn-secondary"><span class="fa fa-pen"></span></a>
                                <a href="pengguna.php?id_pengguna=<?= $a['id_pengguna'] ?>&aksi=hapus" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        <?php } ?>
                </table>
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>