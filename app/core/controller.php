<?php
abstract class Controller {
	
	public $model;
	public $view;

    /**
     * Controller constructor.
     */
    public function __construct()
	{
		$this->view = new View(); //генеруємо представлення 
        $this->model = new MainModel();
	}
}