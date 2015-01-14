<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:00 AM
 */

namespace Dymantic\Briefs\Site;


use Dymantic\Commanding\CommandHandler;

class SiteBriefSubmittedCommandHandler implements CommandHandler {

    /**
     * @var SiteBriefRepo
     */
    private $repo;

    public function __construct(SiteBriefRepo $repo)
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