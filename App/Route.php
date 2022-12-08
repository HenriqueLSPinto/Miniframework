<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {               //Class route vai cuidar das rotas

	protected function initRoutes() { //Constructor get e set foi para o Bootstrap, esses metodos continuam aqui pois são requisitos e metodos funcionais

		$routes['home'] = array(              //cria um array pra cada rota
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['sobre_nos'] = array(
			'route' => '/sobre_nos',
			'controller' => 'indexController',
			'action' => 'sobreNos'
		);

		$this->setRoutes($routes);
	}
}

?>