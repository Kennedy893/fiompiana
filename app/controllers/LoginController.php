<?php
    namespace app\controllers;
    use app\models\User;
    use Flight;

    class UserController
    {
        public function __construct()
        {

        }
        public function home()
        {
            FLight::render('Login');
        }
        public function login()
        {
            
        }
    }
?>