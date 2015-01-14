<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 11:44 AM
 */

namespace Dymantic\QuoteRequests;


use Dymantic\Commanding\CommandHandler;

class QuoteRequestCommandHandler implements CommandHandler {

    protected $repo;

    function __construct(QuoteRequestRepo $repo)
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