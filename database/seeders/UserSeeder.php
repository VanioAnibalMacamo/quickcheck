<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Antonio Gabriel',
                'email' => 'antonio@example.com',
                'password' => Hash::make('senha1')
            ],
            [

                
                'name' => 'Vanio Macamo',
                'email' => 'macamovanioanibal@gmail.com',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Victoria Nhatsave',
                'email' => 'vivi@example.com',
                'password' => Hash::make('senha2')
            ]
        ];

        DB::beginTransaction();

        try {
            foreach ($users as $user) {
                User::create($user);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }

        DB::commit();
    }
}
