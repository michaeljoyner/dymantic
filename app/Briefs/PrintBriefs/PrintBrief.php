<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:21 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


use Dymantic\Presenters\Contracts\PresenterInterface;
use Dymantic\Presenters\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class PrintBrief extends Model implements PresenterInterface {

    use PresentableTrait;

    protected $presenter = 'Dymantic\Presenters\PrintBriefPresenter';

    protected $table = 'printbriefs';

    protected $fillable = [
        'generalbrief_id',
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

    public function printImages()
    {
        return $this->hasMany('\Dymantic\Briefs\PrintBriefs\PrintImageUpload', 'printbrief_id');
    }

    public function printDocs()
    {
        return $this->hasMany('\Dymantic\Briefs\PrintBriefs\PrintDocUpload', 'printbrief_id');
    }

}