<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
              'name' => 'Clean the house',
              'priority' => 1
            ],
            [
              'name' => 'Walk the dog',
              'priority' => 2
            ],
            [
              'name' => 'Buy groceries',
              'priority' => 3
            ]
          ]);
    }
}
