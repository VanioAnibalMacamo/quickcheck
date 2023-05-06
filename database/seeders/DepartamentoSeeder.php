<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // protected $fillable = ['nome','descricao','sigla'];
        $departamentos = [
           /* [
                'id' => '1',
                'nome' => 'Departamento da redução e  Manutenção da Eestrutura',
                'descricao' => 'Responsável por tomar todas as medidas práticas...',
                'sigla' => 'DRME'
            ],
            [
                'id' => '2',
                'nome' => 'Departamento de Tecnologia de Informacao',
                'descricao' => 'Responsável por tomar todas as medidas práticas...',
                'sigla' => 'DTIC'
            ],
            [
                'id' => '3',
                'nome' => 'Departamento de Recursos Humanos',
                'descricao' => 'Responsável por tomar todas as medidas práticas...',
                'sigla' => 'DRH'
            ],*/

            [
            'id' => '4',
            'nome' => 'Departamento de Reparacao',
            'descricao' => 'Responsável pela repacao dos equipamentos danificados...',
            'sigla' => 'DR'
            ]
        ];

        DB::beginTransaction();

        try {
            foreach ($departamentos as $departamento) {
                Departamento::create($departamento);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();
    }
}
