<?php 
                                                        // SQL Injection
 require_once __DIR__ . "/GetConnection.php";

 

 $conn = getConnection();
 
// User Parameter / input user
$username = "root";
$password = "toor";


// Melakukan Insert dengan Binding Params
$sql = "INSERT INTO admin(username, password) VALUES (?, ?)";

$statement = $conn->prepare($sql);
$statement->execute([$username, $password]);  



$conn = null;

