<?php


class LocationDB extends Location {
    
    private $_db;
    private $_array = array();
    
    public function __construct($db){ //contenu de $cnx contenu dans l'index
        $this->_db = $db;
    }
    
    public function getLocation(){
        try{
            $query = "select * from location";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();

            while($data = $resultset->fetch()){
                $_array[] = new Location($data);
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
