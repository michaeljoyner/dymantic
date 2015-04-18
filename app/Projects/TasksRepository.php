<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/14/2015
 * Time: 1:56 PM
 */

namespace Dymantic\Projects;


class TasksRepository {

    /**
     * @var Task
     */
    private $model;

    public function __construct(Task $model)
    {

        $this->model = $model;
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

}