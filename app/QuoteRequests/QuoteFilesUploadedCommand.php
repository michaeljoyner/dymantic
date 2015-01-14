<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 12:46 PM
 */

namespace Dymantic\QuoteRequests;


class QuoteFilesUploadedCommand {

    public $quoterequest_id;
    public $uploaded_files;

    function __construct($quoterequest_id, array $uploaded_files)
    {
        $this->quoterequest_id = $quoterequest_id;
        $this->uploaded_files = $uploaded_files;
    }

}