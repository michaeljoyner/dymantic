<?php

$factory('Dymantic\User', [
    'name'     => $faker->name,
    'email'    => $faker->unique()->email,
    'password' => 'password'
]);

$factory('Dymantic\Clients\Client', [
    'name'            => $faker->company,
    'contact_person'  => $faker->name,
    'contact_email'   => $faker->email,
    'description'     => $faker->paragraph(5),
    'industry'        => $faker->words(2),
    'operating_since' => '1999',
    'website'         => $faker->domainName
]);

$factory('Dymantic\Projects\Project', [
    'client_id' => 'factory:Dymantic\Clients\Client',
    'description' => $faker->paragraph(8)
]);