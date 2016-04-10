<?php

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

