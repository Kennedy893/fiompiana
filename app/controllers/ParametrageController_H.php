<?php
    namespace app\controllers;
    
    use app\models\Type_animal_H;
    use app\models\Alimentation_H;
    use Flight;

    class ParametrageController_H
    {
        public function __construct()
        {

        }
        public function go_to_animal()
        {
            $rep=Type_animal_H::get_all();
            $data=['elevage_type_animal'=> $rep];
            Flight::render('Liste',$data);
        }
        public function go_to_alimentation()
        {
            $rep=Alimentation_H::get_all();
            $data=['elevage_alimentation'=> $rep];
            Flight::render('Liste',$data);
        }
    }
?>