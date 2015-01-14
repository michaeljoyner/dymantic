<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/22/2014
 * Time: 10:16 AM
 */

namespace Dymantic\AjaxFileUploads\QuoteFileUploads;


use Dymantic\Commanding\CommandHandler;

class QuoteFileUploadCommandHandler implements CommandHandler {

    protected $fileStorer;

    function __construct(QuoteFileStorer $fileStorer)
    {
        $this->fileStorer = $fileStorer;
    }


    public function handle($command)
    {
        $path = $this->fileStorer->store($command->upload);
        return $path;
    }

}