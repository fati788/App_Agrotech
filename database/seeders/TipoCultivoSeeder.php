<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoCultivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Olivo',
            'nombre_cientifico' => 'Olea europaea',
            'familia' => 'Oleaceae',
            'ciclo' => 'perenne',
            'descripcion' => 'Árbol mediterráneo utilizado para producir aceite y aceitunas.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Naranjo',
            'nombre_cientifico' => 'Citrus sinensis',
            'familia' => 'Rutaceae',
            'ciclo' => 'perenne',
            'descripcion' => 'Árbol frutal que produce naranjas dulces.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Limonero',
            'nombre_cientifico' => 'Citrus limon',
            'familia' => 'Rutaceae',
            'ciclo' => 'perenne',
            'descripcion' => 'Árbol frutal de climas cálidos que produce limones.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Tomate',
            'nombre_cientifico' => 'Solanum lycopersicum',
            'familia' => 'Solanaceae',
            'ciclo' => 'anual',
            'descripcion' => 'Planta hortícola ampliamente cultivada.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Lechuga',
            'nombre_cientifico' => 'Lactuca sativa',
            'familia' => 'Asteraceae',
            'ciclo' => 'anual',
            'descripcion' => 'Hortaliza de hoja utilizada en ensaladas.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Vid',
            'nombre_cientifico' => 'Vitis vinifera',
            'familia' => 'Vitaceae',
            'ciclo' => 'perenne',
            'descripcion' => 'Planta leñosa productora de uvas.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Almendro',
            'nombre_cientifico' => 'Prunus dulcis',
            'familia' => 'Rosaceae',
            'ciclo' => 'perenne',
            'descripcion' => 'Árbol productor de almendras.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Aguacate',
            'nombre_cientifico' => 'Persea americana',
            'familia' => 'Lauraceae',
            'ciclo' => 'perenne',
            'descripcion' => 'Árbol tropical de fruto graso y nutritivo.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Trigo',
            'nombre_cientifico' => 'Triticum aestivum',
            'familia' => 'Poaceae',
            'ciclo' => 'anual',
            'descripcion' => 'Cereal usado para producción de harina.',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('tipo_cultivos')->insert([
            'nombre' => 'Maíz',
            'nombre_cientifico' => 'Zea mays',
            'familia' => 'Poaceae',
            'ciclo' => 'anual',
            'descripcion' => 'Cereal utilizado en alimentación humana y animal.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
