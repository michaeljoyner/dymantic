<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/21/2015
 * Time: 9:32 AM
 */

namespace Dymantic\Projects;


use Dymantic\Commanding\CommandHandler;

class CreateProjectCommandHandler implements CommandHandler {

    /**
     * @var ProjectRepository
     */
    private $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->repository->store((array)$command);
    }
}