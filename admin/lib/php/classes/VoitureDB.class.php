<?php


class VoitureDB extends Voiture {
    
    private $_db;
    private $_array = array();
    
    public function __construct($db){ //contenu de $cnx contenu dans l'index
        $this->_db = $db;
    }
    
    public function getVoiture(){ 
        try{
            $query = "select * from voiture";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while($data = $resultset->fetch()){
                //$_array[] = new Voiture($data);
                $_array[] = $data;
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
