<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/14/2015
 * Time: 11:19 AM
 */

namespace Dymantic\FileValidators;


class DocFileValidator extends FileValidator {

    protected $validMimes = [
        'application/vnd.oasis.opendocument.text',
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/msword',
        'text/plain'
    ];
}