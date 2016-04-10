<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VISPER;

/**
 *
 * @author david
 */
interface IRouteParameter
{
    //put your code here
}

abstract class AbstractRouteParameter implements IRouteParameter
{
    public $key = null;
    public $value = null;
}

class RouteParameter extends \VISPER\AbstractRouteParameter
{
    public function __construct( $key , $value )
    {
        $this->key = $key;
        $this->value = $value;
    }
}