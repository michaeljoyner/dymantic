<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/2014
 * Time: 12:08 PM
 */

namespace Dymantic\Briefs\Logo;


use Dymantic\AjaxFileUploads\LogoImageUploads\LogoImageStorer;
use Dymantic\Commanding\CommandHandler;
use stdClass;

class LogosSubmittedCommandHandler implements CommandHandler {

    /**
     * @var LogoImageStorer
     */
    private $fileStorer;
    /**
     * @var LogoFilesRepo
     */
    private $repo;

    public function __construct(LogoImageStorer $fileStorer, LogoFilesRepo $repo)
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

        foreach($command->uploads as $file)
        {
            $stored_files[] = $this->fileStorer->store($file);
        }

        $data = new StdClass;
        $data->logobrief_id = $command->logobrief_id;
        $data->filenames = $stored_files;

        $this->repo->storeFilenames($data);
    }
}