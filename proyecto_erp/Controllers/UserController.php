<?php
    namespace Controllers;
    use Models\user as user;

    class UserController{

        private $user;

        function __construct(){
            $this->user = new user();
        }

        function index(){
            $data = $this->user->toList();
            return $data;
        }
        
        function Registry($id){
            $data = $this->user->forId($id);
            return $data;
        }
    }

?>