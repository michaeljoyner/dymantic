<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/14/2015
 * Time: 10:04 AM
 */

namespace Dymantic\FileValidators;


class QuoteFileValidator extends FileValidator {

    protected $validMimes = [
        'image/png',
        'image/jpeg',
        'image/gif',
        'application/vnd.oasis.opendocument.text',
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/msword',
        'text/plain'
    ];
}