<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 11:47 AM
 */

namespace Dymantic\Http\Controllers;


use Dymantic\Commanding\CommandBus;
use Dymantic\Eventing\EventDispatcher;
use Dymantic\FileValidators\QuoteFileValidator;
use Dymantic\Http\Requests\Quotes\QuoteRequestFormRequest;
use Dymantic\QuoteRequests\QuoteFilesSubmittedCommand;
use Dymantic\QuoteRequests\QuoteFilesUploadedCommand;
use Dymantic\QuoteRequests\QuoteRequestCommand;

class QuotesController extends Controller {

    protected $commandBus;
    /**
     * @var EventDispatcher
     */
    private $dispatcher;
    /**
     * @var QuoteFileValidator
     */
    private $fileValidator;

    function __construct(CommandBus $commandBus, EventDispatcher $dispatcher, QuoteFileValidator $fileValidator)
    {
        $this->commandBus = $commandBus;
        $this->dispatcher = $dispatcher;
        $this->fileValidator = $fileValidator;
    }


    /**
     * @POST("quickquote")
     * @param QuoteRequestFormRequest $request
     * @return $this
     */
    public function storeQuoteRequest(QuoteRequestFormRequest $request)
    {

        if(! $this->fileValidator->validate($request->file('uploads')))
        {
            return redirect('/quote')->withInput()->with('uploadErrors', $this->fileValidator->getMessages());
        }

        $data = $request->all();
        $quoteRequestedCommand = new QuoteRequestCommand($data);
        $quoteRequest = $this->commandBus->execute($quoteRequestedCommand);

        if($request->has('autouploads'))
        {
            $uploadedCommand = new QuoteFilesUploadedCommand($quoteRequest->id, $request->get('autouploads'));
            $this->commandBus->execute($uploadedCommand);

        }

        if($request->hasFile('uploads'))
        {
            $files = $request->file('uploads');
            $submittedCommand = new QuoteFilesSubmittedCommand($quoteRequest->id, $files);
            $this->commandBus->execute($submittedCommand);
        }

        $this->dispatcher->dispatch($quoteRequest->releaseEvents());

        return redirect('/thanks')->with('thanks_note', 'Thank You, '.$quoteRequest->name.'! We will get back to you as soon as possible.');
    }

}