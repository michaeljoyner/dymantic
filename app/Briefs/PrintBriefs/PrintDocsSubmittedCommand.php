<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/2014
 * Time: 10:04 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


class PrintDocsSubmittedCommand {

    public $printbrief_id;
    public $documents = [];

    function __construct($printbrief_id, $documents)
    {
        $this->printbrief_id = $printbrief_id;
        $this->documents = $documents;
    }

}