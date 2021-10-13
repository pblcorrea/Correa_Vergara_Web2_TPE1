<?php

require_once "./Model/AutorModel.php";
require_once "./View/AutorView.php";
require_once "./View/ErrorView.php";
require_once "./Helpers/AuthHelper.php";
require_once "./View/AdminView.php";



class AutorController{

    private $model;
    private $view;
    private $viewAdmin;
    private $viewError;
    private $authHelper;

    function __construct()
    {
        $this->model = new AutorModel();
        $this->view = new AutorView();
        $this->viewAdmin = new AdminView();
        $this->viewError = new ErrorView();
        $this->authHelper = new AuthHelper();
    }

   

     
    function viewAuthors(){

        $authors = $this->model->getAuthors();
        if($authors){
            $this->view->showAuthors($authors);
        }else{
            $mensajeError = "No hay autores en la biblioteca";
            $this->viewError->showErrorPage($mensajeError);
        }
        

    }   

    function authorsAdmin(){
        $this->authHelper->checkLoggedIn();
        $autores = $this->model->getAuthors();
        $this->viewAdmin->showAuthorsAdmin($autores);
    }

    function updateAuthorForm($id){
        $this->authHelper->checkLoggedIn();
        $autores = $this->model->getAuthors();
        $this->viewAdmin->showUpdateAuthor($autores,$id);
    }

    function updateAuthorSave($id){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['nombre'])&& !empty($_POST['apellido'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            $this->model->updateAuthor($id,$nombre, $apellido);
            header("Location:".BASE_URL."authorsAdmin");

        }
    }

    function addAuthor(){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['nombre']) && !empty($_POST['apellido'])){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];

            $this->model->addAuthorDB($nombre,$apellido);
            header("Location:".BASE_URL."authorsAdmin");
        }
    }

    function deleteAuthor($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteAuthorFromDB($id);
        header("Location:".BASE_URL."authorsAdmin");
    }
    
}

