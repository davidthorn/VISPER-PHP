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
interface IRoutePattern
{
    //put your code here

        //property pattern

        function getPattern();

        function setPattern( $pattern );
}

abstract  class RoutePattern implements \VISPER\IRoutePattern{

    private  $pattern = null;
    public function getPattern(){
        return $this->pattern;
    }
    public function setPattern($pattern){
        $this->pattern = $pattern;
    }
}


