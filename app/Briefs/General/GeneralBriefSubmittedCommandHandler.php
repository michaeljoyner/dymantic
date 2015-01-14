<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 9:54 AM
 */

namespace Dymantic\Briefs\General;


use Dymantic\Commanding\CommandHandler;

class GeneralBriefSubmittedCommandHandler implements CommandHandler {

    /**
     * @var GeneralBriefRepo
     */
    private $repo;

    public function __construct(GeneralBriefRepo $repo)
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