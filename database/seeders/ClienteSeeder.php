<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Cliente Exemplo',
            'endereco' => 'Rua Exemplo, 123',
            'telefone' => '11999999999999',
            'cpf' => '12345678912',
            'email' => 'cliente@exemple.com',
            'senha' => bcrypt('senha123'),
        ]);

        Cliente::create([
            'nome' => 'Renata Silva',
            'endereco' => 'Rua Armando Silva, 765',
            'telefone' => '11999999999999',
            'cpf' => '187654569',
            'email' => 'renata@exemple.com',
            'senha' => bcrypt('senha098'),
        ]);
    }
}
