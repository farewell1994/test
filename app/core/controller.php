<?php
abstract class Controller
{
    public $model;
    public $view;
    /**
     * Controller constructor.
     */
    public function __construct($needModel, $needView)
    {
        $this->view = $needView;
        $this->model = $needModel;
    }
}