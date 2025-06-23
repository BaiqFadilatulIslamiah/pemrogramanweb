<?php 
include'dbkonek.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $hapus = mysqli_query($konek, "DELETE FROM tbf WHERE id_f = '$id' ");
    if($hapus){
        header('location:data.php');
    }else{
        echo"ada yg salah, cek code";
    }
    
}
?>
