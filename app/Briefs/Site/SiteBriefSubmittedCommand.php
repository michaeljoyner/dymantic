<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:00 AM
 */

namespace Dymantic\Briefs\Site;


class SiteBriefSubmittedCommand {

    public $generalbrief_id;
    public $hasdomain;
    public $domain_name;
    public $hosting;
    public $hosting_details;
    public $sitetype;
    public $sitetype_details;
    public $content_management;
    public $cm_details;
    public $socialmedia;
    public $site_requirements;
    public $site_direction;
    public $site_target;

    public function __construct($brief_id, $data)
    {
        $this->generalbrief_id = $brief_id;
        $this->hasdomain = $data['hasdomain'];
        $this->domain_name = $data['domain'];
        $this->hosting = $data['hosting'];
        $this->hosting_details = $data['hosting_details'];
        $this->sitetype = $data['sitetype'];
        $this->sitetype_details = $data['sitetype_details'];
        $this->content_management = $data['content_management'];
        $this->cm_details = $data['cm_details'];
        $this->socialmedia = $data['socialmedia'];
        $this->site_requirements = $data['site_requirements'];
        $this->site_direction = $data['site_direction'];
        $this->site_target = $data['site_target'];
    }
}