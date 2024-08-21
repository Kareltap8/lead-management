<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Status;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Status::create(['name' => 'Новый']);
        Status::create(['name' => 'В работе']);
        Status::create(['name' => 'Завершен']);
    }
}
