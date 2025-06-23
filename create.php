<?php
include'dbkonek.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 8 PHP</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>masukkan nama</td>
                <td>:</td>
                <td> <input type="text" name="nama"> </td>
            </tr>
            <tr>
                <td>unggah gambar</td>
                <td>:</td>
                <td> <input type="file" name="gambar"> </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td> <input type="submit" name="kirim" value="kirim"></td>
                <?php
                if(isset($_POST['kirim'])) {
                    $nama = $_POST['nama'];
                    $nama_file = $_FILES['gambar'] ['name'];
                    $sumber = $_FILES['gambar']['tmp_name'];
                    $folder = './img/';
                    move_uploaded_file($sumber, $folder.$nama_file);

                    $insert = mysqli_query($konek, "INSERT INTO tbf VALUES (NULL, '$nama', '$nama_file')");
                    if($insert){
                    echo"data berhasil disimpan";
                    }else{
                        echo"ada yang salah, cek kodingan";
                    }
                    }
                ?>
            </tr>
        </table>
    </form>
</body>
</html>