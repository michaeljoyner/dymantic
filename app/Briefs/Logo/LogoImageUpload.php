<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/26/2014
 * Time: 10:20 AM
 */

namespace Dymantic\Briefs\Logo;


use Illuminate\Database\Eloquent\Model;

class LogoImageUpload extends Model {

    protected $table = 'logouploads';

    protected $fillable = ['logobrief_id', 'imagepath'];

}