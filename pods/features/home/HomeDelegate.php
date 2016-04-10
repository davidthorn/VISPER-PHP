<?php
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