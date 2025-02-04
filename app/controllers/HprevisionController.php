<?php
    namespace app\controllers;
    use app\models\Hcalcul_prevision;
    use Flight;
    use PDO;

    class HprevisionController
    {
        public function __construct()
        {

        }

        public function envoie()
        {
            $date = Flight::request()->data->date;
            $result=Hcalcul_prevision::calc_prev($date);
            $data=['result'=>$result];
            Flight::render('accueil',$data);
        }
    }
?>