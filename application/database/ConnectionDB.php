<?php
declare(strict_types=1);
  
namespace mvc\app\database; 
  
class ConnectionDB
{
   private string $server;
   private string $user;
   private string $pass;
   private string $dbname;
   private \PDO $pdo;


   function __construct($config = [])
   {
     $this->server = $config['dsn'];
     $this->user = $config['user'];
     $this->pass = $config['pass'];
     $this->dbname = $config['dbname'];
   }

   public function conn()
   {
      $dsn = $this->server.$this->dbname; 
      return $this->pdo = new \PDO($dsn, $this->user, $this->pass);   
   }

   public function findAll($sql)
   {
     return $sql;  
   }

   

   // public function createTable($table)
   // {
   //   $sql = "CREATE TABLE $table (
   //          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   //          firstname VARCHAR(30) NOT NULL,
   //          lastname VARCHAR(30) NOT NULL,
   //          email VARCHAR(50),
   //          reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   //          ) ";

   //    $this->conn()->exec($sql);      
   // }

}
 ?>