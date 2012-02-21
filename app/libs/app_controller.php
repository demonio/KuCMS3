<?php
/**
 * Todas las controladores heredan de esta clase en un nivel superior
 * por lo tanto los metodos aqui definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 **/

// @see Controller nuevo controller
require_once CORE_PATH . 'kumbia/controller.php';

class AppController extends Controller {

	protected function initialize()
	{
		$this->url = $_SERVER['REQUEST_URI'];

		if ( $this->url == '/' )
		{
			include 'index.html';
			exit;
		}
	}

	final protected function finalize()
	{
	}
}