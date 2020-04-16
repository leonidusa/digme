<?php

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'logo' => null,
        'website' => $faker->domainName,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
