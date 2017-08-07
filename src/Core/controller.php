<?php
namespace Test\Core;
/**
 * Class Controller
 * @package Test\Core
 */
abstract class Controller
{
    /**
     * @var Model. received Model object
     */
    protected $model;
    /**
     * @var View. received View object
     */
    protected $view;

    /**
     * Controller constructor. Assigns the received values to variables
     * @param Model $needModel
     * @param View $needView
     */
    public function __construct(Model $needModel, View $needView)
    {
        $this->view = $needView;
        $this->model = $needModel;
    }
}
