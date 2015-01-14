<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/2014
 * Time: 11:47 AM
 */

namespace Dymantic\Briefs\Logo;


class LogosUploadedCommand {

    public $logobrief_id;
    public $filenames = [];

    function __construct($logobrief_id, $filenames)
    {
        $this->logobrief_id = $logobrief_id;
        $this->filenames = $filenames;
    }

}