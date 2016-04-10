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



class VISPERApplication
{

        /**
         *
         * @var ICommandHandlerManager
         */
        private $commandHandlerManager = null;


        public function __construct(   )
        {

        }







}





namespace VISPER;

/**
 *
 * @author david
 */
interface ICommand
{
    //put your code here
}


namespace VISPER;

/**
 *
 * @author david
 */
interface ICommandHandler
{
    /**
     *
     * @param \VISPER\ICommand $command
     * @return Bool
     */
   function isResponsible( \VISPER\ICommand $command );


   function process( \VISPER\ICommand $command , \VISPER\IVISPERCallback $callback  );


}


namespace VISPER;

/**
 *
 * @author david
 */
interface ICommandHandlerManager
{
    function addCommandHandler( ICommandHandler $commandHandler  );
    function getResponsibleHandlerForCommand( ICommand $command );
}


abstract class  AbstractCommandHandlerManager implements ICommandHandlerManager
{

    /**
     *
     * @var CommandHandlers
     */
    private $commandHandlersList = null;

    public function __construct(  )
    {
            $this->commandHandlersList = new CommandHandlers();
    }

    public function addCommandHandler( ICommandHandler $commandHandler)
    {
        $this->commandHandlersList->add($commandHandler);
    }

    /**
     *
     * @param \VISPER\ICommand $command
     * @return  \VISPER\ICommandHandler
     */
    public function getResponsibleHandlerForCommand( ICommand $command ){

            for( $x = 0; $x < $this->commandHandlersList->count(); $x += 1 )
            {
                $handler = $this->commandHandlersList->index($x);
                if( $handler->isResponsible( $command ) ){
                    return $handler;
                }
            }

            return null;
    }


}


class CommandHandlerManager extends AbstractCommandHandlerManager{

    public function __construct()
    {
        parent::__construct();
    }

}




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
interface ICommandHandlers
{
    
    public function addHandler( ICommandHandler $handler );
    public function removeHandler( ICommandHandler $handler );

}


abstract class AbstractCommandHandlers implements ICommandHandlerList
{
    /**
     *
     * @var ICommandHandlerList
     */
    private $handlers = null;

    /**
     * 
     */
    public function __construct()
    {
        $this->handlers = new CommandHandlerList();
    }

    /**
     *
     * @param \VISPER\ICommandHandler $handler
     */
    public function add( ICommandHandler $handler )
    {
        $this->handlers->add($handler);
    }

    /**
     *
     * @param type $int
     * @return \VISPER\ICommandHandler $handler
     */
    public function index($int)
    {
        return $this->handlers->index($int);
    }

    /**
     * 
     * @return \VISPER\ICommandHandler $handler
     */
    public function pop()
    {
        return $this->handlers->pop();
    }

    /**
     *
     * @param \VISPER\ICommandHandler $handler
     * @return void
     */
    public function push( ICommandHandler $handler)
    {
        $this->handlers->push($handler);
    }

    /**
     *
     * @param \VISPER\ICommandHandler $handler
     * @return Bool
     */
    public function remove(ICommandHandler $handler)
    {
       return  $this->handlers->remove($handler);
    }

    /**
     *
     */
    public function removeAll()
    {
        $this->handlers->removeAll();
    }

    /**
     *@return \VISPER\ICommandHandler $handler
     */
    public function shift()
    {
       return  $this->handlers->shift();
    }

    public function count(){
        return $this->handlers->count();
    }
}

class CommandHandlers extends  AbstractCommandHandlers
{
    
}

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





namespace VISPER;


/**
 *
 * @author david
 */
interface IVISPERApplication
{

    

}



namespace VISPER;

/**
 *
 * @author david
 */
interface IVISPERCallback
{
    //put your code here

    /**
     *
     * @param \VISPER\IVISPERResult $result
     * @param \VISPER\IVISPERError $error
     * @return void
     */
    function execute( \VISPER\IVISPERResult $result , \VISPER\IVISPERError $error  );

}


namespace VISPER;
/**
 *
 * @author david
 */
interface IVISPERError
{
   
}


class VISPERError implements  IVISPERError
{
    public $message = null;
}


namespace VISPER;


/**
 *
 * @author david
 */
interface IVISPERFeature
{
    /**
     * 
     * @param \VISPER\IRoutePattern $pattern
     * @param \VISPER\IRouteParameters $parameters
     * @return \VISPER\IVISPERView
     */
    function controllerForRoute( IRoutePattern $pattern , IRouteParameters $parameters  );
}





