<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:28 AM
 */

namespace Dymantic\Briefs\Site;


use Dymantic\Presenters\Contracts\PresenterInterface;
use Dymantic\Presenters\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class SiteBrief extends Model implements PresenterInterface {

    use PresentableTrait;

    protected $table = 'sitebriefs';

    protected $fillable = [
        'generalbrief_id',
        'hasdomain',
        'domain_name',
        'hosting',
        'hosting_details',
        'sitetype',
        'sitetype_details',
        'content_management',
        'cm_details',
        'socialmedia',
        'site_requirements',
        'site_direction',
        'sitetarget'
    ];

    protected $presenter = 'Dymantic\Presenters\SiteBriefPresenter';

}