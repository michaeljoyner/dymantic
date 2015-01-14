<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/27/2014
 * Time: 10:36 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


class PrintBriefRepo {

    /**
     * @var PrintBrief
     */
    private $model;

    public function __construct(PrintBrief $model)
    {
        $this->model = $model;
    }

    public function store(PrintBriefSubmittedCommand $command)
    {
        $printBrief = $this->model->create([
            'generalbrief_id' => $command->generalbrief_id,
            'printdesc' => $command->printdesc,
            'printuse' => $command->printuse,
            'printspecifics' => $command->printspecifics,
            'printdirection' => $command->printdirection,
            'printtext' => $command->printtext,
            'printrestrictions' => $command->printrestrictions,
            'printcolour' => $command->printcolour,
            'printprint' => $command->printprint,
            'printrequirements' => $command->printrequirements
        ]);

        return $printBrief;
    }
}