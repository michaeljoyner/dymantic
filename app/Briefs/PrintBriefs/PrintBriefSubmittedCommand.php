<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:01 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


class PrintBriefSubmittedCommand {

    public $generalbrief_id;
    public $printdesc;
    public $printuse;
    public $printspecifics;
    public $printdirection;
    public $printtext;
    public $printrestrictions;
    public $printcolour;
    public $printprint;
    public $printrequirements;

    public function __construct($brief_id, $data)
    {
        $this->generalbrief_id = $brief_id;
        $this->printdesc = $data['printdesc'];
        $this->printuse = $data['printuse'];
        $this->printspecifics = $data['printspecifics'];
        $this->printdirection = $data['printdirection'];
        $this->printtext = $data['printtext'];
        $this->printrestrictions = $data['printrestrictions'];
        $this->printcolour = $data['printcolour'];
        $this->printprint = $data['printprint'];
        $this->printrequirements = $data['printrequirements'];
    }
}