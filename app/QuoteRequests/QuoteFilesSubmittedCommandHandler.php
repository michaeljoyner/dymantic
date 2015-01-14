<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 1:47 PM
 */

namespace Dymantic\QuoteRequests;


use Dymantic\AjaxFileUploads\QuoteFileUploads\QuoteFileStorer;
use Dymantic\Commanding\CommandHandler;
use stdClass;

class QuoteFilesSubmittedCommandHandler implements CommandHandler {

    protected $fileStorer;
    /**
     * @var
     */
    private $repo;

    function __construct(QuoteFileStorer $fileStorer, QuoteFilesRepo $repo)
    {
        $this->fileStorer = $fileStorer;
        $this->repo = $repo;
    }

    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $stored_files = [];
        foreach($command->files as $file)
        {
            $stored_files[] = $this->fileStorer->store($file);
        }

        $data = new StdClass;
        $data->quoterequest_id = $command->quoterequest_id;
        $data->uploaded_files = $stored_files;

        $this->repo->storeFiles($data);
    }
}