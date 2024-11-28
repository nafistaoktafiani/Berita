<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "webberita");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pesan dari database
$sql = "SELECT * FROM kontak ORDER BY id DESC";
$result = $conn->query($sql);
?>

<?php include 'header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pesan Pengguna</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Pesan Pengguna</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Halaman ini berisi pesan dari pengguna yang dapat dikelola oleh admin.
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Daftar Pesan Pengguna
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Pesan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['first_name']} {$row['last_name']}</td>
                                        <td>{$row['email']}</td>
                                        <td>{$row['phone']}</td>
                                        <td>{$row['message']}</td>
                                        <td>{$row['created_at']}</td>
                                        <td>
                                            <a href='hapus-pesan.php?id={$row['id']}' class='btn btn-danger' onclick='return confirm(\"Yakin ingin menghapus pesan ini?\");'>Hapus</a>
                                        </td>
                                    </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>Tidak ada pesan yang tersedia.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Include Script JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>

<?php
$conn->close();
?>