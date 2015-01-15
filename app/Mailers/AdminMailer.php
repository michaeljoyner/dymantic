<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/6/2015
 * Time: 10:39 AM
 */

namespace Dymantic\Mailers;


class AdminMailer extends BaseMailer {

    protected $to = ['joyner.michael@gmail.com' =>'Michael Joyner', 'maxbizley@gmail.com' => 'Max Bizley'];

    public function sendNewQuoteNotification($quoteRequest)
    {
        $files = $this->getQuoteFiles($quoteRequest);
        $view = 'mail.quotes.quotereceived';
        $subject = 'New Quote Request Submitted';
        $this->sendTo($this->to, $quoteRequest->email, $subject, $view, ['quote' => $quoteRequest], $files);
    }

    public function sendLogoBriefNotification($logoBrief, $generalBrief)
    {
        $subject = 'New Logo Brief';
        $view = 'mail.briefs.admin.logo';
        $files = $this->getLogoFiles($logoBrief);
        $this->sendTo($this->to, $generalBrief->email, $subject, $view, compact('logoBrief', 'generalBrief', 'files'), $files);
    }

    public function sendPrintBriefNotification($printBrief, $generalBrief)
    {
        $subject = 'New Print Brief';
        $view = 'mail.briefs.admin.print';
        $imageFiles = $this->getPrintImageFiles($printBrief);
        $docFiles = $this->getPrintDocFiles($printBrief);
        $this->sendTo($this->to, $generalBrief->email, $subject, $view, compact('printBrief', 'generalBrief', 'imageFiles', 'docFiles'), array_merge($imageFiles, $docFiles));
    }

    public function sendSiteBriefNotification($siteBrief, $generalBrief)
    {
        $subject = 'New Site Brief';
        $view = 'mail.briefs.admin.site';
        $this->sendTo($this->to, $generalBrief->email, $subject, $view, compact('siteBrief', 'generalBrief'));
    }

    public function sendContactMessage($siteMsg)
    {
        $subject = 'Message from Dymantic Site';
        $view = 'mail.contact.sitemessage';
        $this->sendTo($this->to, $siteMsg->email, $subject, $view, compact('siteMsg'));
    }

    /**
     * @param $quoteRequest
     * @return mixed
     */
    private function getQuoteFiles($quoteRequest)
    {
        $files = $quoteRequest->quoteFiles()->get()->map(function ($file)
        {
            return public_path() . '/' . $file->filename;
        })->toArray();
        return $files;
    }

    private function getLogoFiles($logoBrief)
    {
        $files = $logoBrief->logoFiles()->get()->map(function ($file)
        {
            return public_path() . '/' . $file->imagepath;
        })->toArray();
        return $files;
    }

    private function getPrintImageFiles($printBrief)
    {
        $files = $printBrief->printImages()->get()->map(function ($file)
        {
            return public_path() . '/' . $file->imagepath;
        })->toArray();
        return $files;
    }

    private function getPrintDocFiles($printBrief)
    {
        $files = $printBrief->printDocs()->get()->map(function ($file)
        {
            return public_path() . '/' . $file->documentpath;
        })->toArray();
        return $files;
    }

}