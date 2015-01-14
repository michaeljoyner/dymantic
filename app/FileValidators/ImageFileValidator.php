<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/14/2015
 * Time: 11:17 AM
 */

namespace Dymantic\FileValidators;


class ImageFileValidator extends FileValidator {

    protected $validMimes = [
        'image/png',
        'image/jpeg',
        'image/gif'
    ];
}