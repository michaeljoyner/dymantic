<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 11:17 AM
 */

namespace Dymantic\Http\Requests\Quotes;


use Illuminate\Foundation\Http\FormRequest;

class QuoteRequestFormRequest extends FormRequest {

    protected $dontFlash = ['uploads'];

    public function rules()
    {
        return [
            'name'    => 'max:255|required',
            'email'   => 'email|required',
            'country' => 'max:255',
            'phone'   => 'max:50',
            'budget'  => 'max:128',
            'company' => 'max:255',
            'project' => 'min:5',
//            'uploads' => 'max:800|mimes:jpeg,jpg,png,gif,svg,pdf,doc,docx,txt,vnd.oasis.opendocument.text'
        ];
    }

    public function authorize()
    {
        return true;
    }
}