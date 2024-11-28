<?php include 'header.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Admin Teknologi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    Yang bisa membuat, menampilkan, mengupdate, menghapus, dan mengedit data hanya admin.
                    <a target="_blank" href="https://datatables.net/">Hubungi kami jika ada masalah</a>.
                </div>
            </div>

            <a href="tambah-olahraga.php" class="btn btn-primary">Tambah berita teknologi</a><br /><br />
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Home
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Gambar</th>
                                <th>Tanggal Upload</th>
                                <th>EDIT</th>
                                <th>HAPUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'koneksi.php'; // Menghubungkan dengan file koneksi

                            $query = "SELECT * FROM teknologi ORDER BY id DESC"; 
                            $query_run = mysqli_query($conn, $query);

                            if ($query_run) {
                                if (mysqli_num_rows($query_run) > 0) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                                            <td><?php echo htmlspecialchars($row['judul']); ?></td>
                                            <td><?php echo htmlspecialchars($row['deskripsi']); ?></td>
                                            <td>
                                                <img src="../images/teknologi/<?php echo htmlspecialchars($row['foto']); ?>" width="100" height="100" alt="Gambar">
                                            </td>
                                            <td>
    <?php
    echo isset($row['tanggal_upload']) && $row['tanggal_upload'] !== null
        ? htmlspecialchars($row['tanggal_upload'])
        : 'Tanggal tidak tersedia';
    ?>
</td>

                                            <td>
                                                <a href="edit-teknologi.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">EDIT</a>
                                            </td>
                                            <td>
                                                <a href="hapus-teknologi.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');">HAPUS</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>Tidak ada data ditemukan.</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>Error: " . mysqli_error($conn) . "</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- CSS Langsung -->
<style>
    /* Styling untuk tabel */
    #datatablesSimple {
        border-collapse: collapse; /* Menggabungkan garis tabel */
        width: 100%; /* Lebar tabel penuh */
        font-size: 14px; /* Ukuran font */
    }

    #datatablesSimple th, #datatablesSimple td {
        border: 1px solid #ddd; /* Garis antar sel */
        padding: 8px; /* Jarak text dengan border */
        text-align: left; /* Text rata kiri */
    }

    #datatablesSimple tr:nth-child(even) {
        background-color: #f9f9f9; /* Warna baris genap */
    }

    #datatablesSimple tr:hover {
        background-color: #f1f1f1; /* Warna saat di-hover */
    }

    #datatablesSimple th {
        background-color: #4CAF50; /* Warna header */
        color: white; /* Warna teks header */
        text-align: center; /* Text rata tengah */
    }

    /* Styling tombol */
    .btn {
        padding: 5px 10px;
        text-decoration: none;
        border: none;
        border-radius: 4px;
        color: #fff;
    }

    .btn-warning {
        background-color: #ffcc00; /* Warna kuning */
        color: black; /* Warna teks */
    }

    .btn-warning:hover {
        background-color: #e6b800; /* Warna hover kuning */
    }

    .btn-danger {
        background-color: #e60000; /* Warna merah */
    }

    .btn-danger:hover {
        background-color: #cc0000; /* Warna hover merah */
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
</body>
</html>
