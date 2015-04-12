<?php namespace Dymantic\Clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
        'name',
        'slug',
        'contact_person',
        'contact_email',
        'description',
        'image_path'
    ];

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }
}
