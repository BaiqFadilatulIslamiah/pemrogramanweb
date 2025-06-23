<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
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