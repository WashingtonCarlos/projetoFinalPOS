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
        DB::table('escolas')->insert([
            [
                'nome_da_escola' => 'Escola Fulano',
                'diretor' => 'Fulano de Tal',
                'ViceDiretor' => 'Aquele da ai',
                'email' => 'fulano@gmail.com',
                'endereco' => 'Rua dos Fulanos, 20 Bairro Fulano',
                'telefone' => '(34) 9199-1856'
            ]
        ]);
    }
}
