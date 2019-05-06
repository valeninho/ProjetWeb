<?php


class MarqueDB extends Marque {
    
    private $_db;
    private $_array = array();
    
    public function __construct($db){ //contenu de $cnx contenu dans l'index
        $this->_db = $db;
    }
    
    public function getMarque(){
        try{
            $query = "select * from client";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Marque($data);
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
