<?php
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