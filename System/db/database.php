
<?php
class database extends dbconfig
{
     protected $query;
    protected $pdo;
    protected $statement;
    public function __construct()
    {
        try
        {
            $opt=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
           $this->pdo = new PDO('mysql:host='.$this->HOST.';dbname='.$this->DBNAME,$this->USERNAME, $this->PASSWORD,$opt);
           $this->pdo->query('set names utf8');
        } catch (PDOException $e) {
            exit('Server error'.$e->getMessage());
        }
    }
    function setQuery($queries)
    {
        $this->query=$queries;
    }
    function loadRow($param=array())// tùy biến $type = PDO::FETCH_OBJ;
    {
        try {
            $this->statement= $this->pdo->prepare($this->query);
        $this->statement->execute($param);
        $obj = $this->statement->fetch(PDO::FETCH_OBJ);
        return $obj;
        } catch (PDOException $ex) {
            exit('server error'.$ex->getMessage());
        }
        
    }
    function loadRowAll($param=array())
    {
        try {
            $this->statement= $this->pdo->prepare($this->query);
        $this->statement->execute($param);
        $obj = $this->statement->fetchAll(PDO::FETCH_OBJ);
        return $obj;
        } catch (PDOException $ex) {
            exit('server error'.$ex->getMessage());
        }
        
    }
    function loadRowAllArray($param=array())
    {
        try {
            $this->statement= $this->pdo->prepare($this->query);
        $this->statement->execute($param);
        $obj = $this->statement->fetchAll(PDO::FETCH_ASSOC);
        return $obj;
        } catch (PDOException $ex) {
            exit('server error'.$ex->getMessage());
        }
    }
            function disconnect()
    {
        $this->pdo = null;
        $this->statement = null;
    }
    function exec1($param=array())
    {
       try
       {
        $this->statement= $this->pdo->prepare($this->query);
        $this->statement->execute($param);
        return $this->statement->rowCount();
       }
        catch (PDOException $e)
        {
     exit('server error'.$e->getMessage());
        }
    } 
    function getLastInsertId($param=array())
    {
        try{
            return $this->pdo->lastInsertId();
        } catch (Exception $ex) {
            return false;
        }
        
    }
    
}
?>