<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/2014
 * Time: 10:04 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


use Dymantic\AjaxFileUploads\PrintDocUploads\PrintDocStorer;
use Dymantic\Commanding\CommandHandler;
use stdClass;

class PrintDocsSubmittedCommandHandler implements CommandHandler {

    /**
     * @var PrintDocRepo
     */
    private $repo;
    /**
     * @var PrintDocStorer
     */
    private $fileStorer;

    public function __construct(PrintDocRepo $repo, PrintDocStorer $fileStorer)
    {

        $this->repo = $repo;
        $this->fileStorer = $fileStorer;
    }
    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $stored_files = [];

        foreach($command->documents as $document)
        {
            $stored_files[] = $this->fileStorer->store($document);
        }

        $data = new StdClass;
        $data->printbrief_id = $command->printbrief_id;
        $data->filenames = $stored_files;

        return $this->repo->storeFileNames($data);
    }
}