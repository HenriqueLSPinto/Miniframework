<?php

namespace MF\Init;

abstract class Bootstrap { //não pode ser instanciada, mas ele pode ser herdada

    private $routes;

    abstract protected function initRoutes();

	public function __construct(){        //sera execultado quando a instancia de um objeto for feito em base dessa classe
		$this->initRoutes();
		$this->run($this->getUrl());		//O get url retorna o path acessado pelo usuario
	}

    public function getRoutes(){
		return $this->routes;
	}

	public function setRoutes(array $routes){      //vai solicitar um array de rota, que esta no metodo initRoutes()
		$this->routes = $routes; 
	}

    protected function run($url){      //precisamos receber o parametro de $url

		foreach($this->getRoutes() as $key => $route){
			if($url == $route['route']){
				$class = "App\\Controllers\\".ucfirst($route['controller']); //programamos a classe que queremos instanciar

				$controller = new $class; //Estamos chamando a instancia de uma classe cujo o nome e o namespace foi formado dinamicamente

				$action =  $route['action'];

				$controller->$action();
				
			};
		};
	}

    protected function getUrl() {                      //função para pegar o url
		return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
	}

}


?>