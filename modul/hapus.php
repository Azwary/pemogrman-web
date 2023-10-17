<?php
error_reporting(E_ALL);
    include "../config/koneksi.php";

    $kd=$_POST['kodebuku'];

    $b=mysqli_query($conn,"DELETE from buku WHERE kodebuku='$kd'")
    or die(mysqli_error($conn));

    if($b)
    {
        echo "<script>alert('Data Berhasil dihapus..!!')</script>";
        echo "<script>window.location.href='buku.php';</script>";
      
    }
    else
    {
        echo "Gagal Menyimpan Data speisalis";
        
    }

?>