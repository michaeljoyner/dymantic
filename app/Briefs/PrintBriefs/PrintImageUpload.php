<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:25 AM
 */

namespace Dymantic\Briefs\PrintBriefs;


use Illuminate\Database\Eloquent\Model;

class PrintImageUpload extends Model {

    protected $table = 'printimageuploads';

    protected $fillable = ['printbrief_id', 'imagepath'];

}