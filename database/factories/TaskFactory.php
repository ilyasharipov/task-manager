<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text(8),
        'description' => $faker->text(150),
        'status_id' => App\TaskStatus::all() ? null : App\TaskStatus::all()->random()->id,
        'creator_id' => App\User::all()->random()->id,
        'assigned_to_id' => App\User::all()->random()->id,
    ];
});
