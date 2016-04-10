<?php


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