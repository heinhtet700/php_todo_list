<?php
// define('MYSQL_USER', 'root');
// define('MYSQL_PASSWORD', 'pass1234');
// define('MYSQL_HOST', 'localhost');
// define('MYSQL_DATABASE', 'todo');
$servername = "localhost";
$username = "root";
$password = "pass1234";
$dbname = "todo";
try {
    //code...
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e;
    //throw $th;
}

?>