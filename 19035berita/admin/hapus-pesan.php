<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "webberita");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah ID tersedia di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus pesan berdasarkan ID
    $sql = "DELETE FROM kontak WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, tampilkan alert dan redirect ke halaman data_kontak.php
        echo "<script>
                alert('Pesan berhasil dihapus');
                window.location.href = 'data_kontak.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>