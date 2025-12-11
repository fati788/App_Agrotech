<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* ========================
          FINCA 1 (5 parcelas)
       ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela A1',
            'finca_id' => 1,
            'tipo_cultivo_id' => 1,
            'hectareas' => 5,
            'fecha_siembra' => '2024-03-12',
            'estado' => 'en_cultivo',
            'notas' => 'Zona principal de olivar.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela A2',
            'finca_id' => 1,
            'tipo_cultivo_id' => 4,
            'hectareas' => 2,
            'fecha_siembra' => '2024-04-10',
            'estado' => 'en_cultivo',
            'notas' => 'Tomates tempranos.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela A3',
            'finca_id' => 1,
            'tipo_cultivo_id' => 5,
            'hectareas' => 1,
            'fecha_siembra' => '2024-05-01',
            'estado' => 'en_descanso',
            'notas' => 'Hortalizas rotativas.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela A4',
            'finca_id' => 1,
            'tipo_cultivo_id' => 9,
            'hectareas' => 3,
            'fecha_siembra' => '2024-02-20',
            'estado' => 'en_cultivo',
            'notas' => 'Lote de trigo duro.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela A5',
            'finca_id' => 1,
            'tipo_cultivo_id' => 7,
            'hectareas' => 2.5,
            'fecha_siembra' => '2024-03-15',
            'estado' => 'en_cultivo',
            'notas' => 'Almendros jóvenes.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 2 (4 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela B1',
            'finca_id' => 2,
            'tipo_cultivo_id' => 4,
            'hectareas' => 4,
            'fecha_siembra' => '2024-03-05',
            'estado' => 'en_cultivo',
            'notas' => 'Tomate de temporada.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela B2',
            'finca_id' => 2,
            'tipo_cultivo_id' => 6,
            'hectareas' => 6,
            'fecha_siembra' => '2024-01-15',
            'estado' => 'preparacion',
            'notas' => 'Terreno listo para vid.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela B3',
            'finca_id' => 2,
            'tipo_cultivo_id' => 1,
            'hectareas' => 3,
            'fecha_siembra' => '2024-02-10',
            'estado' => 'en_descanso',
            'notas' => 'Descanso por rotación.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela B4',
            'finca_id' => 2,
            'tipo_cultivo_id' => 8,
            'hectareas' => 2.3,
            'fecha_siembra' => '2024-04-20',
            'estado' => 'en_cultivo',
            'notas' => 'Aguacates en crecimiento.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 3 (4 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela C1',
            'finca_id' => 3,
            'tipo_cultivo_id' => 3,
            'hectareas' => 4.5,
            'fecha_siembra' => '2024-03-03',
            'estado' => 'en_cultivo',
            'notas' => 'Plantación de limoneros.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela C2',
            'finca_id' => 3,
            'tipo_cultivo_id' => 10,
            'hectareas' => 6,
            'fecha_siembra' => '2024-01-12',
            'estado' => 'en_cultivo',
            'notas' => 'Maíz tradicional.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela C3',
            'finca_id' => 3,
            'tipo_cultivo_id' => 6,
            'hectareas' => 3,
            'fecha_siembra' => '2024-02-25',
            'estado' => 'preparacion',
            'notas' => 'Preparando para viñedo.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela C4',
            'finca_id' => 3,
            'tipo_cultivo_id' => 2,
            'hectareas' => 2,
            'fecha_siembra' => '2024-03-20',
            'estado' => 'en_cultivo',
            'notas' => 'Naranjos jóvenes.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 4 (3 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela D1',
            'finca_id' => 4,
            'tipo_cultivo_id' => 2,
            'hectareas' => 4,
            'fecha_siembra' => '2024-04-01',
            'estado' => 'en_cultivo',
            'notas' => 'Naranjos tardíos.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela D2',
            'finca_id' => 4,
            'tipo_cultivo_id' => 5,
            'hectareas' => 1.5,
            'fecha_siembra' => '2024-03-15',
            'estado' => 'en_cultivo',
            'notas' => 'Lechugas de invierno.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela D3',
            'finca_id' => 4,
            'tipo_cultivo_id' => 1,
            'hectareas' => 7,
            'fecha_siembra' => '2024-01-25',
            'estado' => 'en_descanso',
            'notas' => 'Olivar en descanso.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 5 (3 parcelas)
        ======================== */

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela E1',
            'finca_id' => 5,
            'tipo_cultivo_id' => 8,
            'hectareas' => 9,
            'fecha_siembra' => '2024-02-12',
            'estado' => 'en_cultivo',
            'notas' => 'Aguacate variedad Hass.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela E2',
            'finca_id' => 5,
            'tipo_cultivo_id' => 3,
            'hectareas' => 3.4,
            'fecha_siembra' => '2024-03-20',
            'estado' => 'preparacion',
            'notas' => 'Preparación de riego.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela E3',
            'finca_id' => 5,
            'tipo_cultivo_id' => 7,
            'hectareas' => 2.2,
            'fecha_siembra' => '2024-04-18',
            'estado' => 'en_cultivo',
            'notas' => 'Almendros regulares.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 6 (3 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela F1',
            'finca_id' => 6,
            'tipo_cultivo_id' => 10,
            'hectareas' => 5.5,
            'fecha_siembra' => '2024-02-10',
            'estado' => 'en_cultivo',
            'notas' => 'Maíz híbrido.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela F2',
            'finca_id' => 6,
            'tipo_cultivo_id' => 4,
            'hectareas' => 1.3,
            'fecha_siembra' => '2024-04-01',
            'estado' => 'preparacion',
            'notas' => 'Terreno listo para siembra.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela F3',
            'finca_id' => 6,
            'tipo_cultivo_id' => 9,
            'hectareas' => 3,
            'fecha_siembra' => '2024-01-20',
            'estado' => 'en_cultivo',
            'notas' => 'Trigo de ciclo largo.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 7 (3 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela G1',
            'finca_id' => 7,
            'tipo_cultivo_id' => 6,
            'hectareas' => 5,
            'fecha_siembra' => '2024-03-18',
            'estado' => 'en_cultivo',
            'notas' => 'Uva tinta.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela G2',
            'finca_id' => 7,
            'tipo_cultivo_id' => 5,
            'hectareas' => 1,
            'fecha_siembra' => '2024-04-22',
            'estado' => 'preparacion',
            'notas' => 'Cultivo de hoja.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela G3',
            'finca_id' => 7,
            'tipo_cultivo_id' => 1,
            'hectareas' => 3.3,
            'fecha_siembra' => '2024-02-14',
            'estado' => 'en_descanso',
            'notas' => 'Olivar en rotación.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 8 (3 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela H1',
            'finca_id' => 8,
            'tipo_cultivo_id' => 8,
            'hectareas' => 4,
            'fecha_siembra' => '2024-03-01',
            'estado' => 'en_cultivo',
            'notas' => 'Aguacates.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela H2',
            'finca_id' => 8,
            'tipo_cultivo_id' => 10,
            'hectareas' => 5.2,
            'fecha_siembra' => '2024-01-10',
            'estado' => 'en_cultivo',
            'notas' => 'Maíz gallego.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela H3',
            'finca_id' => 8,
            'tipo_cultivo_id' => 4,
            'hectareas' => 2,
            'fecha_siembra' => '2024-04-12',
            'estado' => 'preparacion',
            'notas' => 'Tomate para industria.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 9 (3 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela I1',
            'finca_id' => 9,
            'tipo_cultivo_id' => 9,
            'hectareas' => 5.5,
            'fecha_siembra' => '2024-03-04',
            'estado' => 'en_cultivo',
            'notas' => 'Trigo panificable.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela I2',
            'finca_id' => 9,
            'tipo_cultivo_id' => 6,
            'hectareas' => 4,
            'fecha_siembra' => '2024-04-10',
            'estado' => 'preparacion',
            'notas' => 'Zona próxima para viñedos.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela I3',
            'finca_id' => 9,
            'tipo_cultivo_id' => 7,
            'hectareas' => 3,
            'fecha_siembra' => '2024-02-15',
            'estado' => 'en_cultivo',
            'notas' => 'Almendros en buen estado.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 10 (3 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela J1',
            'finca_id' => 10,
            'tipo_cultivo_id' => 2,
            'hectareas' => 8,
            'fecha_siembra' => '2024-03-05',
            'estado' => 'en_cultivo',
            'notas' => 'Naranjos en producción.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela J2',
            'finca_id' => 10,
            'tipo_cultivo_id' => 5,
            'hectareas' => 2.5,
            'fecha_siembra' => '2024-04-01',
            'estado' => 'preparacion',
            'notas' => 'Listo para siembra de invierno.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela J3',
            'finca_id' => 10,
            'tipo_cultivo_id' => 8,
            'hectareas' => 4,
            'fecha_siembra' => '2024-03-22',
            'estado' => 'en_cultivo',
            'notas' => 'Aguacates con buen riego.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 11 (4 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela K1',
            'finca_id' => 11,
            'tipo_cultivo_id' => 1,
            'hectareas' => 7,
            'fecha_siembra' => '2024-01-30',
            'estado' => 'en_cultivo',
            'notas' => 'Olivar antiguo.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela K2',
            'finca_id' => 11,
            'tipo_cultivo_id' => 6,
            'hectareas' => 3.5,
            'fecha_siembra' => '2024-03-02',
            'estado' => 'en_descanso',
            'notas' => 'Viñedo en reposo.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela K3',
            'finca_id' => 11,
            'tipo_cultivo_id' => 7,
            'hectareas' => 2,
            'fecha_siembra' => '2024-02-18',
            'estado' => 'preparacion',
            'notas' => 'Listo para almendros.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela K4',
            'finca_id' => 11,
            'tipo_cultivo_id' => 9,
            'hectareas' => 4,
            'fecha_siembra' => '2024-03-12',
            'estado' => 'en_cultivo',
            'notas' => 'Trigo extensivo.',
            'created_at' => now(),
            'updated_at' => now()
        ]);


        /* ========================
           FINCA 12 (3 parcelas)
        ======================== */
        DB::table('parcelas')->insert([
            'nombre' => 'Parcela L1',
            'finca_id' => 12,
            'tipo_cultivo_id' => 6,
            'hectareas' => 6,
            'fecha_siembra' => '2024-03-07',
            'estado' => 'en_cultivo',
            'notas' => 'Uva blanca.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela L2',
            'finca_id' => 12,
            'tipo_cultivo_id' => 3,
            'hectareas' => 3,
            'fecha_siembra' => '2024-04-05',
            'estado' => 'preparacion',
            'notas' => 'Listo para cítricos.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('parcelas')->insert([
            'nombre' => 'Parcela L3',
            'finca_id' => 12,
            'tipo_cultivo_id' => 4,
            'hectareas' => 2.2,
            'fecha_siembra' => '2024-04-15',
            'estado' => 'en_cultivo',
            'notas' => 'Tomate tardío.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
