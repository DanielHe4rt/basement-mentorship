@extends('layout.app')


@section('content')

    <h1 class="mt-2">Tarefas do módulo</h1>
    <p>Here's the mentoring roadmap.</p>
    <div class="card bg-light mb-3">
        <div class="row">
            <img src="https://github.com/danielhe4rt.png" class="col-3 col-md-2 img-fluid object-fit-cover" alt="...">
            <div class="card-body col-9 col-md-10">
                <div class="card-text">
                    <div>
                        <small class="text-body-secondary">
                            <i class="fa-solid fa-user"></i>: {{ $module->users()->count() }}
                        </small>
                        <small class="text-body-secondary">
                            <i class="fa-solid fa-user-check"></i>: 2
                        </small>
                    </div>
                </div>
                <div>
                    <h3>
                        {{ $module->name }}
                    </h3>
                    <p class="card-text">
                        {{ $module->description }}
                </p>
                    <small class="text-body-secondary">
                        <i class="fa-solid fa-calendar"></i>: {{ $module->created_at->format('d/m/Y') }}
                    </small>
                </div>
            </div>
        </div>
    </div>
    <x-task-list :tasks="$tasks" :userTasks="$userTasks"/>

@endsection
