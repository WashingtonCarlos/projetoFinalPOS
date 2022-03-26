<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            [
                'cep' => '38035-620',
                'nome' => 'Fulano de Tal',
                'cpf' => '07453775647',
                'cidade' => 'Uberaba',
                'estado' => 'Minas Gerais',
                'telefone' => '(34) 9199-1856',
                'endereco' => 'Rua dos Fulanos, 20 Bairro Fulano',
                'nivel_de_acesso' => '2',
                'email' => 'fulano@gmail.com',
                'password' => bcrypt('12345678')
            ],

            [
                'cep' => '38035-620',
                'nome' => 'Fulano de Tal 2',
                'cpf' => '00000000000',
                'cidade' => 'Uberaba',
                'estado' => 'Minas Gerais',
                'telefone' => '(34) 9199-1856',
                'endereco' => 'Rua dos Fulanos, 20 Bairro Fulano',
                'nivel_de_acesso' => '1',
                'email' => 'fulano@gmail.com',
                'password' => bcrypt('12345678')
            ]
        ]);
    }
}
