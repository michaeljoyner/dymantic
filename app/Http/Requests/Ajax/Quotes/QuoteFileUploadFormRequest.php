<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 10:53 AM
 */

namespace Dymantic\Http\Requests\Ajax\Quotes;


use Illuminate\Foundation\Http\FormRequest;

class QuoteFileUploadFormRequest extends FormRequest {

    public function rules()
    {
        return [
            'upload' => 'max:5000|mimes:doc,docx,pdf,txt,vnd.oasis.opendocument.text,png,jpg,jpeg,gif,svg'
        ];
    }

    public function authorize()
    {
        return true;
    }

}