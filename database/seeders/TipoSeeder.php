<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\parametrizacao\documento\Tipo;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $tipos = [
            [
                'id'=>'1',
                'descricao' => 'BI'
            ],
            [
                'id'=>'2',
                'descricao' => 'Passaporte'
            ],
            [
                'id'=>'3',
                'descricao' => 'Cédula'
            ]
        ];

        DB::beginTransaction();

        try {
            foreach ($tipos as $tipo) {
                Tipo::create($tipo);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();
    }
}
