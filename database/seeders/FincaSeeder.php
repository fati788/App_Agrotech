<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FincaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fincas')->insert([
            'nombre' => 'Finca El Olivar',
            'ubicacion' => 'Córdoba',
            'hectareasTotales' => 25,
            'descripcion' => 'Finca especializada en olivos.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('fincas')->insert([
            'nombre' => 'Finca Las Lomas',
            'ubicacion' => 'Jaén',
            'hectareasTotales' => 18,
            'descripcion' => 'Terreno mixto con parcelas para hortalizas.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('fincas')->insert([
            'nombre' => 'Finca Río Verde',
            'ubicacion' => 'Granada',
            'hectareasTotales' => 30,
            'descripcion' => 'Finca con zonas de regadío.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Usuario 2
        DB::table('fincas')->insert([
            'nombre' => 'Finca Los Naranjos',
            'ubicacion' => 'Valencia',
            'hectareasTotales' => 22,
            'descripcion' => 'Cultivo de cítricos principalmente.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('fincas')->insert([
            'nombre' => 'Finca La Esperanza',
            'ubicacion' => 'Murcia',
            'hectareasTotales' => 15,
            'descripcion' => 'Cultivo variado y zonas experimentales.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('fincas')->insert([
            'nombre' => 'Finca Altavista',
            'ubicacion' => 'Alicante',
            'hectareasTotales' => 28,
            'descripcion' => 'Zona de cultivo en secano.',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Usuario 3
        DB::table('fincas')->insert([
            'nombre' => 'Finca Montefresco',
            'ubicacion' => 'Salamanca',
            'hectareasTotales' => 17,
            'descripcion' => 'Finca de cereales y rotación de cultivos.',
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('fincas')->insert([
            'nombre' => 'Finca El Molino',
            'ubicacion' => 'Zamora',
            'hectareasTotales' => 12,
            'descripcion' => 'Finca pequeña destinada a hortalizas.',
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Usuario 4
        DB::table('fincas')->insert([
            'nombre' => 'Finca Los Pinos',
            'ubicacion' => 'Huelva',
            'hectareasTotales' => 40,
            'descripcion' => 'Amplia extensión dedicada a frutales.',
            'user_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('fincas')->insert([
            'nombre' => 'Finca Costa Azul',
            'ubicacion' => 'Málaga',
            'hectareasTotales' => 20,
            'descripcion' => 'Terreno costero con clima ideal para aguacates.',
            'user_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Usuario 5
        DB::table('fincas')->insert([
            'nombre' => 'Finca La Colina',
            'ubicacion' => 'Toledo',
            'hectareasTotales' => 27,
            'descripcion' => 'Finca con mezcla de secano y regadío.',
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('fincas')->insert([
            'nombre' => 'Finca Santa María',
            'ubicacion' => 'Ciudad Real',
            'hectareasTotales' => 19,
            'descripcion' => 'Terreno destinado a vid y almendro.',
            'user_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('fincas')->insert([
            'nombre' => 'Finca El Fatima',
            'ubicacion' => 'Zamora',
            'hectareasTotales' => 12,
            'descripcion' => 'Finca pequeña destinada a hortalizas.',
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('fincas')->insert([
            'nombre' => 'Finca El Fatima LHM9A',
            'ubicacion' => 'Zamora',
            'hectareasTotales' => 12,
            'descripcion' => 'Finca pequeña destinada a hortalizas.',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
