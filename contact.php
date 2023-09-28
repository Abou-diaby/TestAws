<?php
require_once('Dbconnect.php');


// Enregistrement des formulaires
if(isset($_POST['insert'])){
    try {
        $inserting = (new Dbconnect)->req(
            "INSERT INTO `participants`(`NOM`, `PRENOM`, `TEL`,`EMAIL` ) VALUES (?,?,?,?)",
            [$_POST['nom'], $_POST['prenom'], $_POST['tel'], $_POST['email'] ]);
        
        if($inserting){
            echo "ENREGISTRE";
            header("location: dashboard.php");
        }else{
            echo "ECHOUE";
        }

    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}

function compteur(){
    $selecting = (new Dbconnect)->req(
        "SELECT count(`ID`) as cpt FROM `participants`","");
    
    $compteur= $selecting->fetch();
    return ($compteur['cpt']);
}







