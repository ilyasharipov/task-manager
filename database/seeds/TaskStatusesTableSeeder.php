<?php

use Illuminate\Database\Seeder;

class TaskStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            ['name' => 'new'],
            ['name' => 'in proccess'],
            ['name' => 'in testing'],
            ['name' => 'completed'],
        ];

        foreach ($statuses as $status) {
            App\TaskStatus::create($status);
        }
    }
}
