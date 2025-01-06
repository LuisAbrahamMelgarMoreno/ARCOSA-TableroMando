<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Administracion\CatalogoTipoCamara;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $this->call(PermisosSedeer::class);
        $this->call(CatalogoPlantaSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(RolPermisoSeeder::class);
        $this->call(UserSeeder::class);
    }
}
