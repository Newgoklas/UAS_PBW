<?php

$host = "localhost"; //host server
$user = "root"; // user server
$pass = ""; // isikan password jika user anda memiliki password
$dbname = "akademik"; // nama database yang ingin anda koneksikan

    try{
        $koneksi = new PDO ("mysql:host=$host; dbname=$dbname", $user, $pass);
    }
    catch(PDOException $e){
        echo"Koneksi gagal ", $e->getMessage();
    }