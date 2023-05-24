<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mobil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'koneksi.php'; ?>
    <?php
    if (isset($_POST['submit'])) {
        $merek = $_POST['merek'];
        $tipe = $_POST['tipe'];
        $gambar = $_FILES['gambar']['name'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

        $query = "INSERT INTO data_mobile (merek, tipe, gambar) VALUES ('$merek', '$tipe', '$target_file')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: index.php");
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }
    ?>
    <div class="container">
        <h2>Tambah Data Mobil</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Merek:</label>
                <input type="text" name="merek" required>
            </div>
            <div class="form-group">
                <label>Tipe:</label>
                <input type="text" name="tipe" required>
            </div>
            <div class="form-group">
                <label>Gambar:</label>
                <input type="file" name="gambar" required>
            </div>
            <input type="submit" name="submit" value="Simpan" class="submit-btn">
        </form>
    </div>
</body>
</html>
