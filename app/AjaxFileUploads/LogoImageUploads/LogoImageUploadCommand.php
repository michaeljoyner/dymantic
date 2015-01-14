<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 9:45 AM
 */

namespace Dymantic\AjaxFileUploads\LogoImageUploads;


class LogoImageUploadCommand {

    public $upload;

    function __construct($upload)
    {
        $this->upload = $upload;
    }

}