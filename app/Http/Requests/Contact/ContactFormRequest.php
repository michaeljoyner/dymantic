<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/8/2015
 * Time: 9:56 AM
 */

namespace Dymantic\Http\Requests\Contact;


use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest {

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required|min:5'
        ];
    }

    public function authorize()
    {
        return true;
    }
}