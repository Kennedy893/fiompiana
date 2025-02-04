<?php

    namespace app\models;
    
    class Alimentation_H
    {
        private $id_alimentation;
        private $prix_kg;
        private $gain;
        private $nom_alimentation;
    
        // Constructeur
        public function __construct($id_alimentation, $prix_kg, $gain,$nom) 
        {
            $this->setIdAlimentation($id_alimentation);
            $this->setPrix_kg($prix_kg);
            $this->setgain($gain);
            $this->setnom($nom);
        }
    
        // Getter pour id_alimentation
        public function getIdAlimentation() 
        {
            return $this->id_alimentation;
        }
    
        // Setter pour id_alimentation
        public function setAlimentation($id_alimentation) 
        {
            $this->id_alimentation = $id_alimentation;
        }

        public function getNom() 
        {
            return $this->nom_alimentation;
        }
    
        // Setter pour id_alimentation
        public function setNom($nom) 
        {
            $this->nom_alimentation = $nom;
        }
    
        // Getter pour prix_kg
        public function getPrix_kg() 
        {
            return $this->prix_kg;
        }
    
        // Setter pour prix_kg
        public function setPrix_kg($prix_kg) 
        {
            $this->prix_kg = $prix_kg;
        }
    
        // Getter pour gain
        public function getGain() 
        {
            return $this->gain;
        }
    
        // Setter pour gain
        public function setGain($gain) 
        {
            if($gain>=10)
            {
                $gain=5;
            }
            $this->gain = $gain;
        }
    
        public static function get_all()
        {
            $values=Request_backoffice::get_all("eleve_alimentation");
            $retour=array();
            foreach($donnee as $values)
            {
                $rep=new Alimentation_H($donnee['id_alimentation'],$donnee['prix_kg'],$donnee['gain'],$donnee['nom_alimentation']);
                $retour[]=$rep;
            }
            return $retour;
        }

        public static function get_by_id($id)
        {
            $values=Request_backoffice::get_by_nbr("elevage_alimentation","id_alimentation",$id);
            $rep=new Alimentation_H($values[0]['id_alimentation'],$values[0]['prix_kg'],$values[0]['gain'],$values[0]['nom_alimentation']);

            return $rep;
        }
    }
    
    
?>