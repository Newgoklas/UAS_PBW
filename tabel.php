<?php
    session_start();
    if (!$_SESSION['isLoggedIn']) 
    {
        header("location: login.php");
    }
    include "connection.php";
?>

 <br>

<?php
    $dbh = $koneksi->query("SELECT * FROM buku WHERE isdel = 0");
    $bukus = $dbh->fetch(PDO::FETCH_ASSOC);
?>

<br>

<table border="1">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
        <th>Aksi</th>
    </tr>
    <?php
        $no = 1;
        while($bukus = $dbh->fetch(PDO::FETCH_ASSOC))
        {
    ?>
        <tr>
            <td><?php echo $no ?> </td>
            <td><?php echo $bukus['judul'] ?></td>
            <td><?php echo $bukus['penulis'] ?></td>
            <td><?php echo $bukus['tahun'] ?></td>
            <td><a href="edit.php?id=1">Edit</a> | <a 
            href="delete.php?id=<?php echo $bukus['id']?>">Hapus</a></td>
        </tr>
    <?php
        $no++;
        }
    ?>

</table>

<br>

<div class="text-center mt-3">
    <a href="home.php" class="btn btn-danger">Kembali ke Home</a>
</div>