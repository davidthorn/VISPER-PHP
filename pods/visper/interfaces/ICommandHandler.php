<?php

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