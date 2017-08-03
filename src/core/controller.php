<?php
namespace Test\Core;

abstract class Controller
{
    public $model;
    public $view;
    /**
     * Controller constructor.
     */
    public function __construct(Model $needModel, View $needView)
    {
        $this->view = $needView;
        $this->model = $needModel;
    }
}