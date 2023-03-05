<?php  
require_once __DIR__ . "/GetConnection.php";
//                      ====  Fecth Data ========
/*
        - PDOStatement memiliki sebuah function bernama fetch(), fetch() digunakan untuk menarik satu data dari hasil query,
          ketika kita memanggil function fetch() lagi, maka otomatis akan menarik data selanjutnya dan seterusnya
        - Jika function fetch mengembalikan nilai false, artinya  sudah tidak ada data lagi yang bisa di ambil
          dari hasil query
        - Jika kita ingin mengambil seluruh data sekaligus, kita bisa menggunakan fetchAll()    

        - fetch() = menarik singgle data;
        - fetchAll() = seluruh data;
*/ 

$conn = getConnection();

$username = "admin";
$password = "admin";

$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$result = $conn->prepare($sql);
$result->execute([$username, $password]);

// var_dump($result->rowCount());

if($row = $result->fetch()){
  echo "SUKSES LOGIN : " . $row["username"] . PHP_EOL;
}else{
  echo "GAGAL LOGIN" . PHP_EOL;
};

// var_dump($result->fetch()) hasilnya akan false karena data sudah di ambil sebelumnya

// ====================================================================== FECTH ALL
$sql = "SELECT * FROM kopi";
$result = $conn->query($sql);
$kopi = $result->fetchAll();

var_dump($kopi);







$conn = null;