<?php namespace Dymantic\Projects;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'description',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo('Dymantic\Clients\Client');
    }
}
