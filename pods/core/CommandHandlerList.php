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
interface ICommandHandlerList
{
     function add(ICommandHandler $object );
     function pop( );
     function push( ICommandHandler $object );
     function shift();
     function removeAll();
     function remove( ICommandHandler $object );
     function index( $int );
     function count();
}

class CommandHandlerList implements ICommandHandlerList{


    private $objects = array();

    /**
     *
     * @param ICommandHandler $object
     */
    public function add( ICommandHandler $object ){
        $this->objects[] = $object;
    }

    /**
     *
     * @return ICommandHandler
     */
     public function pop( ){
         return array_pop($this->objects);
     }


     /**
      *
      * @param ICommandHandler $object
      */
      public function push( ICommandHandler $object ){
          $this->objects[] = $object;
      }

    /**
     *
     * @return ICommandHandler $object
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
      public  function remove( ICommandHandler $object ){
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
       * @return ICommandHandler
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