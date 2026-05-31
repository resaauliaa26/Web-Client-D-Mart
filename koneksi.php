<?php
$host = "localhost";
$user = "root";
$pass = ""; // Default Laragon biasanya kosong
$db   = "db_rona_nuswa";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Memulai fungsi session untuk melacak user yang login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>