<?php
require_once 'libs/smarty-master/libs/Smarty.class.php';
class AutorView{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

   

    function showHomeLocation(){
        header("Location:".BASE_URL."home");
    }

    
    
    function showAuthors($authors){
        $this->smarty->assign('titulo','Autores Latinoamericanos');
        $this->smarty->assign('autores',$authors);
        $this->smarty->display('../templates/listAutores.tpl');

    }

    

}