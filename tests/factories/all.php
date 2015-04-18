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
    'name' => $faker->words(2),
    'description' => $faker->paragraph(8)
]);

$factory('Dymantic\Projects\Task', [
    'project_id' => 'factory:Dymantic\Projects\Project',
    'name' => $faker->words(2),
    'brief' => $faker->paragraphs(8),
    'notes' => $faker->paragraphs(3),
    'deadline' => '31st December 2999',
    'status' => 'Underway'
]);