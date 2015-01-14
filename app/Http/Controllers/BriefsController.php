<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 9:50 AM
 */

namespace Dymantic\Http\Controllers;


use Dymantic\Briefs\General\GeneralBriefSubmittedCommand;
use Dymantic\Briefs\Logo\LogoBriefSubmittedCommand;
use Dymantic\Briefs\Logo\LogosSubmittedCommand;
use Dymantic\Briefs\Logo\LogosUploadedCommand;
use Dymantic\Briefs\PrintBriefs\PrintBriefSubmittedCommand;
use Dymantic\Briefs\PrintBriefs\PrintDocsSubmittedCommand;
use Dymantic\Briefs\PrintBriefs\PrintDocsUploadedCommand;
use Dymantic\Briefs\PrintBriefs\PrintImagesSubmittedCommand;
use Dymantic\Briefs\PrintBriefs\PrintImagesUploadedCommand;
use Dymantic\Briefs\Site\SiteBriefSubmittedCommand;
use Dymantic\Commanding\CommandBus;
use Dymantic\Eventing\EventDispatcher;
use Dymantic\FileValidators\DocFileValidator;
use Dymantic\FileValidators\ImageFileValidator;
use Dymantic\Http\Requests\Briefs\BriefFormRequest;

class BriefsController extends Controller {

    protected $commandBus;
    /**
     * @var EventDispatcher
     */
    private $dispatcher;
    /**
     * @var ImageFileValidator
     */
    private $imageFileValidator;
    /**
     * @var DocFileValidator
     */
    private $docFileValidator;

    function __construct(CommandBus $commandBus, EventDispatcher $dispatcher, ImageFileValidator $imageFileValidator, DocFileValidator $docFileValidator)
    {
        $this->commandBus = $commandBus;
        $this->dispatcher = $dispatcher;
        $this->imageFileValidator = $imageFileValidator;
        $this->docFileValidator = $docFileValidator;
    }

    /**
     * @POST("brief")
     * @param BriefFormRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function storeBrief(BriefFormRequest $request)
    {
        if(! $this->imageFileValidator->validate($request->file('logo')))
        {
            return redirect('/getstarted')->withInput()->with('uploadErrors', $this->imageFileValidator->getMessages());
        }

        if(! $this->imageFileValidator->validate($request->file('printimages')))
        {
            return redirect('/getstarted')->withInput()->with('uploadErrors', $this->imageFileValidator->getMessages());
        }

        if(! $this->docFileValidator->validate($request->file('printdocs')))
        {
            return redirect('/getstarted')->withInput()->with('uploadErrors', $this->docFileValidator->getMessages());
        }

        $generalBriefCommand = new GeneralBriefSubmittedCommand($request->only($request->getGeneralFields()));
        $generalBrief = $this->commandBus->execute($generalBriefCommand);

        $this->controlLogoBriefRequest($generalBrief->id, $request);
        $this->controlSiteBriefRequest($generalBrief->id, $request);
        $this->controlPrintBriefRequest($generalBrief->id, $request);

        $this->dispatcher->dispatch($generalBrief->releaseEvents());

        return redirect('/thanks')->with('thanks_note', 'Thank You, '.$generalBrief->contact_person.'! We will get back to you as soon as possible.');
    }

    private function hasLogoBrief($brief_type)
    {
        return in_array(intval($brief_type), [1, 3, 5, 7], true);
    }

    private function hasSiteBrief($brief_type)
    {
        return in_array(intval($brief_type), [2, 3, 6, 7], true);
    }

    private function hasPrintBrief($brief_type)
    {
        return in_array(intval($brief_type), [4, 5, 6, 7], true);
    }

    private function controlLogoBriefRequest($generalbrief_id, $request)
    {
        $logoBrief = NULL;
        if($this->hasLogoBrief($request->get('brief_type')))
        {
            $logoBriefCommand = new LogoBriefSubmittedCommand($generalbrief_id, $request->only($request->getLogoFields()));
            $logoBrief = $this->commandBus->execute($logoBriefCommand);
        }

        if($request->has('uploadedlogos') && $logoBrief)
        {
            $uploadedLogosCommand = new LogosUploadedCommand($logoBrief->id, $request->get('uploadedlogos'));
            $this->commandBus->execute($uploadedLogosCommand);
        }

        if($request->hasFile('logo') && $logoBrief)
        {
            $files = $request->file('logo');
            $logsSubmittedCommand = new LogosSubmittedCommand($logoBrief->id, $files);
            $this->commandBus->execute($logsSubmittedCommand);
        }

        return $logoBrief;
    }

    private function controlSiteBriefRequest($generalbrief_id, $request)
    {
        $siteBrief = NULL;
        if($this->hasSiteBrief($request->get('brief_type')))
        {
            $siteBriefCommand = new SiteBriefSubmittedCommand($generalbrief_id, $request->only($request->getSiteFields()));
            $siteBrief = $this->commandBus->execute($siteBriefCommand);
        }

        return $siteBrief;
    }

    private function controlPrintBriefRequest($generalbrief_id, $request)
    {
        $printBrief = NULL;

        if($this->hasPrintBrief($request->get('brief_type')))
        {
            $printBriefCommand = new PrintBriefSubmittedCommand($generalbrief_id, $request->only($request->getPrintFields()));
            $printBrief = $this->commandBus->execute($printBriefCommand);
        }

        if($request->has('printimageuploads') && $printBrief)
        {
            $printImageUploadedCommand = new PrintImagesUploadedCommand($printBrief->id, $request->get('printimageuploads'));
            $this->commandBus->execute($printImageUploadedCommand);
        }

        if($request->hasFile('printimages') && $printBrief)
        {
            $printImageSubmittedCommand = new PrintImagesSubmittedCommand($printBrief->id, $request->file('printimages'));
            $this->commandBus->execute($printImageSubmittedCommand);
        }

        if($request->has('printdocuploads') && $printBrief)
        {
            $printDocUploadCommand = new PrintDocsUploadedCommand($printBrief->id, $request->get('printdocuploads'));
            $this->commandBus->execute($printDocUploadCommand);
        }

        if($request->hasFile('printdocs') && $printBrief)
        {
            $printDocSubmittedCommand = new PrintDocsSubmittedCommand($printBrief->id, $request->file('printdocs'));
            $this->commandBus->execute($printDocSubmittedCommand);
        }

        return $printBrief;
    }

}