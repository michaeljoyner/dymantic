<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/27/2014
 * Time: 10:35 AM
 */

namespace Dymantic\Briefs\General;


class GeneralBriefRepo {

    /**
     * @var GeneralBrief
     */
    private $model;

    public function __construct(GeneralBrief $model)
    {
        $this->model = $model;
    }
    public function store($command)
    {
        $generalBrief = $this->model->create([
            'contact_person' => $command->contact_person,
            'email' => $command->email,
            'company' => $command->company,
            'industry' => $command->industry,
            'since' => $command->since,
            'current_website' => $command->current_website,
            'background' => $command->background,
            'reaction' => $command->reaction,
            'nutshell' => $command->nutshell
        ]);

        $generalBrief->raise(new GeneralBriefWasSubmitted($generalBrief));

        return $generalBrief;
    }

    public function all()
    {
        return $this->model->with('printBriefs', 'logoBriefs', 'siteBriefs')->latest()->get();
    }

    public function findById($id)
    {
        return $this->model->with('printBriefs', 'logoBriefs', 'siteBriefs')->findOrFail($id);
    }
}