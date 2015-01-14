<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/8/2015
 * Time: 10:09 AM
 */

namespace Dymantic\ContactMessages;


use Dymantic\Commanding\CommandHandler;
use Dymantic\Mailers\AdminMailer;

class ContactMessageCommandHandler implements CommandHandler {

    /**
     * @var AdminMailer
     */
    private $mailer;

    public function __construct(AdminMailer $mailer)
    {

        $this->mailer = $mailer;
    }
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $this->mailer->sendContactMessage($command);
    }
}