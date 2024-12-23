<?php
session_start();
if($_SESSION["loggedIn"] != true){
    echo 'not logged in';
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Nama = trim($_POST['Nama']);
    $NIS = trim($_POST['NIS']);
    $TTL = trim($_POST['TTL']);
    $Kelas = (int)($_POST['Kelas']);

    $db_servername = "localhost";
    $db_username = "root";
    $db_password = "root";

    $db_name = "datasiswa";
    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO siswa (Nama, NIS, TTL, Kelas)
    VALUES (?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $Nama, $NIS, $TTL, $Kelas);
    $stmt->execute();
    header("Location: rekapdatasiswa.php");
}