namespace VISPER;

/**
 *
 * @author david
 */
interface IVISPERResult
{
    
}

class VISPERResult implements IVISPERResult
{

    public $content = null;

}

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
interface IVISPERView
{

    public function render();

}


namespace VISPER;

/**
 *
 * @author david
 */
interface iCommandBus
{

     function process( \VISPER\ICommand $command , \VISPER\IVISPERCallback $callback  );
     function addCommandHandler( ICommandHandler $handler );
}



abstract class AbstractCommandBus implements \VISPER\iCommandBus{

    /**
     *
     * @var ICommandHandlerManager
     */
    public $commandHandlerManager = null;

    public function __construct( ICommandHandlerManager $manager  )
    {
        $this->commandHandlerManager = $manager;
    }

    abstract  public function process(ICommand $command, IVISPERCallback $callback);
    abstract public  function addCommandHandler( ICommandHandler $handler );
}


class CommandBus extends \VISPER\AbstractCommandBus
{

    public function __construct(ICommandHandlerManager $manager)
    {
        parent::__construct($manager);
    }



    public function process(ICommand $command, IVISPERCallback $callback)
    {
       $handler =  $this->commandHandlerManager->getResponsibleHandlerForCommand($command);
       $handler->process( $command  , $callback );
    }


    public function addCommandHandler(ICommandHandler $handler)
    {
        $this->commandHandlerManager->addCommandHandler($handler);
    }
}



namespace VISPER;

class HomePattern extends \VISPER\RoutePattern{
    public function __construct( $pattern )
    {
        $this->setPattern($pattern);
    }
}

class TestPattern extends \VISPER\RoutePattern{
    public function __construct( $pattern )
    {
        $this->setPattern($pattern);
    }
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VISPER;

/**
 * Description of HomeCallBack
 *
 * @author david
 */
class HomeCallBack implements IVISPERCallback
{
    public function execute(IVISPERResult $result, IVISPERError $error)
    {
         echo "we did something in the callback";
    }

    
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VISPER;

/**
 * Description of HomeCommand
 *
 * @author david
 */
class HomeCommand  implements ICommand
{
    //put your code here
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VISPER;

/**
 * Description of HomeCommandHandler
 *
 * @author david
 */
class HomeCommandHandler implements ICommandHandler
{
    /**
     *
     * @var ICommand
     */
    private  $command = null;

    public function __construct( \VISPER\ICommand $command )
    {
        $this->command = $command;
    }

    /**
     *
     * @param \VISPER\ICommand $command
     * @return boolean
     */
    public function isResponsible(ICommand $command)
    {
            if( $this->command === $command )
            {
                echo "we are responsible";
                return true;
            }

            return false;
    }

    public function process(ICommand $command, IVISPERCallback $callback)
    {
         echo "we now came here";

         $result = new VISPERResult();
         $result->content = "All good";

         $error = new VISPERError();
         $error->message = null;


         $callback->execute($result, $error);
    }
//put your code here
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace VISPER;

/**
 * Description of HomeDelegate
 *
 * @author david
 */
class HomeDelegate
{

    private $commandBus = null;

    private $command = null;

    private $callback = null;

    public function __construct(iCommandBus $commandBus , \VISPER\ICommand $command , IVISPERCallback $callback )
    {
        $this->commandBus = $commandBus;
        $this->command = $command;
        $this->callback = $callback;
   
    }

    public function doSomeAction(){

        $this->commandBus->process($this->command, $this->callback);
    }

}



namespace VISPER;

/**
 * Description of HomeFeature
 *
 * @author david
 */
class HomeFeature implements \VISPER\IVISPERFeature{

    /**
     *
     * @var \VISPER\IRoutePattern
     */
    private $pattern = null;

    public function __construct( \VISPER\IRoutePattern $pattern )
    {
            $this->pattern = $pattern;
    }


    /**
     *
     * @param \VISPER\IRoutePattern $pattern
     * @param \VISPER\IRouteParameters $parameters
     * @return \IVISPER\iVISPERView
     */
    public function controllerForRoute(\VISPER\IRoutePattern $pattern,  \VISPER\IRouteParameters $parameters)
    {
        ;
        if( $pattern === $this->pattern )
        {
            echo "we need to do something";
        }

    }

}
