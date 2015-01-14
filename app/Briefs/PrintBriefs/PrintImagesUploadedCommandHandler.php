<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/2014
 * Time: 10:00 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


use Dymantic\Commanding\CommandHandler;

class PrintImagesUploadedCommandHandler implements CommandHandler {

    /**
     * @var PrintImageRepo
     */
    private $repo;

    public function __construct(PrintImageRepo $repo)
    {

        $this->repo = $repo;
    }
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->repo->storeFileNames($command);
    }
}