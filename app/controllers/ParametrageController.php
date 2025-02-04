<?php
    namespace app\controllers;
    
    use app\models\HTypeanimal;
    use app\models\HAlimentation;
    use app\models\RequestbackofficeH;
    use Flight;

    class ParametrageController
    {
        public function __construct()
        {

        }
        public function go_to_animal()
        {
            $rep=HTypeanimal::get_all();
            $data=['elevage_type_animal'=> $rep];
            Flight::render('Liste',$data);
        }
        public function go_to_alimentation()
        {
            $rep=HAlimentation::get_all();
            $data=['elevage_alimentation'=> $rep];
            Flight::render('Liste',$data);
        }
        public function delete_type_animal()
        {
            $id=Flight::request()->query['id'];

            $animal_delete=RequestbackofficeH::get_by_colonnes("elevage_animal",["id_type"],[$id]);
            foreach($animal_delete as $donnee)
            {
                RequestbackofficeH::delete_by_nbr("elevage_image","id_animal",$donnee['id_animal']);
            }
            RequestbackofficeH::delete_by_nbr("elevage_animal","id_type",$id);
            RequestbackofficeH::delete_by_nbr("elevage_type_animal","id_type",$id);

            Flight::redirect(BASE_URL.'type_animal');
        }
        public function redirect_modif_type_animal()
        {
            $id=Flight::request()->query['id'];
            $valeur=HTypeanimal::get_by_id($id);
            $alim=HAlimentation::get_all();
            $data=['action'=>"elevage_type_animal",'valeur'=>$valeur,'need'=>$alim];
            Flight::render('form_modif',$data);
        }

        public function redirect_modif_alimentation()
        {
            $id=Flight::request()->query['id'];
            $valeur=HAlimentation::get_by_id($id);
            $data=['action'=>"elevage_alimentation",'valeur'=>$valeur];
            Flight::render('form_modif',$data);
        }
        
        public function update_type_animal()
        {
            // Récupération des données du formulaire
            $data = Flight::request()->data;

            $id_type =Flight::request()->query['id']; // Id toujours fixé à 3
            $id_alimentation = $data->alimentation;
            $nom_type = $data->nom;
            $poids_min = $data->min;
            $poids_max = $data->max;
            $prix_kg = $data->prix_kg;
            $nbr_jrs_dead = $data->resist;
            $perte_sans_manger = $data->perte;
            $conso_jrs = $data->conso;

            // Création de l'objet HTypeanimal
            $newTypeAnimal = new HTypeanimal(
                $id_type,
                $id_alimentation,
                $nom_type,
                $poids_min,
                $poids_max,
                $prix_kg,
                $nbr_jrs_dead,
                $perte_sans_manger,
                $conso_jrs
            );

            HTypeanimal::update($id_type, $newTypeAnimal);
            Flight::redirect(BASE_URL.'type_animal');

        }

        public function update_alimentation()
        {
            // Récupération des données du formulaire
            $data = Flight::request()->data;

            $id_alimentation = Flight::request()->query['id']; // Supposition que l'ID reste fixe à 3
            $nom_alimentation = $data->nom;
            $prix_kg = $data->prix_kg;
            $gain = $data->gain;

            // Création de l'objet HAlimentation
            $newAlimentation = new HAlimentation(
                $id_alimentation,
                $prix_kg,
                $gain,
                $nom_alimentation
            );

            // Mise à jour en base de données
            HAlimentation::update($id_alimentation, $newAlimentation);
            Flight::redirect(BASE_URL.'type_alimentation');
        }
    }
?>