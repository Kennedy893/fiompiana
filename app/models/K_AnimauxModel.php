<?php

namespace app\models;

use Flight;
use PDO;

class ProductModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

	public function getAnimauxAVendre()
    {
        $stmt = $this->db->prepare("SELECT * FROM elevage_animal WHERE status_vente != NULL");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    
}