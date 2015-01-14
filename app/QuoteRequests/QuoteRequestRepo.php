<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 11:37 AM
 */

namespace Dymantic\QuoteRequests;


class QuoteRequestRepo {

    protected $model;

    function __construct(QuoteRequest $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        $quoteRequest = $this->model->create([
            'name' => $data->name,
            'email' => $data->email,
            'company' => $data->company,
            'country' => $data->country,
            'phone' => $data->phone,
            'budget' => $data->budget,
            'project' => $data->project
        ]);

        $quoteRequest->raise(new QuoteWasRequested($quoteRequest));

        return $quoteRequest;
    }

}