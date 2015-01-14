<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 9:46 AM
 */

namespace Dymantic\AjaxFileUploads\LogoImageUploads;


use Dymantic\Commanding\CommandHandler;

class LogoImageUploadCommandHandler implements CommandHandler {

    protected $fileStorer;

    function __construct(LogoImageStorer $fileStorer)
    {
        $this->fileStorer = $fileStorer;
    }

    public function handle($command)
    {
        return $this->fileStorer->store($command->upload);
    }
}