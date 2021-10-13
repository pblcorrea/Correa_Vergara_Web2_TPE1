<?php
require_once "./Model/UserModel.php";
require_once "./View/AdminView.php";
 
 class LoginController{

    private $model;
    private $view;
   
    

    function __construct()
    {
        $this->model = new UserModel();
        $this->view = new AdminView();
        
       
    }
    function logout(){
        session_start();
        session_destroy();
        header("Location:".BASE_URL."home");
    }

    function showFormLogin(){
        
        $this->view->showLogin();
    }

   

    public function verifyLogin(){
        if(!empty($_POST['email'])&& !empty($_POST['password'])){
            $email=$_POST['email'];
            $password=$_POST['password'];
           
            $user = $this->model->getUser($email);
            
            if($user && password_verify($password,($user->contrasenia))){ //password_verify funcion del sistema para comparar pass con hash
                session_start(); //Se hace para iniciar la consulta a la variable $_SESSION, no es que inicia la sesión
                $_SESSION["email"] = $email; //cuando se logue guardo info en su session
                header("Location:".BASE_URL."homeAdmin");
            }else{
                $this->view->showLogin("Acceso denegado");
            }
    }
 }
}