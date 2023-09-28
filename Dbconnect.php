<?php

class Dbconnect{

    // Definition des variables
    private $pdo;
     // Definition des variables de connexion a la BD
    private $host;
    private $db;
    private $user;
    private $user_password;

    public function __construct()
    {
        $this->pdo=null;
        $this->host="localhost";
        $this->db="contacts_simplon";
        $this->user="root";
        $this->user_password="";
    }


    
    public function connect(){

        $dsn="mysql:host=$this->host;dbname=$this->db;charset=utf8";
        $usernme=$this->user;
        $password= "";

        try {
            $this->pdo=new PDO($dsn,$usernme,$password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
            die();
        }

        return $this->pdo;
    }

    // Fonction de requete à la BD
function req($req,$parametre=null){
    $pdo =(new Dbconnect)->connect();

    $prepare = $pdo->prepare($req);

    if($parametre != null ){
        $prepare->execute($parametre);
    }else{
        $prepare->execute();
    }
    return $prepare;
}
    
}



