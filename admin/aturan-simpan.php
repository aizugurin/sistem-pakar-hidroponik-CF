<?php
include '../assets/conn/config.php';
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='simpan') {
        $id_gejala = $_POST['id_gejala'];
        $id_penyakit = $_POST['id_penyakit'];

        mysqli_query($conn,"INSERT INTO tbl_aturan (id_gejala,id_penyakit)VALUES('$id_gejala','$id_penyakit')");
        header("location:aturan.php");

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
            
            <form action="aturan-simpan.php?aksi=simpan" method="POST">
                <div class="form-group">
                    <label>Gejala</label>
                    <select name="id_gejala" class="form-control">
                        <?php
                        $gejala = mysqli_query($conn,"SELECT * FROM tbl_gejala ORDER BY id_gejala");
                        while($dtG = mysqli_fetch_array($gejala)){
                            echo "<option value='".$dtG['id_gejala']."'>".$dtG['nama_gejala']." - ".$dtG['nilai_gejala']."</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Penyakit</label>
                    <select name="id_penyakit" class="form-control">
                        <?php
                        $penyakit = mysqli_query($conn,"SELECT * FROM tbl_penyakit ORDER BY id_penyakit");
                        while($dtG = mysqli_fetch_array($penyakit)){
                            echo "<option value='".$dtG['id_penyakit']."'>".$dtG['nama_penyakit']."</option>";
                        }
                        ?>
                    </select>
                </div>
                
                <a href="aturan.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form> 
        </div>
    </div>
</div>

<?php 
include 'footer.php';
?>