<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 1:46 PM
 */

namespace Dymantic\QuoteRequests;


class QuoteFilesSubmittedCommand {

    public $quoterequest_id;
    public $files = [];

    function __construct($quoterequest_id, $files)
    {
        $this->files = $files;
        $this->quoterequest_id = $quoterequest_id;
    }

}