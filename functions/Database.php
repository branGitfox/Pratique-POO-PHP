<?php 

class Database {
    private $dbname = "crud";
    private $username = "root";
    private $host = "127.0.0.1";
    private $con;
    private $name;
    public $ErrorMessages;

    public $successMessages;
    private $id;

//connection à la base de donnée
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

/**
 * une fonction qui permet verifier si le champ n'est pas vide
 */

    public function checkInput () {
     
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $this->name = $_POST['name'];
        }else {
            $this->ErrorMessages = "Veuillez completer  le champ";
        }
        return $this->name; 
    }

 
    /***
  * une fonction qui permet d'ajouter un article
*/   
    public function insertInto() {
        if($this->name != ""){
            $insert = $this->connect()->prepare("INSERT INTO data(`name`) VALUES (?)");
             $insert->execute([$this->name]);
             $this->successMessages = "Your articles has been added";
             return $insert;
        }    
    }   

/**
 * une fonction qui permet de supprimer un article
 */
    public function deleteFrom() {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $delete = $this->connect()->prepare("DELETE FROM data WHERE id = ?");
            $delete->execute([$id]);
            return $delete;
        }
    }

/**
 * une fonction qui permet de rediriger vers une page
 */
    public function Redirect(string $page) {
        return header('location:index.php?p='.$page);
    }

/**
 * fonction qui permet de recuperer tous les articles
 */
  public function fetchAll() {
    $fetch = $this->connect()->query('SELECT * FROM data');
    $fetch->execute();
    $data = $fetch->fetchAll();
    return $data;
  }

/***
 * prerecupere les donnée de 'utilisateur
 */

  public function recupArticle() {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->id= $id;
            $recup = $this->connect()->prepare('SELECT * FROM data WHERE id = ?');
            $recup->execute([$id]);
            $data = $recup->fetch();
            return $data;
        }
  }
/**
 * modification d'un articles
 */
  public function Update() {
        if(isset($_POST['modif']) && !empty($_POST['modif'])){
            $name = $_POST['modif'];
            $update = $this->connect()->prepare('UPDATE data  SET name = ? WHERE id= ?');
            $update->execute([$name,$this->id]);
             $this->Redirect('home');
            
        }
     
    }
}

