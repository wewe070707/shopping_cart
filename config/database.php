<?php
class MySQL {
  const ADDRESS = "localhost";
  const USERNAME = "root";
  const PASSWORD = "";
  const DATABASE = "shopping_cart";
}


// // used to get mysql database connection
// class MySQL{
//
//     // specify your own database credentials
//     private $host = "localhost";
//     private $db_name = "shopping_cart";
//     private $username = "root";
//     private $password = "";
//     public $conn;
//
//     // get the database connection
//     public function getConnection(){
//
//         $this->conn = null;
//
//         try{
//             $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
//         }catch(PDOException $exception){
//             echo "Connection error: " . $exception->getMessage();
//         }
//
//         return $this->conn;
//     }
//
// }
?>
