<?php
require_once 'libs/smarty-master/libs/Smarty.class.php';
class LibroView{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showBiblioteca($biblioteca){
        $this->smarty->assign('titulo','Biblioteca Autores Latinoamericanos');
        $this->smarty->assign('biblioteca',$biblioteca);
        $this->smarty->display('../templates/listBiblioteca.tpl');

    }

    function showBook($book,$nombre,$apellido){
        $this->smarty->assign('titulo',$book ->titulo);
        $this->smarty->assign('autor',"$nombre $apellido");
        $this->smarty->assign('libro',$book);
        $this->smarty->display('../templates/bookDetail.tpl');
            
    }

    function showBooksOfAuthor($booksOfAuthor,$nombre,$apellido){
        $this->smarty->assign('nombre',$nombre);
        $this->smarty->assign('apellido', $apellido);
        $this->smarty->assign('librosAutor',$booksOfAuthor);
        $this->smarty->display('../templates/listLibrosAutor.tpl');
    }
}