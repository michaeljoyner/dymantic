<?php

$factory('Dymantic\User', [
    'name' => $faker->name,
    'email' => $faker->unique()->email,
    'password' => 'password'
]);

$factory('Dymantic\Clients\Client', [
   'name' => $faker->company,
    'contact_person' => $faker->name,
    'contact_email' => $faker->email,
    'description' => $faker->paragraph(5)
]);