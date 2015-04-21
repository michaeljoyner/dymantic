<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:14 AM
 */

namespace Dymantic\Briefs\General;


use Dymantic\Presenters\Contracts\PresenterInterface;
use Dymantic\Eventing\EventGenerator;
use Dymantic\Presenters\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class GeneralBrief extends Model implements PresenterInterface {

    use EventGenerator;
    use PresentableTrait;

    protected $table = 'generalbriefs';

    protected $fillable = [
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

    protected $presenter = 'Dymantic\Presenters\GeneralBriefPresenter';

    public function logoBriefs()
    {
        return $this->hasMany('Dymantic\Briefs\Logo\LogoBrief', 'generalbrief_id');
    }

    public function siteBriefs()
    {
        return $this->hasMany('Dymantic\Briefs\Site\SiteBrief', 'generalbrief_id');
    }

    public function printBriefs()
    {
        return $this->hasMany('Dymantic\Briefs\PrintBriefs\PrintBrief', 'generalbrief_id');
    }

    public function converted()
    {
        return $this->hasOne('Dymantic\Briefs\General\ConvertedBrief', 'generalbrief_id');
    }

}