<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 13.02.17
 * Time: 12:27
 */
class Inventory extends Controller
{

    /**
     * @var Inventory_model
     */
    protected $_model;

    function __construct()
    {
        $this->_model = new Inventory_model();
        $this->view->generate('header.php');
        parent::__construct();
    }

    public function createAction()
    {

        $array = array(
            'name' => 'somename',
            'vendor' => 'Sony'
        );

        $this->model->setData($array)->save();


    }

}
