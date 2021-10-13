<?php
require_once 'libs/smarty-master/libs/Smarty.class.php';
class ErrorView{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showErrorPage($error){
        $this->smarty->assign('error',$error);
        $this->smarty->display('../templates/error.tpl');
    }
}