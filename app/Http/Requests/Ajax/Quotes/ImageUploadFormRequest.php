<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 10:24 AM
 */

namespace Dymantic\Http\Requests\Ajax\Quotes;


use Illuminate\Foundation\Http\FormRequest;

class ImageUploadFormRequest extends FormRequest {

    public function rules()
    {
        return [
            'upload' => 'max:5000|mimes:jpeg,jpg,png,gif,svg'
        ];
    }

    public function authorize()
    {
        return true;
    }

}