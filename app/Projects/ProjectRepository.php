<?php

namespace Dymantic\Projects;

class ProjectRepository
{

    /**
     * @var Project
     */
    private $model;

    public function __construct(Project $model)
    {

        $this->model = $model;
    }

    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function deleteById($id)
    {
        $project = $this->model->findOrFail($id);
        return $project->delete();
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $project = $this->model->findOrFail($id);
        $project->fill($data);
        return $project->save();
    }
}
