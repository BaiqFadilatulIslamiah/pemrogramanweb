landing:
<?php
ob_start();
include 'dbkonek.php';
session_start();
if (!isset($_SESSION['nama'])) {
    header('location:login.php');
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <a href="logout.php"> sugul </a>
        <h1> selamat dtg brosis <?php echo $_SESSION['nama'] ?> di web kami</h1>
        

    </body>

    </html>

<?php
}
?>