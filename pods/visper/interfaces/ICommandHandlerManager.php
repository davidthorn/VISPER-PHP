<?php

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


