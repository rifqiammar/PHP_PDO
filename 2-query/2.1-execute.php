<?php 
 
 require_once __DIR__ . "/GetConnection.php";

 $conn = getConnection();
 
 $sql = "INSERT INTO kopi(nama, jenis, roasting, proses)
         VALUES ('Guatemala Strawb', 'Arabica', 'Medium', 'Natural' )";

// Mengexecute SQL
$conn->exec($sql); // method exec tidak mengembalikan result data. seperti afect rows di mysqli

// Menutup Koneksi
$conn = null; 


/*
    method exec() bisa di gunakan untuk query apapun
    tapi lebih di anjurkan hanya untuk insert data saja
*/ 