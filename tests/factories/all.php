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
    'client_id'   => 'factory:Dymantic\Clients\Client',
    'name'        => $faker->words(2),
    'description' => $faker->paragraph(8)
]);

$factory('Dymantic\Projects\Task', [
    'project_id' => 'factory:Dymantic\Projects\Project',
    'name'       => $faker->words(2),
    'brief'      => $faker->paragraphs(8),
    'notes'      => $faker->paragraphs(3),
    'deadline'   => '31st December 2999',
    'status'     => 'Underway'
]);

$factory('Dymantic\Briefs\General\GeneralBrief', [
    'contact_person'  => $faker->name,
    'email'           => $faker->email,
    'company'         => $faker->company,
    'industry'        => $faker->words(2),
    'since'           => $faker->randomNumber(4),
    'current_website' => $faker->domainName,
    'background'      => $faker->paragraph(),
    'reaction'        => $faker->paragraph(),
    'nutshell'        => $faker->paragraph()
]);

$factory('Dymantic\Briefs\Logo\LogoBrief', [
    'generalbrief_id'  => 'factory:Dymantic\Briefs\General\GeneralBrief',
    'haslogo'          => $faker->randomElement([0, 1]),
    'logocolours'      => $faker->paragraph(),
    'logodirection'    => $faker->paragraph(),
    'logorestrictions' => $faker->paragraph(),
    'logorequirements' => $faker->paragraph()
]);

$factory('Dymantic\Briefs\Site\SiteBrief', [
    'generalbrief_id'    => 'factory:Dymantic\Briefs\General\GeneralBrief',
    'hasdomain'          => $faker->randomElement([0, 1, 2]),
    'domain_name'        => $faker->domainName,
    'hosting'            => $faker->randomElement([0, 1, 2]),
    'hosting_details'    => $faker->paragraph(),
    'sitetype'           => $faker->words(2),
    'sitetype_details'   => $faker->paragraph(),
    'content_management' => $faker->words(2),
    'cm_details'         => $faker->paragraph(),
    'socialmedia'        => $faker->paragraph(),
    'site_requirements'  => $faker->paragraph(),
    'site_direction'     => $faker->paragraph(),
    'sitetarget'         => $faker->paragraph()
]);

$factory('Dymantic\Briefs\PrintBriefs\PrintBrief', [
    'generalbrief_id'   => 'factory:Dymantic\Briefs\General\GeneralBrief',
    'printdesc'         => $faker->paragraph(),
    'printuse'          => $faker->paragraph(),
    'printspecifics'    => $faker->paragraph(),
    'printdirection'    => $faker->paragraph(),
    'printtext'         => $faker->paragraph(),
    'printrestrictions' => $faker->paragraph(),
    'printcolour'       => $faker->paragraph(),
    'printprint'        => $faker->randomElement([0, 1]),
    'printrequirements' => $faker->paragraph()
]);