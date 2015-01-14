<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/27/2014
 * Time: 10:35 AM
 */

namespace Dymantic\Briefs\Logo;


class LogoBriefRepo {

    /**
     * @var LogoBrief
     */
    private $model;

    public function __construct(LogoBrief $model)
    {
        $this->model = $model;
    }

    public function store($command)
    {
        $logoBrief = $this->model->create([
            'generalbrief_id' => $command->generalbrief_id,
            'haslogo' => $command->haslogo,
            'logocolours' => $command->logocolours,
            'logodirection' => $command->logodirection,
            'logorestrictions' => $command->logorestrictions,
            'logorequirements' => $command->logorequirements
        ]);

        return $logoBrief;
    }
}