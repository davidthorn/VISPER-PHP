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