<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php 
    // Pesan error jika login gagal
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Username dan Password tidak sesuai!</div>";
        } elseif ($_GET['pesan'] == "logout") {
            echo "<div class='alert'>Anda telah berhasil logout.</div>";
        } elseif ($_GET['pesan'] == "belum_login") {
            echo "<div class='alert'>Anda harus login untuk mengakses halaman admin!</div>";
        }
    }
    ?>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan Login</p>
        <form action="cek-login.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Masukkan username" required>

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Masukkan password" required>

            <input type="submit" class="tombol_login" value="LOGIN">

            <br><br>
            <center>
                <a class="link" href="../user/index.php">Kembali ke halaman user</a>
            </center>
        </form>
    </div>

    <style>
        /* CSS untuk tampilan */
        body {
            font-family: Arial, sans-serif;
            background: #ebf9fb;
            margin: 0;
            padding: 0;
        }

        .kotak_login {
            width: 350px;
            background: white;
            margin: 100px auto;
            padding: 30px 20px;
            box-shadow: 0px 0px 10px 0px #d6d6d6;
        }

        .tulisan_login {
            text-align: center;
            font-size: 20px;
            text-transform: uppercase;
        }

        label {
            font-size: 14px;
            font-weight: bold;
        }

        .form_login {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }

        .tombol_login {
            width: 100%;
            padding: 10px;
            border: none;
            background: #2aa7e2;
            color: white;
            font-size: 14px;
            border-radius: 3px;
            cursor: pointer;
        }

        .tombol_login:hover {
            background: #1d8acb;
        }

        .alert {
            background: #e44e4e;
            color: white;
            text-align: center;
            padding: 10px;
            border: 1px solid #b32929;
            margin-bottom: 15px;
        }

        .link {
            text-decoration: none;
            font-size: 12px;
            color: #2aa7e2;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</body>
</html>
