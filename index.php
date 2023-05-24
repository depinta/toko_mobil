<!DOCTYPE html>
<html>
<head>
    <title>CRUD Website</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'koneksi.php'; ?>
    <div class="container">
        <h2>Data Mobil</h2>
        <a href="tambah.php" class="add-btn">Tambah Data</a>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
            <?php
            $query = "SELECT * FROM data_mobile";
            $result = mysqli_query($koneksi, $query);
            
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['merek']; ?></td>
                    <td><?php echo $row['tipe']; ?></td>
                    <td><img src="<?php echo $row['gambar']; ?>" class="gambar"></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit-btn">Edit</a>
                        <a href="hapus.php?id=<?php echo $row['id']; ?>" class="delete-btn">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
