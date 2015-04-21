<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/21/2015
 * Time: 9:27 AM
 */

namespace Dymantic\Projects;


use Dymantic\Commanding\CommandHandler;

class CreateTaskCommandHandler implements CommandHandler {

    /**
     * @var TasksRepository
     */
    private $repository;

    public function __construct(TasksRepository $repository)
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