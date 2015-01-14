<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 9:56 AM
 */

namespace Dymantic\Briefs\Logo;


use Dymantic\Commanding\CommandHandler;

class LogoBriefSubmittedCommandHandler implements CommandHandler {

    /**
     * @var LogoBriefRepo
     */
    private $repo;

    public function __construct(LogoBriefRepo $repo)
    {

        $this->repo = $repo;
    }

    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->repo->store($command);
    }
}