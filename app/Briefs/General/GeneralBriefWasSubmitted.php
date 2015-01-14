<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/2014
 * Time: 11:56 AM
 */

namespace Dymantic\Briefs\General;


class GeneralBriefWasSubmitted {

    public $generalbrief;

    function __construct(GeneralBrief $generalbrief)
    {
        $this->generalbrief = $generalbrief;
    }

}