<?php

namespace VISPER;

require_once "loader.php";

class AppDelegate{

   
    /**
     *
     * @var ICommandBus
     */
    private $commandBus = null;

    public function __construct( ICommandBus $commandBus )
    {
        $this->commandBus = $commandBus;
    }
    
   function bootstrapHomeFeature(){
        $cb = new HomeCallBack();
        $pattern = new HomePattern("Home");
        $testPattern = new TestPattern("Test");

        $cmd = new HomeCommand();
        $cmdHandler = new HomeCommandHandler($cmd);
        $delegate = new HomeDelegate($this->commandBus, $cmd, $cb);

        $this->commandBus->addCommandHandler($cmdHandler);

        $delegate->doSomeAction();
    }
}


$manager = new CommandHandlerManager();
$bus = new CommandBus($manager);
$app = new AppDelegate($bus);

$app->bootstrapHomeFeature();







/*$delegate = new HomeDelegate();

$feature = new HomeFeature($testPattern , );

$feature->controllerForRoute($testPattern,  new RouteParameters( new ArrayList() ) );

 */







