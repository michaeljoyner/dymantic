<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 12:48 PM
 */

namespace Dymantic\QuoteRequests;


class QuoteFilesRepo {

    protected $model;

    function __construct(QuoteFile $model)
    {
        $this->model = $model;
    }

    public function storeFiles($data)
    {
        $stored_files = [];
        foreach ($data->uploaded_files as $filename)
        {
            $stored_files[] = $this->model->create([
                'quoterequest_id' => $data->quoterequest_id,
                'filename'       => $filename
            ]);
        }

        return $stored_files;
    }

}