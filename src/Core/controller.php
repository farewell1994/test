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
    protected $studentsModel;
    /**
     * @var View. received View object
     */
    protected $view;
    protected $booksModel;

    /**
     * Controller constructor. Assigns the received values to variables
     * @param Model $needModel
     * @param View $needView
     */
    public function __construct(Model $infoModel, Model $booksModel, View $view)
    {
        $this->view = $view;
        $this->studentsModel = $infoModel;
        $this->booksModel = $booksModel;
    }
}
