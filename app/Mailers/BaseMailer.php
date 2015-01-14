<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/6/2015
 * Time: 10:26 AM
 */

namespace Dymantic\Mailers;


use Illuminate\Mail\Mailer;

abstract class BaseMailer {

    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {

        $this->mailer = $mailer;
    }
    public function sendTo($to, $from, $subject, $view, $data, $attachments = [])
    {
        $this->mailer->queue($view, $data, function($message) use ($to, $from, $subject, $attachments)
        {
           $message->to($to)->subject($subject);
            foreach($attachments as $filename)
            {
                $message->attach($filename);
            }
            if($from !== '')
            {
                $message->from($from);
            }
        });
    }
}