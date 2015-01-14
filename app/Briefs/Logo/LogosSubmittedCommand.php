<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/2014
 * Time: 12:06 PM
 */

namespace Dymantic\Briefs\Logo;


class LogosSubmittedCommand {

    public $logobrief_id;
    public $uploads = [];

    function __construct($logobrief_id, $uploads)
    {
        $this->logobrief_id = $logobrief_id;
        $this->uploads = $uploads;
    }

}