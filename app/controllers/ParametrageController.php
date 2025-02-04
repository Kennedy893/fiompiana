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
    }
?>