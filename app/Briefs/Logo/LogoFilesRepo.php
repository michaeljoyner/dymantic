<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/29/2014
 * Time: 11:50 AM
 */

namespace Dymantic\Briefs\Logo;


class LogoFilesRepo {

    protected $model;

    function __construct(LogoImageUpload $model)
    {
        $this->model = $model;
    }

    public function storeFilenames($command)
    {
        foreach($command->filenames as $filename)
        {
            $this->model->create([
                'logobrief_id' => $command->logobrief_id,
                'imagepath' => $filename
            ]);
        }
    }

}