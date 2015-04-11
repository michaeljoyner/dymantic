<?php

$factory('Dymantic\User', [
    'name' => $faker->name,
    'email' => $faker->unique()->email,
    'password' => 'password'
]);