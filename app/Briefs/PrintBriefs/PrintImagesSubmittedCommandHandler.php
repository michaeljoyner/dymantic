<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/2014
 * Time: 10:03 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


use Dymantic\AjaxFileUploads\PrintImageUploads\PrintImageStorer;
use Dymantic\Commanding\CommandHandler;
use stdClass;

class PrintImagesSubmittedCommandHandler implements CommandHandler {

    /**
     * @var PrintImageRepo
     */
    private $repo;
    /**
     * @var PrintImageStorer
     */
    private $fileStorer;

    public function __construct(PrintImageRepo $repo, PrintImageStorer $fileStorer)
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

        foreach($command->images as $image)
        {
            $stored_files[] = $this->fileStorer->store($image);
        }

        $data = new StdClass;
        $data->printbrief_id = $command->printbrief_id;
        $data->filenames = $stored_files;

        return $this->repo->storeFileNames($data);
    }
}