<?php 
                                                        // SQL Injection
 require_once __DIR__ . "/GetConnection.php";

 /*
       
        Prepare Statement

        - Cara yang lebih aman untuk membuat SQL dengan input parameter dari user sebenarnya
          menggunakan function prepare()
        - Function prepare() akan menghasilkan object PDOStatement, dimana kita bisa melakukan binding
          parameter ke perintah SQL yang kita buat
        - Ini lebih aman dibandingkan menggunakan function quote() secara manual,    
        - menggunakan function prepare(), kita harus menggunakan :namaparameter

 */

 $conn = getConnection();
 
// User Parameter / input user
$username = "admin";
$password = "admin";

// Melakukan Insert dengan Binding Params
// $sql = "INSERT INTO admin(username, password) VALUES (:username, :password)";

// Cara singkat Binding Param
$sql = "SELECT * FROM admin WHERE username = ? AND password = ?"; 
$statement = $conn->prepare($sql);
$statement->execute([$username, $password]);  

// $sql = "SELECT * FROM admin WHERE username = :username1 AND password = :password1"; 
// $statement = $conn->prepare($sql);
// $statement->bindParam("username1", $username); // Binding Param
// $statement->bindParam("password1", $password);  // bindParam(parameter(sql), value(parameter))
// $statement->execute();

// Bisa menggunakan angka | Binding Parameter dengan Index ( Jika banyak parameternya )
// $sql = "SELECT * FROM admin WHERE username = ? AND password = ?"; 
// $statement = $conn->prepare($sql);
// $statement->bindParam(1, $username);  // index di mulai dari 1
// $statement->bindParam(2, $password); 
// $statement->execute();

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

