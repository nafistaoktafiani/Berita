<?php
include 'koneksi.php'; // Pastikan file koneksi Anda terhubung dengan benar

if (isset($_POST['simpan'])) {
    // Mengambil data dari form
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = isset($_POST['deskripsi']) && !empty($_POST['deskripsi']) 
        ? mysqli_real_escape_string($conn, $_POST['deskripsi']) 
        : null; // Menghindari deskripsi kosong
    $tanggal_upload = date("Y-m-d H:i:s");

    // Lokasi folder penyimpanan gambar
    $folder = "../images/fashion/";
    $foto = $_FILES['foto']['name'];
    $target_file = $folder . $foto;
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi tipe file
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($file_type, $allowed_types)) {
        echo "<script>alert('Format file tidak didukung. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.');</script>";
        exit;
    }

    // Memastikan folder ada
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true); // Membuat folder jika belum ada
    }

    // Validasi deskripsi tidak boleh kosong
    if (is_null($deskripsi)) {
        echo "<script>alert('Deskripsi tidak boleh kosong!');</script>";
        exit;
    }

    // Memindahkan file yang diunggah ke folder
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        // Menyimpan data ke database
        $query = "INSERT INTO fashion (judul, deskripsi, foto) VALUES ('$judul', '$deskripsi', '$foto')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo "<script>alert('Data fashion berhasil disimpan');</script>";
            echo "<script>window.location='fashion.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error saat memindahkan file. Detail: ";
        print_r(error_get_last());
    }
} else {
    echo "<script>alert('Akses tidak sah');</script>";
    echo "<script>window.location='fashion.php';</script>";
}
?>
