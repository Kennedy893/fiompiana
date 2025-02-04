<?php

namespace app\models;

class HTypeanimal
{
    private $id_type;
    private $alimentation;
    private $nom_type;
    private $poids_min;
    private $poids_max;
    private $prix_kg;
    private $nbr_jrs_dead;
    private $perte_sans_manger;
    private $conso_jrs;

    // Constructeur
    public function __construct($id_type, $id_alimentation, $nom_type, $poids_min, $poids_max, $prix_kg, $nbr_jrs_dead, $perte_sans_manger, $conso_jrs)
    {
        $this->setIdType($id_type);
        $this->setAlimentation($id_alimentation);
        $this->setNomType($nom_type);
        $this->setPoidsMin($poids_min);
        $this->setPoidsMax($poids_max);
        $this->setPrixKg($prix_kg);
        $this->setNbrJrsDead($nbr_jrs_dead);
        $this->setPerteSansManger($perte_sans_manger);
        $this->setConsoJrs($conso_jrs);
    }

    // Getters et Setters
    public function getIdType()
    {
        return $this->id_type;
    }

    public function setIdType($id_type)
    {
        $this->id_type = $id_type;
    }

    public function getAlimentation()
    {
        return $this->alimentation;
    }

    public function setAlimentation($id_alimentation)
    {
        $rep=HAlimentation::get_by_id($id_alimentation);
        $this->alimentation = $rep;
    }

    public function getNomType()
    {
        return $this->nom_type;
    }

    public function setNomType($nom_type)
    {
        $this->nom_type = $nom_type;
    }

    public function getPoidsMin()
    {
        return $this->poids_min;
    }

    public function setPoidsMin($poids_min)
    {
        $this->poids_min = $poids_min;
    }

    public function getPoidsMax()
    {
        return $this->poids_max;
    }

    public function setPoidsMax($poids_max)
    {
        $this->poids_max = $poids_max;
    }

    public function getPrixKg()
    {
        return $this->prix_kg;
    }

    public function setPrixKg($prix_kg)
    {
        $this->prix_kg = $prix_kg;
    }

    public function getNbrJrsDead()
    {
        return $this->nbr_jrs_dead;
    }

    public function setNbrJrsDead($nbr_jrs_dead)
    {
        $this->nbr_jrs_dead = $nbr_jrs_dead;
    }

    public function getPerteSansManger()
    {
        return $this->perte_sans_manger;
    }

    public function setPerteSansManger($perte_sans_manger)
    {
        $this->perte_sans_manger = $perte_sans_manger;
    }

    public function getConsoJrs()
    {
        return $this->conso_jrs;
    }

    public function setConsoJrs($conso_jrs)
    {
        $this->conso_jrs = $conso_jrs;
    }

    // Méthodes pour récupérer les données de la base
    public static function get_all()
    {
        $values = RequestbackofficeH::get_all("elevage_type_animal");
        $retour = array();
        foreach ($values as $donnee) {
            $rep = new HTypeanimal(
                $donnee['id_type'],
                $donnee['id_alimentation'],
                $donnee['nom_type'],
                $donnee['poids_min'],
                $donnee['poids_max'],
                $donnee['prix_kg'],
                $donnee['nbr_jrs_dead'],
                $donnee['perte_sans_manger'],
                $donnee['conso_jrs']
            );
            $retour[] = $rep;
        }
        return $retour;
    }

    public static function get_by_id($id)
    {
        $values = RequestbackofficeH::get_by_nbr("elevage_type_animal", "id_type", $id);
        $rep = new HTypeanimal(
            $values['id_type'],
            $values['id_alimentation'],
            $values['nom_type'],
            $values['poids_min'],
            $values['poids_max'],
            $values['prix_kg'],
            $values['nbr_jrs_dead'],
            $values['perte_sans_manger'],
            $values['conso_jrs']
        );
        return $rep;
    }

    public static function update($id,$newval)
    {
        $request="UPDATE elevage_type_animal SET id_alimentation=".
        $newval->getAlimentation()->getIdAlimentation().
        ", nom_type='".$newval->getNomType().
        "', poids_min=".$newval->getPoidsMin().
        ", poids_max=".$newval->getPoidsMax().
        ", prix_kg=".$newval->getPrixKg().
        ", nbr_jrs_dead=".$newval->getNbrJrsDead().
        ", perte_sans_manger=".$newval->getPerteSansManger().
        ", conso_jrs=".$newval->getConsoJrs().
        ", WHERE id_type=".$id;

        $db=Flight::db();
        $sql=$db->prepare($request);
        $sql->execute();
    }
}

?>
