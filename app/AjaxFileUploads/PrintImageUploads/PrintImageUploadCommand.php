<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 10:06 AM
 */

namespace Dymantic\AjaxFileUploads\PrintImageUploads;


class PrintImageUploadCommand {

    public $upload;

    function __construct($upload)
    {
        $this->upload = $upload;
    }


}