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
        return $this->model->with('projects')->latest()->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function findById($id)
    {
        return $this->model->with('projects')->findOrFail($id);
    }

    public function findBySlug($slug)
    {
        return $this->model->with('projects')->where('slug', $slug)->first();
    }
}
