<?php
include "koneksi.php";
$nip = $_GET['nip'];
$sql = "Select * From guru where nip='$nip'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Menambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-
YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'menu.php'; ?>
    <div class="container">
        <h2>TAMBAH GURU</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" class="form-control" name="nip" value='<?php echo
                                                                            $row['nip']; ?>' placeholder="Masukkan NIM" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value='<?php echo
                                                                            $row['nama_guru']; ?>' placeholder="Masukkan Nama">
            </div>
            <div class="mb-3">
                <label class="form-label">tempat Lahir</label>
                <input type="text" class="form-control" name="tempatLahir" value='<?php echo
                                                                                    $row['tempat_lahir']; ?>' placeholder="Masukkan Tempat Lahir">
            </div>
            <div class="mb-3">
                <label class="form-label">Tgl Lahir</label>
                <input type="date" class="form-control" name="tglLahir" value='<?php echo
                                                                                $row['tgl_lahir']; ?>' placeholder="Masukkan Tgl Lahir">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jk" aria-label="Default select example">
                    <option selected>Pilih Menu</option>
                    <option <?php echo $row['jenkel'] == 'L' ? "selected" : "" ?> value="L">LakiLaki</option>
                    <option <?php echo $row['jenkel'] == 'P' ? "selected" : "" ?> value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" rows="3" name="alamat"><?php echo
                                                                        $row['alamat']; ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No HP</label>
                <input type="text" class="form-control" name="noHp" value="<?php echo
                                                                            $row['no_hp']; ?>" placeholder="No HP">
            </div>
            <div class="mb-3">
                <label class="form-label">Pendidikan</label>
                <input type="text" class="form-control" name="pendidikan" value="<?php echo
                                                                                    $row['pend_akhir']; ?>" placeholder="Pendidikan">
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['submit'])) {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $tempatLahir = $_POST['tempatLahir'];
        $tglLahir = $_POST['tglLahir'];
        $jk = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $noHp = $_POST['noHp'];
        $pendidikan = $_POST['pendidikan'];
        $sql = "UPDATE guru SET
nama_guru='$nama',tempat_lahir='$tempatLahir',tgl_lahir='$tglLahir',jenkel='$jk',ala
mat='$alamat',no_hp='$noHp',pend_akhir='$pendidikan' WHERE nip='$nip'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:guru_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>