@extends('layout.app')

@section('breadcrumb')

@endsection

@section('content')

    <div class="container mt-5">
        @if($moduleAcceptance->status == \App\Enums\Module\ModuleAttendanceEnum::ON_HOLD)
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <h4>
                    <i class="fa-solid fa-hourglass-half"></i>
                    Inscrição em Análise
                </h4>
                Feita a inscrição é só esperar! O periodo de aprovação depende de:
                <ul>
                    <li>Quantidade de pessoas dentro da mentoria;</li>
                    <li>Tempo de cada pessoa para terminar as tarefas submetidas;</li>
                    <li>Meu tempo pra aceitar novos mentorados.</li>
                </ul>

                Um dos critérios de aceitação é baseado no seu texto de entrada também! Então, espero que você tenha
                caprichado lá.
                Caso sua inscrição tenha sido aceita, você receberá um e-mail com instruções de como continuar e terá o
                acesso aqui liberado.
                <br><br>

                Até breve!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif
        <h2>Dashboard</h2>
        <div class="col">
            <div class="card">
                <div class="row g-0">
                    <img src="{{ $user->image_url }}" class="img-fluid col-2 object-fit-cover"
                         alt="...">
                    <div class="col-10">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }} <small>({{ $user->github_username }})</small></h5>
                            <i class="card-text">
                                {{ $user->description }}
                            </i>
                        </div>
                        <div class="card-body">
                            <p>
                                <i class="fas fa-briefcase"></i> Foco em: {{ str($details->role)->ucfirst() }}
                                <i class="fas fa-venus-mars"></i> Pronomes: {{ $details->pronouns->value }}
                                <i class="fas fa-level-up-alt"></i>
                                Nível: {{ str($details->seniority->value)->ucfirst() }}
                            </p>
                            <a href="https://github.com/{{ $user->github_username }}" target="_blank"
                               class="btn btn-primary">
                                <i class="fa-brands fa-github"></i> Github
                            </a>
                            <a href="https://twitter.com/{{ $details->twitter_handle }}" target="_blank"
                               class="btn btn-primary">
                                <i class="fa-brands fa-twitter"></i> Twitter
                            </a>
                            <a href="https://dev.to/{{ $details->devto_handle }}" target="_blank"
                               class="btn btn-primary">
                                <i class="fa-brands fa-dev"></i> Dev.to
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($moduleAcceptance)
            <h3 class="mt-3">Trilha em andamento:</h3>
            <div class="card bg-light mb-3">
                <div class="row">
                    <img src="{{ $moduleAcceptance->module->thumbnail_url }}"
                         class="col-3 col-md-2 img-fluid object-fit-cover" alt="...">
                    <div class="card-body col-9 col-md-10">
                        <div class="card-text">
                            <div class="badge text-bg-{{$moduleAcceptance->status->getColor() }}">
                                {{ $moduleAcceptance->status->getLabel() }}
                            </div>
                        </div>
                        <div>
                            <h3>
                                {{ $moduleAcceptance->module->name }}
                            </h3>
                            <p class="card-text">
                                {{ $moduleAcceptance->module->description }}
                            </p>
                            <small class="text-body-secondary">
                                <i class="fa-solid fa-calendar"></i>: {{ $moduleAcceptance->module->created_at->format('d/m/Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <div class="row mt-4 justify-content-center">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-body text-center ">
                            <h5 class="card-title">
                                <i class="fas fa-spinner text-info"></i>
                                Se inscreva em uma trilha
                            </h5>
                            <p>O quanto antes você inscrever-se, antes você terá chances de ser aprovado/a!</p>
                            <a href="{{ route('module.index') }}" class="btn btn-info text-white">
                                Pagina de Trilhas
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($moduleAcceptance && $moduleAcceptance->status == \App\Enums\Module\ModuleAttendanceEnum::ACCEPTED)
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-body text-center ">
                            <h5 class="card-title">
                                <i class="fas fa-check-circle text-success"></i>
                                Tarefas concluidas
                            </h5>
                            <p>Tarefas submetidas e aprovadas:</p>
                            <a class="btn btn-success text-white">{{ $completedTasks .'/'.  $moduleAcceptance->module->tasks()->count() }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                <i class="fas fa-spinner text-info"></i>
                                Tarefa em Andamento
                            </h5>
                            <p>Tá devendo tarefinha é? Se liga quantas:</p>
                            <a class="btn btn-info text-white">{{ '' }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-light text-center">
                        <div class="card-body">
                            <h5 class="card-title ">
                                <i class="fas fa-tasks text-info"></i>
                                Tarefa ativa
                            </h5>
                            <p>Clique aqui para acessar sua última tarefa:</p>
                            <a href="{{ '' }}" class="btn btn-primary">Ir para Tarefa</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

@endsection
