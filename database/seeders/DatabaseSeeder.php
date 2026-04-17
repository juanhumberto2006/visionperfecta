<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Sucursal::factory(10)->create();
        Categoria::factory(50)->create();
        Producto::factory(200)->create();
        Proveedor::factory(20)->create();


        User::create([
            'name' => 'Juan Humberto',
            'email' => 'juan@admin.com',
            'password' => bcrypt('12345678'), // Use bcrypt for password hashing
            'is_admin' => true
        ]);
    }
}
