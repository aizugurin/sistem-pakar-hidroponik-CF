<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='simpan') {
        $nama_lengkap = $_POST['nama_lengkap'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $umur = $_POST['umur'];

        mysqli_query($conn,"INSERT INTO tbl_pengguna (nama_lengkap,jenis_kelamin,umur)VALUES('$nama_lengkap','$jenis_kelamin','$umur')");
        header("location:pengguna.php");

    }
}   
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Tambah Data</h5>
        </div>

        <div class="card-body">
            
            <form action="pengguna-simpan.php?aksi=simpan" method="POST">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option selected disabled>Pilih</option>
                        <option>Pria</option>
                        <option>Wanita</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control">
                </div>

                <a href="pengguna.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form> 
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>