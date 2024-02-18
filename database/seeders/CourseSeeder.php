<?php

namespace Database\Seeders;

use App\Models\Module\Module;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mentorings = [
            [
                'name' => 'Desenvolvimento para Iniciantes',
                'description' => 'A trilha é feita para pessoas que não tem o conhecimento dos fundamentos da internet.',
                'thumbnail_url' => 'https://i.imgur.com/Zb2du2E.jpeg',
                'tasks' => [
                    [
                        'content' => [
                            'title' => 'Redação ENEM Tech',
                            'thumbnail_url' => 'https://i.imgur.com/uILTzpv.jpeg',
                            'description' => 'Escreva um texto dissertativo-argumentativo sobre a importância da tecnologia na sociedade.',
                            'deadline' => now()->addDays(7),
                            'order' => 1,
                            'tips' => [
                                'https://www.w3schools.com/html/',
                                'https://developer.mozilla.org/pt-BR/docs/Web/HTML'
                            ],
                        ],
                        'todos' => [
                            ['description' => 'Faça um rascunho das suas ideias'],
                            ['description' => 'Valide as fontes de informação e cite-as no texto'],
                            ['description' => 'Escreva algo com inicio, meio e fim.']
                        ],
                    ],
                    [
                        'content' => [
                            'title' => 'Browsers são FODAS!',
                            'thumbnail_url' => 'https://i.imgur.com/eAhXBii.jpeg',
                            'description' => 'Entenda como os navegadores funcionam e como eles interpretam o HTML, CSS e JavaScript.',
                            'deadline' => now()->addDays(14),
                            'order' => 2,
                            'tips' => [
                                'https://www.w3schools.com/css/',
                                'https://developer.mozilla.org/pt-BR/docs/Web/CSS'
                            ]
                        ],
                        'todos' => [
                            ['description' => 'Faça um rascunho das suas ideias'],
                        ],
                    ],
                    [
                        'content' => [
                            'title' => 'Banco de Dados: uma abordagem pragmática',
                            'thumbnail_url' => 'https://i.imgur.com/chABRAr.jpeg',
                            'description' => 'Antes de escolher um banco de dados, entenda as diferenças entre os tipos de bancos de dados.',
                            'deadline' => now()->addDays(21),
                            'order' => 3,

                            'tips' => [
                                'https://www.w3schools.com/js/',
                                'https://developer.mozilla.org/pt-BR/docs/Web/JavaScript'
                            ],
                        ],
                        'todos' => [
                            ['description' => 'Faça um rascunho das suas ideias'],
                        ],
                    ]
                ]
            ]
        ];


        foreach ($mentorings as $mentoring) {
            /** @var Module $module */
            $tasks = $mentoring['tasks'];
            unset($mentoring['tasks']);

            $module = Module::query()->create($mentoring);
            foreach ($tasks as $task) {

                $taskModel = $module->tasks()->create($task['content']);

                foreach($task['todos'] as $todo) {
                    $taskModel->todos()->create($todo);
                }
            }
        }
    }
}
