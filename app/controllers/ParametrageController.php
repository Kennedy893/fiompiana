<?php
    namespace app\controllers;
    
    use app\models\HTypeanimal;
    use app\models\HAlimentation;
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
    }
?>