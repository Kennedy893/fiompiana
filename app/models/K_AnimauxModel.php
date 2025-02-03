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

	public function getAnimauxAVendre($id_eleveur)
    {
        $stmt = $this->db->prepare("SELECT * FROM elevage_animal WHERE status_vente is TRUE AND id_eleveur != $id_eleveur");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}