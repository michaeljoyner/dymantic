<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 11:39 AM
 */

namespace Dymantic\QuoteRequests;


class QuoteRequestCommand {

    public $name;
    public $email;
    public $company;
    public $country;
    public $phone;
    public $budget;
    public $project;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->company = $data['company'];
        $this->country = $data['country'];
        $this->phone = $data['phone'];
        $this->budget = $data['budget'];
        $this->project = $data['project'];
    }
}