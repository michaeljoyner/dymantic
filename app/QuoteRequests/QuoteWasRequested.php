<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/24/2014
 * Time: 10:58 AM
 */

namespace Dymantic\QuoteRequests;


class QuoteWasRequested {

    public $quoterequest;

    /**
     * @param QuoteRequest $quoterequest
     */
    function __construct(QuoteRequest $quoterequest)
    {
        $this->quoterequest = $quoterequest;
    }

}