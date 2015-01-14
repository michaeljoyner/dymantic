<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 9:25 AM
 */

namespace Dymantic\Http\Requests\Briefs;


use Illuminate\Foundation\Http\FormRequest;

class BriefFormRequest extends FormRequest {

    private $general_fields = [
        'contact_person',
        'email',
        'company',
        'industry',
        'since',
        'current_website',
        'background',
        'reaction',
        'nutshell'
    ];

    private $logo_fields = [
        'haslogo',
        'logocolours',
        'logodirection',
        'logorestrictions',
        'logorequirements'
    ];

    private $site_fields = [
        'hasdomain',
        'domain',
        'hosting',
        'hosting_details',
        'sitetype',
        'sitetype_details',
        'content_management',
        'cm_details',
        'socialmedia',
        'site_requirements',
        'site_direction',
        'site_target'
    ];

    private $print_fields = [
        'printdesc',
        'printuse',
        'printspecifics',
        'printdirection',
        'printtext',
        'printrestrictions',
        'printcolour',
        'printprint',
        'printrequirements'
    ];


    public function rules()
    {
        return [
            'contact_person'     => 'required|max:255',
            'email'              => 'required|email|max:255',
            'company'            => 'max:128',
            'industry'           => 'max:128',
            'since'              => '',
            'current_website'    => 'max:255',
            'background'         => '',
            'reaction'           => '',
            'nutshell'           => '',
            'haslogo'            => 'integer',
            'logocolours'        => '',
            'logodirection'      => '',
            'logorestrictions'   => '',
            'logorequirements'   => '',
            'hasdomain'          => 'integer',
            'domain'             => 'max:255',
            'hosting'            => 'integer',
            'hosting_details'    => '',
            'sitetype'           => 'max:50',
            'sitetype_details'   => '',
            'content_management' => 'max:50',
            'cm_details'         => '',
            'socialmedia'        => '',
            'site_requirements'  => '',
            'site_direction'     => '',
            'sitetarget'         => '',
            'printdesc'          => '',
            'printuse'           => '',
            'printspecifics'     => '',
            'printdirection'     => '',
            'printtext'          => '',
            'printrestrictions'  => '',
            'printcolour'        => '',
            'printprint'         => 'integer',
            'printrequirements'  => ''
        ];
    }

    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function getGeneralFields()
    {
        return $this->general_fields;
    }

    /**
     * @return array
     */
    public function getLogoFields()
    {
        return $this->logo_fields;
    }

    /**
     * @return array
     */
    public function getSiteFields()
    {
        return $this->site_fields;
    }

    /**
     * @return array
     */
    public function getPrintFields()
    {
        return $this->print_fields;
    }



}