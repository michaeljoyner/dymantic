<?php

namespace Dymantic\Clients;

class ClientRepository
{

    /**
     * @var Client
     */
    private $model;

    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with('projects.tasks')->latest()->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($slug, $data){
        $model = $this->model->where('slug', $slug)->first();
        $model->fill($data);
        return $model->save();
    }

    public function findById($id)
    {
        return $this->model->with('projects.tasks')->findOrFail($id);
    }

    public function findBySlug($slug)
    {
        return $this->model->with('projects.tasks')->where('slug', $slug)->first();
    }

    public function deleteById($id)
    {
        $model =  $this->model->findOrFail($id);
        return $model->delete();
    }
}
