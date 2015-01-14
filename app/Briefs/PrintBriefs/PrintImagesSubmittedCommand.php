<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/2014
 * Time: 10:03 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


class PrintImagesSubmittedCommand {

    public $printbrief_id;
    public $images = [];

    function __construct($printbrief_id, $images)
    {
        $this->printbrief_id = $printbrief_id;
        $this->images = $images;
    }


}