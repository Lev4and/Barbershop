<?php
class QueryExecutor
{
    protected static $instance;

    private $contextDb;

    private function __construct(){
        $this->contextDb = new PDO("mysql:dbname=barbershop;host=localhost", "root", "root");
    }

    public static function getInstance(){
        if(!isset(self::$instance)){
            self::$instance = new QueryExecutor();
        }

        return self::$instance;
    }

    public function authorization($login, $password){
        return !is_null($this->executeQuery("SELECT * FROM user WHERE login='$login' AND password='$password' LIMIT 1")[0]);
    }

    public function getUser($login){
        return $this->executeQuery("SELECT * FROM v_user WHERE login='$login' LIMIT 1")[0];
    }

    public function containsUser($login){
        return !is_null($this->executeQuery("SELECT * FROM user WHERE login='$login' LIMIT 1")[0]);
    }

    public function registration($roleId, $login, $password){
        $this->executeQuery("INSERT INTO user (role_id, login, password) VALUES($roleId, '$login', '$password')");
    }

    public function getRoles(){
        return $this->executeQuery("SELECT * FROM role");
    }

    private function executeQuery($query){
        try{
            return ($this->contextDb->query($query))->FETCHALL(PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){
            die($e->getMessage());
        }
    }
}
?>