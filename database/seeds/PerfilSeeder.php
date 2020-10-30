<?php

use App\Models\Perfil;
use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create([
            'nome' => 'master',
            'descricao' => 'Master',
        ]);

        Perfil::create([
            'nome' => 'aluno',
            'descricao' => 'Aluno',
        ]);

        Perfil::create([
            'nome' => 'administrador',
            'descricao' => 'Administrador',
        ]);
    }
}
