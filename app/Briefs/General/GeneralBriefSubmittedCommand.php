<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 9:53 AM
 */

namespace Dymantic\Briefs\General;


class GeneralBriefSubmittedCommand {

    public $contact_person;
    public $email;
    public $company;
    public $industry;
    public $since;
    public $current_website;
    public $background;
    public $reaction;
    public $nutshell;

    public function __construct($data)
    {
        $this->contact_person = $data['contact_person'];
        $this->email = $data['email'];
        $this->company = $data['company'];
        $this->industry = $data['industry'];
        $this->since = $data['since'];
        $this->current_website = $data['current_website'];
        $this->background = $data['background'];
        $this->reaction = $data['reaction'];
        $this->nutshell = $data['nutshell'];
    }
}