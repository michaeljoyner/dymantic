<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 10:11 AM
 */

namespace Dymantic\AjaxFileUploads\PrintDocUploads;


class PrintDocUploadCommand {

    public $upload;

    function __construct($upload)
    {
        $this->upload = $upload;
    }

}