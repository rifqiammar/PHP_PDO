<?php  

$host = "localhost";
$port = 3306;
$database = "getCangkir";
$username = "root";
$password = "";

// try and catch untuk trhow exceptoion
try{
// Koneksi Ke Database dengan PDO
$connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
echo "Koneksi ke database sukses!" . PHP_EOL;

// Menutup Koneksi
$connection = null;

} catch (PDOException $exception) {
    echo "Koneksi ke database Error : " . $exception->getMessage() . PHP_EOL;
}