<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 10:07 AM
 */

namespace Dymantic\AjaxFileUploads\PrintImageUploads;


use Dymantic\Commanding\CommandHandler;

class PrintImageUploadCommandHandler implements CommandHandler {

    protected $fileStorer ;

    function __construct(PrintImageStorer $fileStorer)
    {
        $this->fileStorer = $fileStorer;
    }

    public function handle($command)
    {
        return $this->fileStorer->store($command->upload);
    }
}