<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:02 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


use Dymantic\Commanding\CommandHandler;

class PrintBriefSubmittedCommandHandler implements CommandHandler {

    /**
     * @var PrintBriefRepo
     */
    private $repo;

    public function __construct(PrintBriefRepo $repo)
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