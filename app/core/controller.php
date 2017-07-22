<?php
abstract class Controller {
	
	public $model;
	public $view;

    /**
     * Controller constructor.
     */
    public function __construct(MainModel $needModel, View $needView)
	{
		$this->view = $needView;
        $this->model = $needModel;
	}
}