<?php namespace Dymantic\Clients;

use Dymantic\Presenters\Contracts\PresenterInterface;
use Dymantic\Presenters\PresentableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model implements PresenterInterface
{
    use PresentableTrait;

    protected $table = 'clients';

    protected $fillable = [
        'name',
        'slug',
        'contact_person',
        'contact_email',
        'description',
        'image_path',
        'industry',
        'website',
        'operating_since'
    ];

    protected $presenter = 'Dymantic\Presenters\ClientPresenter';

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function projects()
    {
        return $this->hasMany('Dymantic\Projects\Project');
    }
}
