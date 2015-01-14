<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/23/2014
 * Time: 11:23 AM
 */

namespace Dymantic\QuoteRequests;


use Illuminate\Database\Eloquent\Model;

class QuoteFile extends Model {

    protected $table = 'quotefiles';

    protected $fillable = ['quoterequest_id', 'filename'];
}