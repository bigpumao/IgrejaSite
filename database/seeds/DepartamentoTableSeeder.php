<?php

use Illuminate\Database\Seeder;
use App\Model\Departamento\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(
            [
                'departamento'  =>      'Rede de Mulheres',
            ]

        );
        Departamento::create(
            [
                'departamento'  =>      'Rede de Homens',
            ]

        );
        Departamento::create(
            [
                'departamento'  =>      'Rede Jeans',
            ]

        );
        Departamento::create(
            [
                'departamento'  =>      'Rede Teens',
            ]

        );
        Departamento::create(
            [
                'departamento'  =>      'Rede Kids',
            ]

        );
        Departamento::create(
            [
                'departamento'  =>      'Rede de Células',
            ]

        );
        Departamento::create(
            [
                'departamento'  =>      'Treinamento de Líderes de Células',
            ]

        );
        Departamento::create(
            [
                'departamento'  =>      'Treinamento Avançado de Líderes',
            ]

        );

        Departamento::create(
            [
                'departamento'  =>      'Escola Bíblica Dominical',
            ]

        );
        Departamento::create(
            [
                'departamento'  =>      'Geral',
            ]

        );
    }
}
