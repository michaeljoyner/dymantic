<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/27/2014
 * Time: 10:36 AM
 */

namespace Dymantic\Briefs\Site;


class SiteBriefRepo {

    /**
     * @var SiteBrief
     */
    private $model;

    public function __construct(SiteBrief $model)
    {
        $this->model = $model;
    }
    public function store(SiteBriefSubmittedCommand $command)
    {
        $siteBrief = $this->model->create([
            'generalbrief_id' => $command->generalbrief_id,
            'hasdomain' => $command->hasdomain,
            'domain_name' => $command->domain_name,
            'hosting' => $command->hosting,
            'hosting_details' => $command->hosting_details,
            'sitetype' => $command->sitetype,
            'sitetype_details' => $command->sitetype_details,
            'content_management' => $command->content_management,
            'cm_details' => $command->cm_details,
            'socialmedia' => $command->socialmedia,
            'site_requirements' => $command->site_requirements,
            'site_direction' => $command->site_direction,
            'sitetarget' => $command->site_target
        ]);

        return $siteBrief;
    }
}