<?php


class CouleurDB extends Couleur {
    
    private $_db;
    private $_array = array();
    
    public function __construct($db){ //contenu de $cnx contenu dans l'index
        $this->_db = $db;
    }
    
    public function getCouleur(){
        try{
            $query = "select * from couleur";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Couleur($data);
            }        
        }
        catch(PDOException $e){
            print $e->getMessage();
        }
        if(!empty($_array)){
            return $_array;
        }
        else {
            return null;
        }
    }
}
