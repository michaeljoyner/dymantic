<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 9:55 AM
 */

namespace Dymantic\Briefs\Logo;


class LogoBriefSubmittedCommand {

    public $generalbrief_id;
    public $haslogo;
    public $logocolours;
    public $logodirection;
    public $logorestrictions;
    public $logorequirements;

    public function __construct($brief_id, $data)
    {
        $this->generalbrief_id = $brief_id;
        $this->haslogo = $data['haslogo'];
        $this->logocolours = $data['logocolours'];
        $this->logodirection = $data['logodirection'];
        $this->logorestrictions = $data['logorestrictions'];
        $this->logorequirements = $data['logorequirements'];
    }
}