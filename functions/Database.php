<?php 

class Database {
    private $dbname = "crud";
    private $username = "root";
    private $host = "127.0.0.1";
    private $con;
    private $name;
    public $ErrorMessages;

    public $successMessages;

    public function connect() {
        if($this->con === null){
            try {
            return $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';', $this->username, '');
            }catch(Exception $e) {
                echo $e->getMessage();
            }
        }
        return $this->con;
    }

    public function checkInput () {
     
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $this->name = $_POST['name'];
        }else {
            $this->ErrorMessages = "Veuillez completer  le champ";
        }
        return $this->name; 
    }
    public function insertInto() {
        if($this->name != ""){
            $insert = $this->connect()->prepare("INSERT INTO data(`name`) VALUES (?)");
             $insert->execute([$this->name]);
             $this->successMessages = "Your articles has been added";
             return $insert;
        }
        
    }   
}