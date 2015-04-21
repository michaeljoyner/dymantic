<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/21/2015
 * Time: 10:53 AM
 */

namespace Dymantic\Services;


class NameGenerator {

    protected static $adjectives = [
        'sensual',
        'frugal',
        'dark',
        'resplendent',
        'vicious',
        'red',
        'rising',
        'crouching',
        'zero',
        'blue',
        'nasty',
        'juicy',
        'glowing',
        'vile',
        'sexy'
    ];

    protected static $nouns = [
        'panda',
        'octopus',
        'wombat',
        'knife',
        'night',
        'platypus',
        'digit',
        'designer',
        'horse',
        'sword',
        'tulip',
        'mouse',
        'palette',
        'spider',
        'sloth'
    ];

    public static function generate()
    {
        $adj = static::$adjectives[array_rand(static::$adjectives, 1)];
        $noun = static::$nouns[array_rand(static::$nouns, 1)];

        return $adj.' '.$noun;
    }

}