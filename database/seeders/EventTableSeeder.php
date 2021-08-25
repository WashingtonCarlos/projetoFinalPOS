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
        DB::table('events')->insert([
            [
                'usuario_id' => 1,
                'motorista_id' => 1,
                'title' => 'Reunião',
                'start' => '2021-04-27 12:00:00',
                'end' => '2021-04-27 14:00:00',
                'color' => '#807fa8',
                'description' => 'A decisão do projeto e muito grande pra ser levado a serio',
                'nome_da_escola' => 'Escola Municipal Jobert de Carvalho'
            ],
            [
                'usuario_id' => 1,
                'motorista_id' => 1,
                'title' => 'Aula dia 5',
                'start' => '2021-04-28 12:00:00',
                'end' => '2021-04-28 14:00:00',
                'color' => '#5b7d68',
                'description' => 'O começo das aulas e complicado por conta do Corona Virus',
                'nome_da_escola' => 'Escola Municipal Frei Eugênio'
            ]
        ]);
    }
}
