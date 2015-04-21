<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/20/2015
 * Time: 12:45 PM
 */

namespace Dymantic\Projects;


class CreateTaskCommand {

    public $project_id;
    public $name;
    public $brief;
    public $notes;
    public $deadline;
    public $status;

    public function __construct($project_id, array $data)
    {
        $this->project_id = $project_id;
        $this->name = $data['name'];
        $this->brief = $data['brief'];
        $this->notes = $data['notes'];
        $this->deadline = $data['deadline'];
        $this->status = $data['status'];
    }

}