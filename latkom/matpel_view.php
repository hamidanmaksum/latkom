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
    <h2>Mata Pelajaran</h2>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Kode Matpel</th>
                <th scope="col">Nama Matpel</th>
                <th scope="col">Jumlah Jam</th>
                <th scope="col">Tingkat</th>
                <th scope="col">Kode Kompetensi</th>
                <th scope="col">Nip</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $sql = "Select * From matpel";
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo 
                "<tr>
                <td>$row[kd_matpel]</td>
                <td>$row[nama_matpel]</td>
                <td>$row[jumlah_jam]</td>
                <td>$row[tingkat]</td>
                <td>$row[kd_kompetensi]</td>
                <td>$row[nip]</td>
                <td><a href='matpel_edit.php?kd_matpel=$row[kd_matpel]'>EDIT</a> | <a
                href='matpel_delete.php?kd_matpel=$row[kd_matpel]'>DELETE</a></td>
                </tr>";
            }
            ?>

        </tbody>
    </table>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-primary" href="matpel_add.php" role="button">Tambah Data</a>
    </div>
</body>

</html>