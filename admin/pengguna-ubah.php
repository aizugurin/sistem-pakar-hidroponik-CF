<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='ubah') {
        $id_pengguna = $_POST['id_pengguna'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $umur = $_POST['umur'];

        mysqli_query($conn,"UPDATE tbl_pengguna SET nama_lengkap='$nama_lengkap', jenis_kelamin='$jenis_kelamin', umur='$umur' WHERE id_pengguna='$id_pengguna'");
        header("location:pengguna.php");

    }
}   
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Ubah Data</h5>
        </div>

        <div class="card-body">
            <?php
            $data = mysqli_query($conn,"SELECT * FROM tbl_pengguna WHERE id_pengguna='$_GET[id_pengguna]'");
            $a = mysqli_fetch_array($data);
            ?>
            <form action="pengguna-ubah.php?aksi=ubah" method="POST">
                <input type="hidden" name="id_pengguna" value="<?= $a['id_pengguna']?>">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" value="<?=$a['nama_lengkap']?>">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option selected><?=$a['jenis_kelamin']?></option>
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control" value="<?=$a['umur']?>">
                </div>

                <a href="pengguna.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Ubah" class="btn btn-primary">
            </form> 
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>