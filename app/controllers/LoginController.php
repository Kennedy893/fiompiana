<?php
    namespace app\controllers;
    use app\models\User;
    use Flight;

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
            
        }
    }
?>