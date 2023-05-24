<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mobil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'koneksi.php'; ?>
    <?php
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $merek = $_POST['merek'];
        $tipe = $_POST['tipe'];
        
        // Periksa apakah gambar baru diunggah
        if ($_FILES['gambar']['name']) {
            $gambar = $_FILES['gambar']['name'];

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
            move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
            
            $query = "UPDATE data_mobile SET merek='$merek', tipe='$tipe', gambar='$target_file' WHERE id=$id";
        } else {
            $query = "UPDATE data_mobile SET merek='$merek', tipe='$tipe' WHERE id=$id";
        }

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: index.php");
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    }

    $id = $_GET['id'];
    $query = "SELECT * FROM data_mobile WHERE id=$id";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
    ?>
    <div class="container">
        <h2>Edit Data Mobil</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label>Merek:</label>
                <input type="text" name="merek" value="<?php echo $data['merek']; ?>" required>
            </div>
            <div class="form-group">
                <label>Tipe:</label>
                <input type="text" name="tipe" value="<?php echo $data['tipe']; ?>" required>
            </div>
            <div class="form-group">
                <label>Gambar:</label>
                <input type="file" name="gambar">
            </div>
            <input type="submit" name="submit" value="Simpan" class="submit-btn">
        </form>
    </div>
</body>
</html>
