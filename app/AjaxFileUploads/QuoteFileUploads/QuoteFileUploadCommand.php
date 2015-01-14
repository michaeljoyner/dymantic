<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/22/2014
 * Time: 10:11 AM
 */

namespace Dymantic\AjaxFileUploads\QuoteFileUploads;


class QuoteFileUploadCommand {

    public $upload;

    function __construct($upload)
    {
        $this->upload = $upload;
    }
}