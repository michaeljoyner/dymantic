<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 10:50 AM
 */

namespace Dymantic\Http\Requests\Ajax\Quotes;


use Illuminate\Foundation\Http\FormRequest;

class DocUploadFormRequest extends FormRequest {

    public function rules()
    {
        return [
            'upload' => 'max:5000|mimes:pdf,doc,docx,txt,vnd.oasis.opendocument.text'
        ];
    }

    public function authorize()
    {
        return true;
    }

}