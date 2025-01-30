<?php

namespace Database\Seeders;

use App\Models\Fruta;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('frutas')->delete();
        DB::table('users')->delete();

        User::factory(10)->create();
        Fruta::factory(100)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // /* Queremos borrar los datos de la tabla frutas */
        // DB::table('frutas')->delete();
        // /* A continuación, insertamos los datos */
        // DB::table('frutas')->insert([
        //     ['nombre' => 'Manzana', 'temporada' => 1, 'pais' => 'España'],
        //     ['nombre' => 'Naranja', 'temporada' => 2, 'pais' => 'Colombia'],
        //     ['nombre' => 'Pera', 'temporada' => 3, 'pais' => 'Francia'],
        //     ['nombre' => 'Plátano', 'temporada' => 4, 'pais' => 'Ecuador']
        // ]);
    }
}
