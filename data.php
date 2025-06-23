<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>NO</td>
            <td>NAMA</td>
            <td>GAMBAR</td>
            <td>AKSI</td>
        </tr>
        <?php
             include'dbkonek.php';
             $query = mysqli_query($konek, "SELECT * FROM tbf");
             while ($baris = mysqli_fetch_array($query)) {  
        ?>
        <tr>
            <td> <?php echo $baris ['id_f'] ?></td>
            <td> <?php echo $baris ['nama'] ?></td>
            <td> <img src="img/<?php echo $baris['gambar']?>" height="100" width="100"></td>
            <td> <a href="sunting.php?id=<?php echo $baris['id_f']?>"> ubah</a><br>
                 <a href="hapus.php?id=<?php echo $baris['id_f']?>" onclick="return confirm('yakin?')" > hapus</a><br>
            </td>
        </tr>
        <?php
             }

        ?>
    </table>
</body>
</html>