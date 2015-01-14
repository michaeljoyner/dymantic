<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/8/2015
 * Time: 10:01 AM
 */

namespace Dymantic\ContactMessages;


class ContactMessageCommand {

    public $name;
    public $email;
    public $message;

    function __construct($name, $email, $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

}