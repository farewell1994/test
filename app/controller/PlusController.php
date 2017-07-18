<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 18.07.2017
 * Time: 11:01
 */
class PlusController extends Controller
{
    /**
     * @param $someValue
     */
    function addAction($someValue){
        $data=null;
        if(!empty($someValue)){
            $data = $this->model->addInfo();
        }
        $this->view->show('addView.php', $data);
    }
    function editAction($someValue){

    }
}