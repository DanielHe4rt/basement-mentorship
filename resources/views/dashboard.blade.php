@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <h2>Dashboard</h2>
        <div class="col">
            <div class="card">
                <div class="row g-0">
                    <div class="col">
                        <img src="{{ 'https://github.com/danielhe4rt.png' }}" class="img-fluid rounded-start"
                             alt="...">
                    </div>
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


        <p class="lead mt-4">Acompanhe o impacto das nossas mentorias através das seguintes métricas:</p>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-body text-center ">
                        <h5 class="card-title">
                            <i class="fas fa-check-circle text-success"></i>
                            Mentorias concluidas
                        </h5>
                        <p>Tarefas submetidas e aprovadas:</p>
                        <a class="btn btn-success text-white">1</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">
                            <i class="fas fa-spinner text-info"></i>
                            Mentorias em Andamento
                        </h5>
                        <p>Tá devendo tarefinha é? Se liga quantas:</p>
                        <a class="btn btn-info text-white">1</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light text-center">
                    <div class="card-body" >
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
    </div>

@endsection
