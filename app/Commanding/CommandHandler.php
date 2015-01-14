<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/10/2014
 * Time: 11:36 AM
 */

namespace Dymantic\Commanding;


interface CommandHandler {

    /**
     * @param $command
     * @return mixed
     */
    public function handle($command);
}