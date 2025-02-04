<?php

namespace app\models;

use PDO;
use Flight;

class HEleveur
{
    private $id_eleveur;
    private $nom;
    private $mot_de_passe;
    private $capital;

    // Constructeur
    public function __construct($id_eleveur, $nom, $mot_de_passe, $capital) 
    {
        $this->setIdEleveur($id_eleveur);
        $this->setNom($nom);
        $this->setMotDePasse($mot_de_passe);
        $this->setCapital($capital);
    }

    // Getter pour id_eleveur
    public function getIdEleveur() 
    {
        return $this->id_eleveur;
    }

    // Setter pour id_eleveur
    public function setIdEleveur($id_eleveur) 
    {
        $this->id_eleveur = $id_eleveur;
    }

    // Getter pour nom
    public function getNom() 
    {
        return $this->nom;
    }

    // Setter pour nom
    public function setNom($nom) 
    {
        $this->nom = $nom;
    }

    // Getter pour mot_de_passe
    public function getMotDePasse() 
    {
        return $this->mot_de_passe;
    }

    // Setter pour mot_de_passe
    public function setMotDePasse($mot_de_passe) 
    {
        $this->mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    }

    // Getter pour capital
    public function getCapital() 
    {
        return $this->capital;
    }

    // Setter pour capital
    public function setCapital($capital) 
    {
        $this->capital = $capital;
    }

    // Récupérer tous les éleveurs
    public static function get_all()
    {
        $values = RequestbackofficeH::get_all("elevage_eleveur");
        $retour = [];
        foreach ($values as $donnee) {
            $rep = new HEleveur(
                $donnee['id_eleveur'],
                $donnee['nom'],
                $donnee['mot_de_passe'],
                $donnee['capital']
            );
            $retour[] = $rep;
        }
        return $retour;
    }

    // Récupérer un éleveur par son ID
    public static function get_by_id($id)
    {
        $values = RequestbackofficeH::get_by_nbr("elevage_eleveur", "id_eleveur", $id);
        return new HEleveur(
            $values['id_eleveur'],
            $values['nom'],
            $values['mot_de_passe'],
            $values['capital']
        );
    }

    // Mise à jour des informations d'un éleveur
    public static function update($id, $newval)
    {
        $request = "UPDATE elevage_eleveur SET 
            nom='" . $newval->getNom() . "',
            mot_de_passe='" . $newval->getMotDePasse() . "',
            capital=" . $newval->getCapital() . "
            WHERE id_eleveur=" . $id;

        $db = Flight::db();
        $sql = $db->prepare($request);
        $sql->execute();
    }
}

?>
