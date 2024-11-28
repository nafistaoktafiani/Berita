<?php include 'header.php'; ?>
<?php include 'koneksi.php'; ?>

<?php
// Mendapatkan ID dari URL
$id = $_GET['id'];
$query = "SELECT * FROM olahraga WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
?>

<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    EDIT PROFIL
                </div>
                <div class="card-body">
                    <form action="update-olahraga.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">

                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" name="judul" class="form-control" value="<?= $data['judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea name="deskripsi" class="form-control" rows="3" required><?= $data['deskripsi']; ?></textarea>
                        </div>

                       <!-- Menampilkan foto sebelum diedit -->
                       <div class="form-group">
                            <label>Foto Saat Ini:</label><br>
                            <img src="../images/olahraga/<?= $data['foto']; ?>" alt="Foto profil" class="img-thumbnail" style="width: 200px; height: auto;">
                        </div>


                        <div class="form-group">
                            <label for="foto">Ganti Foto (opsional):</label>
                            <input type="file" name="foto" class="form-control" accept="images/olahraga/*">
                        </div>
                        <br>
                        <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                        <a href="olahraga.php" class="btn btn-danger float-end">KEMBALI</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


