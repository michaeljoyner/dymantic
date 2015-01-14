<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 10:12 AM
 */

namespace Dymantic\AjaxFileUploads\PrintDocUploads;


use Dymantic\Commanding\CommandHandler;

class PrintDocUploadCommandHandler implements CommandHandler {

    protected $fileStorer;

    function __construct(PrintDocStorer $fileStorer)
    {
        $this->fileStorer = $fileStorer;
    }


    /**
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        return $this->fileStorer->store($command->upload);
    }
}