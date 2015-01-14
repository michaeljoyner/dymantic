<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/30/2014
 * Time: 10:05 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


class PrintDocRepo {

    /**
     * @var PrintDocUpload
     */
    private $model;

    public function __construct(PrintDocUpload $model)
    {

        $this->model = $model;
    }

    public function storeFileNames($data)
    {
        foreach($data->filenames as $filename)
        {
            $this->model->create([
                'printbrief_id' => $data->printbrief_id,
                'documentpath' => $filename
            ]);
        }
    }

}