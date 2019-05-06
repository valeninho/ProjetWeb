<?php

class Vue_voiture_couleurDB {

    private $_db;
    private $_array = array();

    public function __construct($db) {//contenu de $cnx (index)
        $this->_db = $db;
    }

    public function getVoituresByType($id_type) {
        print 'coucou';
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_voiture_couleur where type=:type";
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':type', $type);
            $resultset->execute();
            $this->_db->commit();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }

    public function getAllVoitures() {
        try {
            $this->_db->beginTransaction();
            $query = "select * from vue_voiture_couleur";
            $resultset = $this->_db->prepare($query);
            $resultset->execute();
            $this->_db->commit();
            while ($data = $resultset->fetch()) {
                $_array[] = $data;
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
        if (!empty($_array)) {
            return $_array;
        } else {
            return null;
        }
    }

}
