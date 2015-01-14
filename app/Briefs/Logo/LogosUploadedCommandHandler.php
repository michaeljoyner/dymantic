<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/2014
 * Time: 11:49 AM
 */

namespace Dymantic\Briefs\Logo;


use Dymantic\Commanding\CommandHandler;

class LogosUploadedCommandHandler implements CommandHandler {

    /**
     * @var LogoFilesRepo
     */
    private $repo;

    public function __construct(LogoFilesRepo $repo)
    {

        $this->repo = $repo;
    }
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $this->repo->storeFilenames($command);
    }
}