<?php
class Database
{
    private $host;
    private $port;
    private $dbname;
    private $user;
    private $password;

    public function __construct(){
        $this->host = constant('HOST');
        $this->port = constant('PORT');
        $this->dbname = constant('DBNAME');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
    } 
    
    function connect(){
        try {
            $connection = "pgsql:host=$this->host;port=$this->port;dbname=$this->dbname";
            $pdo = new PDO($connection, $this->user, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }
}

?>