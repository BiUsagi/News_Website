<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\danh_muc;
use App\Models\tin_tuc;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        danh_muc::factory(10)->create();
        tin_tuc::factory(70)->create();
    }
}
