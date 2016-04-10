<?php

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