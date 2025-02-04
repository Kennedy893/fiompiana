<?php

    namespace app\models;
    
    class HAlimentation
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
        public function setIdAlimentation($id_alimentation) 
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
            $values=RequestbackofficeH::get_all("elevage_alimentation");
            $retour=array();
            foreach($values as $donnee)
            {
                $rep=new HAlimentation($donnee['id_alimentation'],$donnee['prix_kg'],$donnee['gain'],$donnee['nom_alimentation']);
                $retour[]=$rep;
            }
            return $retour;
        }

        public static function get_by_id($id)
        {
            $values=RequestbackofficeH::get_by_nbr("elevage_alimentation","id_alimentation",$id);
            $rep=new HAlimentation($values['id_alimentation'],$values['prix_kg'],$values['gain'],$values['nom_alimentation']);

            return $rep;
        }
        public static function update($id,$newval)
    {
        $request="UPDATE elevage_alimentation SET prix_kg=".
        $newval->getPrix_kg().
        ", nom_alimentation='".$newval->getNom().
        "', gain=".$newval->getGain().
        ", WHERE id_alimentation=".$id;

        $db=Flight::db();
        $sql=$db->prepare($request);
        $sql->execute();
    }

    }
    
    
?>