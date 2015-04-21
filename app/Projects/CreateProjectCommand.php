<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/20/2015
 * Time: 12:43 PM
 */

namespace Dymantic\Projects;


class CreateProjectCommand {

    public $client_id;
    public $name;
    public $description;

    public function __construct($client_id, array $data)
    {
        $this->client_id = $client_id;
        $this->name = $data['name'];
        $this->description = $data['description'];
    }

}