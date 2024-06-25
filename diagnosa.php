<?php
date_default_timezone_set('Asia/Jakarta');
include '../assets/conn/config.php';
//for create no_regdiagnosa
function generateRandomString($Length){
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i=0; $i < $Length; $i++){
        $randomString .= $characters[rand(0, strlen($characters) -1)];
    }
    return $randomString;
}
$panjangString = 10;
if (isset($_GET['aksi'])) {
    if ($_GET['aksi']=='diagnosa') {

        $no_regdiagnosa = generateRandomString($panjangString);
        $tgl_diagnosa = date('Y-m-d');
        $id_pengguna = $_POST['id_pengguna'];

        $query = "INSERT INTO tbl_diagnosa(no_regdiagnosa, tgl_diagnosa, id_pengguna, id_gejala, nilai_pengguna) VALUES (?, ?, ?, ?, ?,)";

        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "ssiss", $no_regdiagnosa, $tgl_diagnosa, $id_pengguna, $id_gejala, $kondisi);

            foreach($_POST['kondisi'] as $key => $value) {
                $kondisi = $value;
                $id_gejala = $_POST['id_gejala'][$key];
                mysqli_stmt_execute($stmt);

            }
            mysqli_stmt_close($stmt);
        }

        mysqli_close($conn);
        header("location: diagnosa.php?no_regdiagnosa=$no_regdiagnosa");
        exit();
    }
}
 include 'header.php';
 $nama_lengkap = $_SESSION['nama_lengkap'];
 $pas = mysqli_query($conn,"SELECT * FROM tbl_pengguna WHERE nama_lengkap='$nama_lengkap'");
 $p = mysqli_fetch_array($pas);
 $id_pengguna = $p['id_pengguna'];
?>

<div class="container">
	<div class="card shadow p-5 mb-5">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Diagnosa</h5>
        </div>

        <div class="card-body">
            <form action="diagnosa.php?aksi=diagnosa" method="POST" enctype="multipart/form-data">
                <div class="table-responsive">

                <table class="table table-bordered">
                <tr>
                    <th class='text-center'>No</th>
                    <th class='text-center'>Gejala</th>
                    <th class='text-center'>Pilih</th>
                </tr>

                <?php
                $data = mysqli_query($conn, "SELECT * FROM tbl_gejala ORDER BY id_gejala");
                $i=0;
                while ($a=mysqli_fetch_array($data)) {
                    $i++;
                    echo "
                    
<tr>
<td class='text-center'>$i</td>
<td class='text-justify'>Apakah tanaman sawi anda mengalami gejala <b> $a[nama_gejala]</b> ?</td>
<td>
<select class='form-control' name='kondisi[]'>
<option selected disabled>Pilih Kondisi</option>
<option value='0'>Tidak</option>
<option value='0.2'>Tidak Tau</option>
<option value='0.4'>Mungkin</option>
<option value='0.6'>Ya</option>
<option value='1'>Betul Sekali</option>
</select>
</td>
</tr>

                    <input type='hidden' name='id_gejala[]' value='$a[id_gejala]'>
                    ";

                }
                ?>

                </table>
                </div>
                
                
                <input type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>">
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <input type="submit" value="Proses Diagnosa" class="btn btn-primary">
            </form> 
        </div>
        <br>
        </br>
        <center>
            <h2 class="m-0 font-wight-bold text-primary">Hasil Analisa Metode CERTAINTY FACTOR</h2>
        </center>
        <hr>
        <div>

        <table>

        </table>
            </div>
        
    </div>
</div>