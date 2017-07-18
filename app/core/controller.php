<?php
abstract class Controller {
	
	public $model;
	public $view;

    /**
     * Controller constructor.
     */
    function __construct()
	{
		$this->view = new View(); //генеруємо представлення 
        $this->model = new MainModel();
	}
}