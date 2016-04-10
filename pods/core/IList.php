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
interface IList
{
     function add( $object );
     function pop( );
     function push( $object );
     function shift();
     function removeAll();
     function remove( $object );
     function index( $int );
     function count();
}

class ArrayList implements IList{
    
    
    private $objects = array();

    /**
     *
     * @param type $object
     */
    public function add( $object ){
        $this->objects[] = $object;
    }

    /**
     *
     * @return type
     */
     public function pop( ){
         return array_pop($this->objects);
     }


     /**
      *
      * @param type $object
      */
      public function push( $object ){
          $this->objects[] = $object;
      }

    /**
     *
     * @return type $object
     */
      public function shift(){
          return array_shift($this->objects);
      }

      /**
       *
       */
      public  function removeAll(){
          unset( $this->objects );
          $this->objects = array();
      }

      /**
       *
       * @param type $object
       * @return boolean
       */
      public  function remove( $object ){
          foreach( $this->objects as $k => $v )
          {
              if( $v === $object )
              {
                  unset( $this->objects[$v] );
                  return true;
              }
          }

          return false;
      }

      /**
       *
       * @param type $int
       * @return type
       */
      public  function index( $int ){
          for( $x = 0; $x < count( $this->objects ); $x += 1 )
          {
              if( $int == $x )
              {
                  return $this->objects[ $x ];
              }
          }

          return null;
      }

      public function count(){
          return count( $this->objects );
      }

}