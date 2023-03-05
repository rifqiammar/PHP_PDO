<?php 
                                                        // SQL Injection
 require_once __DIR__ . "/GetConnection.php";

 /*
        - SQL injection adalah sebuah teknik yang menyalahgunakan sebuah celah keamanan yang terjadi 
          dalam lapisan basis data sebuah aplikasi.
        - Biasa, SQL Injection dilakukan dengan mengirimkan input dari user dengan perintah yang salah, 
          sehingga menyebabkan hasil SQL yang kita buat menjadi tidak valid
        - SQL Inejction sangat berbahaya, jika sampai kita salah membuat SQL, bisa jadi data kita tidak aman    

 */

 $conn = getConnection();
 
//  Contoh Login
$username = "admiin";
$password = "admin";

// injection | Manipulasi sql oleh hacker
// $username = "admin'; #";
// $password = "pw salah";

$sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$statement = $conn->query($sql);


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

/*
        - Saat membuat aplikasi, kita tidak mungkin akan melakukan hardcode perintah SQL di kode PHP kita
        - Biasanya kita akan menerima input data dari user [form], lalu membuat perintah SQL dari input user, dan
          mengirimnua menggunakan perintah SQL.
*/ 

