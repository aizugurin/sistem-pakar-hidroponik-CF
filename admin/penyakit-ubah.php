<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='ubah') {
        $id_penyakit = $_POST['id_penyakit'];
        $nama_penyakit = $_POST['nama_penyakit'];
        $keterangan = $_POST['keterangan'];
        $solusi = $_POST['solusi'];

        mysqli_query($conn,"UPDATE tbl_penyakit SET nama_penyakit='$nama_penyakit', keterangan='$keterangan', solusi='$solusi' WHERE id_penyakit='$id_penyakit'");
        header("location:penyakit.php");

    }
}   
include 'header.php';
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Ubah Data</h5>
        </div>
        
        <?php
        $penyakit = mysqli_query($conn,"SELECT * FROM tbl_penyakit WHERE id_penyakit='$_GET[id_penyakit]'");
        $a = mysqli_fetch_array($penyakit);
        ?>

        <div class="card-body">
            
            <form action="penyakit-ubah.php?aksi=ubah" method="POST">
                <input type="hidden" name="id_penyakit" value="<?= $a['id_penyakit']?>">
                <div class="form-group">
                    <label>Nama Penyakit</label>
                    <input type="text" name="nama_penyakit" class="form-control" value="<?= $a['nama_penyakit']?>">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan" rows="4"><?= $a['keterangan']?></textarea>
                </div>
                <div class="form-group">
                    <label>Solusi</label>
                    <textarea class="form-control" name="solusi" rows="4"><?= $a['solusi']?></textarea>
                </div>
                
                <a href="penyakit.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Ubah" class="btn btn-primary">
            </form> 
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>