<?php  

function getConnection()
{
    $host = "localhost";
    $port = 3306;
    $database = "getCangkir";
    $username = "root";
    $password = "";
    
    // try and catch untuk trhow exceptoion
    try{
    // Koneksi Ke Database dengan PDO
   return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
   
    } catch (PDOException $exception) {
        echo "Koneksi ke database Error : " . $exception->getMessage() . PHP_EOL;
    }

}