<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='simpan') {
        $nama_penyakit = $_POST['nama_penyakit'];
        $keterangan = $_POST['keterangan'];
        $solusi = $_POST['solusi'];

        mysqli_query($conn,"INSERT INTO tbl_penyakit (nama_penyakit,keterangan,solusi)VALUES('$nama_penyakit','$keterangan','$solusi')");
        header("location:penyakit.php");

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
            
            <form action="penyakit-simpan.php?aksi=simpan" method="POST">
                <div class="form-group">
                    <label>Nama Penyakit</label>
                    <input type="text" name="nama_penyakit" class="form-control">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label>Solusi</label>
                    <textarea class="form-control" name="solusi" rows="4"></textarea>
                </div>
                
                <a href="penyakit.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form> 
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>