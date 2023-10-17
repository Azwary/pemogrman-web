<?php
error_reporting(E_ALL);
    include "../config/koneksi.php";

    $kd=$_POST['kodebuku'];
    $nmbuku=$_POST['namabuku'];
    $penerbit=$_POST['penerbit'];
    $tahunterbit=$_POST['tahunterbit'];

    $b=mysqli_query($conn,"UPDATE buku SET namabuku='$nmbuku',penerbit='$penerbit',tahunterbit='$tahunterbit'  WHERE kodebuku='$kd'")
    or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Berhasil diedit..!!')</script>";
        echo "<script>window.location.href='buku.php';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data speisalis";
        
    }

?>