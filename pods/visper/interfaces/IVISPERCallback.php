<?php


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