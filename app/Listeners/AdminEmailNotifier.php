<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/6/2015
 * Time: 10:57 AM
 */

namespace Dymantic\Listeners;


use Dymantic\Eventing\EventListener;
use Dymantic\Mailers\AdminMailer;

class AdminEmailNotifier extends EventListener {

    /**
     * @var AdminMailer
     */
    private $mailer;

    public function __construct(AdminMailer $mailer)
    {

        $this->mailer = $mailer;
    }

    public function whenQuoteWasRequested($event)
    {
        $this->mailer->sendNewQuoteNotification($event->quoterequest);
    }

    public function whenGeneralBriefWasSubmitted($event)
    {
        $generalBrief = $event->generalbrief;
        $logoBrief = $generalBrief->logoBriefs()->first();
        $printBrief = $generalBrief->printBriefs()->first();
        $siteBrief = $generalBrief->siteBriefs()->first();
        if($logoBrief)
        {
            $this->mailer->sendLogoBriefNotification($logoBrief, $generalBrief);
        }

        if($printBrief)
        {
            $this->mailer->sendPrintBriefNotification($printBrief, $generalBrief);
        }

        if($siteBrief)
        {
            $this->mailer->sendSiteBriefNotification($siteBrief, $generalBrief);
        }
    }
}