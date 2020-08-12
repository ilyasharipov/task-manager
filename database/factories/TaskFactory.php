<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use App\TaskStatus;
use App\User;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->text(8),
        'description' => $faker->text(150),
        'status_id' => (string) TaskStatus::all()->random()->id ?? null,
        'creator_id' => (string) User::all()->random()->id ?? null,
        'assigned_to_id' => (string) User::all()->random()->id ?? null,
    ];
});
