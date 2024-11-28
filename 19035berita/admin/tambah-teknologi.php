<?php include 'header.php'?>



  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
        
              TAMBAH foto
            </div>
            <div class="card-body">
              <form action="simpan-teknologi.php" method="POST" enctype = "multipart/form-data">
                
                <!-- Form Upload Galeri (misalnya di admin/galeri.php) -->

    <div class="form-group">
        <label for="judul">Judul:</label>
        <input type="text" name="judul" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label for="foto">Pilih Foto:</label>
        <input type="file" name="foto" class="form-control" accept="../images/teknologi/*" required>
    </div></br>
    



                
                <button type="submit" name="simpan" class="btn btn-success">SIMPAN</button>
                <button type="reset" class="btn btn-warning">RESET</button>
                <button type="back" href="teknologi.php" class="btn btn-danger float-end" class="btn btn-warning">KEMBALI</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>





