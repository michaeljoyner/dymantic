<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/2014
 * Time: 9:59 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


class PrintImagesUploadedCommand {

    public $printbrief_id;
    public $filenames = [];

    function __construct($printbrief_id, $filenames)
    {
        $this->printbrief_id = $printbrief_id;
        $this->filenames = $filenames;
    }

}