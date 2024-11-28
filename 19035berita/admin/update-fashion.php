<?php
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    // Memeriksa apakah ada file baru yang diunggah
    if (!empty($_FILES['foto']['name'])) {
        $folder = "../images/fashion/";
        $foto = $_FILES['foto']['name'];
        $target_file = $folder . basename($foto);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Memeriksa tipe file
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Format file tidak didukung. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.');</script>";
            exit;
        }

        // Memindahkan file yang diunggah
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            // Update dengan foto baru
            $query = "UPDATE fashion SET judul='$judul', deskripsi='$deskripsi', foto='$foto' WHERE id='$id'";
        }
    } else {
        // Update tanpa mengubah foto
        $query = "UPDATE fashion SET judul='$judul', deskripsi='$deskripsi' WHERE id='$id'";
    }

    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo "<script>alert('Data fashion berhasil diperbarui');</script>";
        echo "<script>window.location='fashion.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Akses tidak sah');</script>";
    echo "<script>window.location='fashion.php';</script>";
}
?>
