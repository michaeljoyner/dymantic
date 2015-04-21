<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/20/2015
 * Time: 12:37 PM
 */

namespace Dymantic\Clients;


class CreateClientCommand {

    public $name;
    public $contact_person;
    public $contact_email;
    public $industry;
    public $website;
    public $image_path;
    public $operating_since;
    public $description;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->operating_since = $data['operating_since'];
        $this->contact_person = $data['contact_person'];
        $this->contact_email = $data['contact_email'];
        $this->industry = $data['industry'];
        $this->website = $data['website'];
        $this->image_path = $data['image_path'];
        $this->description = $data['description'];
    }
}