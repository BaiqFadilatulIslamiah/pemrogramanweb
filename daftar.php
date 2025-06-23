<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Syarat Daftar</h1>
    <ul>
        <li>Minimal 8 karakter</li>
        <li>ada 1 angka</li>
        <li>ada 1 huruf KAPITAL</li>
    </ul>

    <form action= "" method="POST">
        <input type="text" name="nama" placeholder="masukkan nama" required>
        <input type="text" name="email" placeholder="masukkan email" required>
        <input type="password" name="password" placeholder="masukkan password" required>
        <input type="password" name="konfirmasi" placeholder="konfirmasi password" required>
        <input type="submit" name="daftar" value="daftar sekarang" required>

        <?php
        if (isset($_POST['daftar'])) {
            $nama = trim($_POST['nama']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $konfirmasi = trim($_POST['konfirmasi']);

            $errors = array();

            if (empty($nama)||empty($email)||empty($password)||empty($konfirmasi)) {
                $errors[] = "harus diisi";
            }

            if ($password !== $konfirmasi) {
                $errors[] = "password beda please samakan dulu";
            }

            if (strlen($password)<8) {
                $errors[] = "passwordnya kurang bro, min 8";
            }

            if (!preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
                $errors[] = "lihat syarat daftar";
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "format email salah, cek lagi";
            }

            if (empty($errors)) {
                $cekemail = mysqli_query($konek,
                "SELECT email FROM tb_sesi WHERE email = '$email'");
                if (mysqli_num_rows($cekemail)) {
                    $errors[] = "email sudah terdaftar";
                }
            }

            if (empty($errors)) {
                $masukkan = mysqli_query($konek, "INSERT INTO tb_sesi
                (nama, email, password) VALUES ('$nama', '$email', $password)");

                if ($masukkan) {
                    echo "berhasil mendaftar😁, silahkan kehalaman login";
                } else {
                    echo "gagal daftar, cek kode eror";
                }
            }
        }
        ?>
    </form>
</body>
</html>