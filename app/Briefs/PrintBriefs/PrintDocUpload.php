<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:26 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


use Illuminate\Database\Eloquent\Model;

class PrintDocUpload extends Model {

    protected $table = 'printdocuploads';

    protected $fillable = ['printbrief_id', 'documentpath'];

}