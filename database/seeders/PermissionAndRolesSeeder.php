<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \Artisan::call('filament-access-control:install');
    }
}
