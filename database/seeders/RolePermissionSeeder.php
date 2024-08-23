<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Role::create(['name' => 'Bidang Infrastruktur dan Kewilayahan']);
        Role::create(['name' => 'Bidang Ekonomi']);
        Role::create(['name' => 'Bidang Geospasial']);
        Role::create(['name' => 'Admin']);
        
    }
}
