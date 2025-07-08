<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage hero_sections',
            'manage programs',
            'manage artikels',
            'manage materials',
            'manage reports',
            'manage users',
            'manage roles',
            'manage abouts',
            'manage teams',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        // --- MEMBUAT USER SUPER ADMIN ---
        // PERBAIKAN: Memisahkan parameter pencarian dan parameter pembuatan
        $user = User::firstOrCreate(
            ['email' => 'super@admin.com'], // Cari user berdasarkan email ini...
            [
                'name' => 'superadmin_ppkpt', // ...jika tidak ada, buat dengan data ini
                'password' => bcrypt('pass123123'),
            ]
        );

        $user->assignRole($superAdminRole);


        $tim4Role = Role::firstOrCreate([
            'name' => 'tim4'
        ]);

        $tim4Permissions = [
            'manage hero_sections',
            'manage programs',
            'manage artikels',
            'manage materials',
            
        ];

        $tim4Role->syncPermissions($tim4Permissions);

        $theGuardianRole = Role::firstOrCreate([
            'name' => 'the_guardian'
        ]);

        $theGuardianPermissions = [
            'manage programs',
            'manage artikels',
        ];

        $theGuardianRole->syncPermissions($theGuardianPermissions);

    }
}
