<?php namespace Dymantic\Briefs\General;

use Illuminate\Database\Eloquent\Model;

class ConvertedBrief extends Model
{
    protected $table = 'converted_briefs';

    protected $fillable = [
        'generalbrief_id',
        'client_id'
    ];

    public function generalBrief()
    {
        return $this->belongsTo('Dymantic\Briefs\General\GeneralBrief', 'generalbrief_id');
    }
}
