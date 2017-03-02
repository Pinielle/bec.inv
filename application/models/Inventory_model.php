<?php

/**
 * Created by PhpStorm.
 * User: ihor
 * Date: 13.02.17
 * Time: 12:40
 */
class Inventory_model extends Model
{
    /**
     * Inventory data
     *
     * @var $data array
     */
    protected $data = array();

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;
        return $this;
    }

    public function load($id)
    {

    }

    public function save()
    {

    }
}