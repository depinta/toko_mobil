<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM data_mobile WHERE id=$id";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: index.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
