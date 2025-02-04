<?php
    namespace app\controllers;
    use app\models\Heleveur;
    use Flight;
    use PDO;

    class LoginController
    {
        public function __construct()
        {

        }
        public function home()
        {
            FLight::render('login');
        }
        public function login()
        {
            $form = Flight::request()->data;
            $nom=$form->nom;
            $pass=$form->pass;

            $valeur=Heleveur::get_verification($nom,$pass);
            if($valeur==null)
            {
                $data=['error'=>1];
                Flight::render('login',$data);
            }
            else
            {
                $id=$valeur['id_eleveur'];
                $_SESSION['id_eleveur']=$id;
                Flight::render('accueil');
            }

        }
    }
?>