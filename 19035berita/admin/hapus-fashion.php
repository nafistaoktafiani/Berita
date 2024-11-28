<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Mengambil nama file foto dari database untuk dihapus dari folder
    $query = "SELECT foto FROM fashion WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $foto = $data['foto'];

    // Menghapus foto dari folder
    if (file_exists("../images/fashion/" . $foto)) {
        unlink("../images/fashion/" . $foto);
    }

    // Menghapus data dari database
    $query = "DELETE FROM fashion WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "<script>alert('Data fashifashion.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Akses tidak sah');</script>";
    echo "<script>window.location='fashion.php';</script>";
}
?>
