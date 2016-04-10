<?php


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