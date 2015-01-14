<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 12:50 PM
 */

namespace Dymantic\QuoteRequests;


use Dymantic\Commanding\CommandHandler;

class QuoteFilesUploadedCommandHandler implements CommandHandler {

    protected $repo;

    function __construct(QuoteFilesRepo $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $this->repo->storeFiles($command);
    }
}