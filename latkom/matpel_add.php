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
    <?php include 'menu.php';?> 
    <div class="container">
        <h2>TAMBAH Matpel</h2>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">kode matpel</label>
                <input type="text" class="form-control" name="kodemat" placeholder="Masukkan kode matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama matpel</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama matpel">
            </div>
            <div class="mb-3">
                <label class="form-label">jumlah jam</label>
                <input type="number" class="form-control" name="jumlah" placeholder="Masukkan jumlah jam">
            </div>
            <div class="mb-3">
                <label class="form-label">Tingkat</label>
                <input type="text" class="form-control" name="tingkat" placeholder="Masukkan Tingkat">
            </div>
            <div class="mb-3">
                <label class="form-label">kode Kompetensi</label>
                <select class="form-select" name="kdkomp" aria-label="default select example">
                    <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM kompetensi";
                        $result = mysqli_query($connection, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                            echo"<option value='{$row['kd_kompetensi']}'>{$row['nama_kompetensi']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <select class="form-select" name="nip" aria-label="default select example">
                    <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM guru";
                        $result = mysqli_query($connection, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                            echo"<option value='{$row['nip']}'>{$row['nama_guru']}</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="submit" class="btn btn-primary btn-lg" name="submit" value="Kirim">
            </div>
        </form>
    </div>
    <?php
    include "koneksi.php";
    if (isset($_POST['submit'])) {
        $kodemat = $_POST['kodemat'];
        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $tingkat = $_POST['tingkat'];
        $kdkomp = $_POST['kdkomp'];
        $nip = $_POST['nip'];
        $sql = "INSERT INTO matpel
values('$kodemat','$nama','$jumlah','$tingkat','$kdkomp','$nip')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header('location:matpel_view.php');
        } else {
            echo "Gagal tersimpan";
        }
    }
    ?>
</body>

</html>