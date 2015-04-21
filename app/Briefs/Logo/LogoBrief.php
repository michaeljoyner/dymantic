<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:17 AM
 */

namespace Dymantic\Briefs\Logo;


use Dymantic\Presenters\Contracts\PresenterInterface;
use Dymantic\Presenters\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class LogoBrief extends Model implements PresenterInterface {

    use PresentableTrait;

    protected $presenter = 'Dymantic\Presenters\LogoBriefPresenter';

    protected $table = 'logobriefs';

    protected $fillable = [
        'generalbrief_id',
        'haslogo',
        'logocolours',
        'logodirection',
        'logorestrictions',
        'logorequirements'
    ];

    public function logoFiles()
    {
        return $this->hasMany('\Dymantic\Briefs\Logo\LogoImageUpload', 'logobrief_id');
    }
}