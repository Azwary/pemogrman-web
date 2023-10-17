<?php
include "../config/koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    switch($_GET['act']){
        default:
    ?>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
            <a href="?act=add&id=<?php echo $row['kodebuku'];?>"><i title="Hapus" class="fa fa-add">ADD</i></a> 
            </tr>
            <tr align="center">
                <th>No.</th>
                <th>Kode buku</th>
                <th>Nama buku </th>
                <th>penerbit</th>
                <th>tahun terbit </th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                $no=1;
                $res=mysqli_query($conn,"SELECT * FROM buku ORDER BY
                kodebuku ASC") or die(mysql_error());
                while($row=mysqli_fetch_array($res)){
            ?>
            <tr class="odd gradeX">
                
                <td align="center"><?php echo $no;?></td>
                    <td align="center"><?php echo $row['kodebuku'];?></td>
                    <td align="center"><?php echo $row['namabuku'];?></td>
                    <td align="center"><?php echo $row['penerbit'];?></td>
                    <td align="center"><?php echo $row['tahunterbit'];?></td>
                    <td align="center"><a href="?act=edit&id=<?php echo $row['kodebuku'];?>"> 
                        <i title="Rubah" class="fa fa-edit">EDIT</i></a>  | |
                    <td align="center"><a href="?act=Delete&id=<?php echo $row['kodebuku'];?>"> 
                        <i title="Hapus" class="fa fa-Delete">HAPUS</i></a>
                   
            </tr>
            
                <?php $no++; } ?> <!-- Akhir While-->
        </tbody>
            <?php ?> <!-- Akhir ELSE IF-->
    </table>
    <?php
    break;
        case "add":
    ?>
        <!-- FORM TAMBAH DATA BARU -->
        <form name="form1" method="post" action="simpan.php">
        <p><h1>Form Data Buku</h1></p>
        <p> Kode Buku:
            <input type="text" name="kodebuku" id="textfield">
        </p>
        <p> Nama Buku:
            <input type="text" name="namabuku" id="textfield">
        </p>
        <p> Penerbit:
            <input type="text" name="penerbit" id="textfield">
        </p>
        <p>Tahun Terbit:
            <input type="text" name="tahunterbit" id="textfield">
        </p>
        <p>
            <input type="submit" name="btnsimpan" id="submit" value="SIMPAN">
        </p>
        </form>
    <?php
        break;
        case "edit":
            $id=$_GET['id'];
            $q=mysqli_query($conn,"SELECT * FROM buku where kodebuku='$id'")
            or die(mysql_error($conn));
            $r=mysqli_fetch_array($q);
    ?>
    <form name="form1" method="post" action="ubah.php">
        <p><h1>Form Update Data Buku</h1></p>
        <p> Kode Buku:
            <input type="text" name="kodebuku" id="textfield" disable value="<?php echo $r['kodebuku']?>">
            <input type="hidden"name="kodebuku" value="<?php echo $r['kodebuku']?>">
        </p>
        <p> Nama Buku:
            <input type="text" name="namabuku" id="textfield" value="<?php echo $r['namabuku']?>">
        </p>
        <p> Penerbit:
            <input type="text" name="penerbit" id="textfield" value="<?php echo $r['penerbit']?>">
        </p>
        <p>Tahun Terbit: 
            <input type="text" name="tahunterbit" id="textfield" value="<?php echo $r['tahunterbit']?>">
        </p>
        <p>
            <input type="submit" name="btnsimpan" id="submit" value="SIMPAN">
        </p>
        </form>
    <?php
        break;
        case "Delete":
            $id=$_GET['id'];
            $q=mysqli_query($conn,"SELECT * FROM buku where kodebuku='$id'")
            or die(mysql_error($conn));
            $r=mysqli_fetch_array($q);
    ?>
    <form name="form1" method="post" action="hapus.php">
        <p><h1>Form Hapus Data Buku</h1></p>
        <p> Kode Buku:
            <input type="text" name="kodespesialis" id="textfield" disable value="<?php echo $r['kodebuku']?>">
            <input type="hidden"name="kodespesialis" value="<?php echo $r['kodebuku']?>">
        </p>
        <p>
            <input type="submit" name="btnsimpan" id="submit" value="Hapus">
        </p>
        </form>
    <?php
        break;
        
    }
    ?>


</body>
</html>