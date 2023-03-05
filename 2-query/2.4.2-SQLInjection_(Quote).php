<?php 
                                                        // SQL Injection
 require_once __DIR__ . "/GetConnection.php";

 /*
        SOLUSI dari SQL Injection

      - Jangan membuat query SQL ssecara manual dengan menggabuangkan String secara bulat-bulat

      - Function query() dan  execute() tidak bisa menangani celah SQL Injection, jadi kita harus
        menanganinya secara manual

      - Direkomendasikan menggunakan function query() dan execute() jika memang kita tidak butuh parameter
        dari input user ketika membuat perintah SQL. 

      - Jika membutuhkan paramater dari input user, kita wajib menggunakan function prepare(sql)

      - atau bisa juga dengan menggunakan function quote()

 */

 $conn = getConnection();
 
// Menggunakan Quote
$username = $conn->quote("admin'; #");
$password = $conn->quote("admin");

$sql = "SELECT * FROM admin WHERE username = $username AND password = $password";  //| Jika menggunakan Quote tidak perlu pakai ''



$success = false; // nilai awal
$find_user = null; // nilai awal
foreach($statement as $row){ // jika di temukan username dan pw maka masuk kedalam iterasi foreach
        // sukses
        $success = true;
        $find_user = $row["username"];
}

// Jika Sukses login
if($success){
        echo "Sukses login : " . $find_user . PHP_EOL;
}else {
        echo "Gagal login" . PHP_EOL;
}


// Menutup Koneksi
$conn = null;

