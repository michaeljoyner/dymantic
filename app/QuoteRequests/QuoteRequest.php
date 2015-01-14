<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 11:21 AM
 */

namespace Dymantic\QuoteRequests;


use Dymantic\Eventing\EventGenerator;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model {

    use EventGenerator;

    protected $table = 'quoterequests';

    protected $fillable = ['name', 'email', 'country', 'phone', 'budget', 'company', 'project'];

    public function quotefiles()
    {
        return $this->hasMany('\Dymantic\QuoteRequests\QuoteFile', 'quoterequest_id');
    }

}