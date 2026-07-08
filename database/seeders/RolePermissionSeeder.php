<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        
        // Limpa cache das permissões
        app()[\Spatie\Permission\PermissionRegistrar::class]
            ->forgetCachedPermissions();

        // Permissões
        $permissions = [
            'setores',
            'especialidades',
            'equipamentos',
            'unidades',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        // Roles
        $admin = Role::firstOrCreate([
            'name' => 'Administrador',
            'guard_name' => 'web',
        ]);

        $colaborador = Role::firstOrCreate([
            'name' => 'Colaborador',
            'guard_name' => 'web',
        ]);

        // O administrador recebe todas as permissões
        $admin->syncPermissions(Permission::all());
    }
}