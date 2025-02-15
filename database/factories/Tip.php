<?php

use App\Tip;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Tip::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->text(),
        'slug' => $faker->slug,
    ];
});

$factory->state(Tip::class, 'published', function (Faker $faker) {
    return [
        'published_at' => Carbon::now()->subDay()->format('Y-m-d H:i:s'),
    ];
});
