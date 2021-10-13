<?php

require_once "./Model/LibroModel.php";
require_once "./Model/AutorModel.php";
require_once "./View/LibroView.php";
require_once "./View/ErrorView.php";
require_once "./View/AdminView.php";
require_once "./Helpers/AuthHelper.php";

class LibroController
{

    private $model;
    private $view;
    private $viewAdmin;
    private $viewError;
    private $authHelper;
    private $modelAutor;

    function __construct()
    {
        $this->model = new LibroModel();
        $this->modelAutor = new AutorModel();
        $this->view = new LibroView();
        $this->viewAdmin = new AdminView();
        $this->viewError = new ErrorView();
        $this->authHelper = new AuthHelper();
    }

    function showHome(){

        $biblioteca = $this->model->getBiblioteca();
        if(!empty($biblioteca)){
            $this->view->showBiblioteca($biblioteca);
        }else{
            $mensajeError = "No hay libros en la biblioteca";
            $this->viewError->showErrorPage($mensajeError);
        }
    }

    function  viewBook($id,$nombre,$apellido)
    {
        $mensajeError = "El libro solicitado no se encuentra en nuestra base de datos";
        if(!empty($id) && !empty($nombre) && !empty($apellido)){
            $book = $this->model->getBook($id);
            if($book){
                $autor = $this->modelAutor->getAuthor($book->id_autor);
                if($nombre == $autor->nombre && $apellido == $autor->apellido){
                    $this->view->showBook($book,$nombre,$apellido);
                }else{
                    $this->viewError->showErrorPage($mensajeError);
                }
            }else{
                $this->viewError->showErrorPage($mensajeError);
            }
        }
        
    }


    function  viewBooksOfAuthor($id,$nombre,$apellido)
    {
        if(!empty($id) && !empty($nombre) && !empty($apellido)){
            $booksOfAuthor = $this->model->getBooksOfAuthor($id);
            if($booksOfAuthor){
                $autor = $this->modelAutor->getAuthor($id);
                if($nombre == $autor->nombre && $apellido == $autor->apellido){
                    $this->view->showBooksOfAuthor($booksOfAuthor,$nombre,$apellido);
                }else{
                    $mensajeError = "El autor solicitado no se encuentra en nuestra base de datos";
                    $this->viewError->showErrorPage($mensajeError);
                }
            }else{
                $mensajeError = "Ups! Parece que algo salió mal";
                    $this->viewError->showErrorPage($mensajeError);
            }

        }   
       
    }

    function showHomeAdmin(){
        $this->authHelper->checkLoggedIn();
        $biblioteca = $this->model->getBiblioteca();
        $autores = $this->modelAutor->getAuthors();
        $this->viewAdmin->showBibliotecaAdmin($biblioteca,$autores);
    }

    function editarBook($id){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['titulo'])&& !empty($_POST['autor'])&& !empty($_POST['anio'])){
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $anio = $_POST['anio'];
            $sinopsis = $_POST['sinopsis'];
            $this->model->updateBook($id,$titulo, $autor,$anio,$sinopsis);
        }
    }

    
    function deleteBook($id){
        $this->authHelper->checkLoggedIn();
        $this->model->deleteBookFromDB($id);
        header("Location:".BASE_URL."homeAdmin");

    }

    function updateBookForm($id){
        $this->authHelper->checkLoggedIn();
        $book = $this->model->getBook($id);
        $autores = $this->modelAutor->getAuthors();
        $this->viewAdmin->showUpdateBook($book,$autores);

    }

    function updateBook($id){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['titulo'])&& !empty($_POST['autor'])&& !empty($_POST['anio'])){
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $anio = $_POST['anio'];
            $sinopsis = $_POST['sinopsis'];

            $this->model->updateBook($id,$titulo, $autor,$anio,$sinopsis);
            header("Location:".BASE_URL."homeAdmin");
        }
    }

    function addBook(){
        $this->authHelper->checkLoggedIn();
        if(!empty($_POST['titulo']) && !empty($_POST['anio'])){
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $anio = $_POST['anio'];
            $sinopsis = $_POST['sinopsis'];

            $this->model->addBookDB($titulo,$autor,$anio, $sinopsis);
            header("Location:".BASE_URL."homeAdmin");
        }
    }

   
}

