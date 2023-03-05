<?php 
 
 require_once __DIR__ . "/GetConnection.php";

 $conn = getConnection();
 
 $sql = "SELECT * FROM kopi";

// query
$result = $conn->query($sql); // return Valuenya adalah sebuah PDO Statement | result = PDO Statement


foreach($result as $row){
        echo $row["nama"] . PHP_EOL;
        echo '<br>';
        echo '<br>';

}



// Menutup Koneksi
$conn = null;

/*
 - PDO memiliki function bernama query(sql) adalah sebuah object dari PDOStatement
 - Return vallue dari function query(sql) adalah sebuah object dari PDOStatement
*/ 

/*    PDOStatement
     - PDOStatement adalah sebuah class turunan dari IteratorAggregate
     - Itterator Agregat secara otomatis bisa menggunakan Perulangan Foreach   
*/  