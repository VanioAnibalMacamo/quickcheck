<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Funcionario;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $funcionarios = [
            [
                'nome' => 'Antonio Gabriel',
                'morada' => 'Maputo Laulane',
                'email' => 'antonio@example.com',
                'contacto' => '822321232',
                'genero' => 'Masculino',
                'num_bi' => '1231312113J',
                'user_id' => '1',
                'departamento_id' => '1',
                'tipo_id' => '1'
            ],
            [
                'nome' => 'Vanio Anibal Macamo',
                'morada' => ' Hulene A, Rua 15',
                'email' => 'macamovanioanibal@gmail.com',
                'contacto' => '844962036',
                'genero' => 'Masculino',
                'num_bi' => '123131213I',
                'user_id' => '2',
                'departamento_id' => '2',
                'tipo_id' => '1'
            ],
            [
                'nome' => 'Victoria Nhatsave',
                'morada' => 'Maputo Laulane',
                'email' => 'viv@example.com',
                'contacto' => '8222222222',
                'genero' => 'Feminino',
                'num_bi' => '1231312113J',
                'user_id' => '3',
                'departamento_id' => '2',
                'tipo_id' => '1'
            ]
        ];

        DB::beginTransaction();

        try {
            foreach ($funcionarios as $funcionario) {
                Funcionario::create($funcionario);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();
    }
}
