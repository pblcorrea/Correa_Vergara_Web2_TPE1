<?php
require_once 'libs/smarty-master/libs/Smarty.class.php';
class AdminView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showLogin($error = "")
    {
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->assign('error', $error);
        $this->smarty->display('../templates/login.tpl');
    }


    function showBibliotecaAdmin($biblioteca,$autores)
    {
        $this->smarty->assign('titulo', 'Biblioteca Autores Latinoamericanos');
        $this->smarty->assign('biblioteca', $biblioteca);
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('../templates/listBibliotecaAdmin.tpl');
    }

    function showUpdateBook($book,$autores){
        $this->smarty->assign('libro', $book);
        $this->smarty->assign('autores',$autores);
        $this->smarty->display('../templates/updateLibroAdmin.tpl');
    }

    function showAuthorsAdmin($autores){
        $this->smarty->assign('titulo', 'Autores Latinoamericanos');
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('../templates/listAuthorsAdmin.tpl');
    }

    function showUpdateAuthor($autores,$id){
        $this->smarty->assign('titulo', 'Autores Latinoamericanos');
        $this->smarty->assign('autores', $autores);
        $this->smarty->assign('idAutor', $id);
        $this->smarty->display('../templates/listAuthorsAdmin.tpl');
    }
}
