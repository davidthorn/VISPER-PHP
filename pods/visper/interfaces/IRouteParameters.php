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
interface IRouteParameters
{

    function setParameter( $key , $value );
    function hasParameter( $key );    
    function getParameter( $key );

}


abstract class AbstractRouteParameters implements IRouteParameters
{
    /**
     *
     * @var VISPER\ArrayList
     */
     private $parameters = null;


    public function __construct( \VISPER\ArrayList $list  ){
         $this->parameters = $list;
    }

      /**
     *
     * @param type $key
     * @param type $value
     * @return  void Description
     */
     public function setParameter( $key , $value ){
         $parameter = new Parameter();
         $parameter->key = $key;
         $parameter->value = $value;
         $this->parameters[ $key ] = $parameter;
     }

     /**
      *
      * @param type $key
      * @return boolean
      */
     public function hasParameter( $key ){
         if( array_key_exists( $this->parameters , $key ) )
         {
             return true;
         }
         return false;
     }

     /**
      *
      * @param string $key
      * @return IRouteParameter
      */
     public function getParameter( $key ){
         if( $this->hasParameter($key) )
         {
             return $this->parameters[ $key ];
         }
         return false;
     }
}

 class RouteParameters extends AbstractRouteParameters{

     /**
      *
      * @param \VISPER\ArrayList $list
      */
    public function __construct( \VISPER\ArrayList $list  ){
        parent::__construct($list);
    }
}


