<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/15/2015
 * Time: 10:46 AM
 */

namespace Dymantic\Providers;

use Adamgoose\AnnotationsServiceProvider as ServiceProvider;

class AnnotationsServiceProvider extends ServiceProvider {

    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
        'Dymantic\Http\Controllers\PagesController',
        'Dymantic\Http\Controllers\AjaxUploadController',
        'Dymantic\Http\Controllers\QuotesController',
        'Dymantic\Http\Controllers\BriefsController'
    ];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = false;

}