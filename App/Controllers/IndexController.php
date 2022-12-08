<?php

namespace App\Controllers;
//Recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

//Models
use App\Models\Produto;
use App\Models\Info;


class IndexController extends Action {  //A classe leva o mesmo nome do arquivo

    public function index() {        //Esses metodos do controller, representam as actions do route

        $produto = Container::GetModel('Produto');

        $produtos = $produto->getProdutos();

        $this->view->dados = $produtos;

        $this->render('index' , 'layout1');
    }

    public function sobreNos(){

        $info = Container::GetModel('Info');

        $informacoes = $info->getInfo();

        @$this->view->dados = $informacoes;

        $this->render('sobreNos', 'layout1');

    }
}


?>