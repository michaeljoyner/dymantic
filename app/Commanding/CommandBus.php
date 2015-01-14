<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/10/2014
 * Time: 11:22 AM
 */

namespace Dymantic\Commanding;


use Illuminate\Foundation\Application;

class CommandBus {

    /**
     * @var CommandTranslator
     */
    private $commandTranslator;
    /**
     * @var Application
     */
    private $app;

    public function __construct(Application $app, CommandTranslator $commandTranslator)
    {

        $this->commandTranslator = $commandTranslator;
        $this->app = $app;
    }
    public function execute($command)
    {
        $handler = $this->commandTranslator->toCommandHandler($command);

        return $this->app->make($handler)->handle($command);
    }
}