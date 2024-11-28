<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Mengambil nama file foto dari database untuk dihapus dari folder
    $query = "SELECT foto FROM teknologi WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $foto = $data['foto'];

    // Menghapus foto dari folder
    if (file_exists("../images/teknologi/" . $foto)) {
        unlink("../images/teknologi/" . $foto);
    }

    // Menghapus data dari database
    $query = "DELETE FROM teknologi WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('Data teknologi berhasil dihapus');</script>";
        echo "<script>window.location='teknologi.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Akses tidak sah');</script>";
    echo "<script>window.location='teknologi.php';</script>";
}
?>
