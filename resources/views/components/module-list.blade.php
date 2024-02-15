@props([
    'modules',
    'userModules'
])

<h1>Trilhas de Mentorias</h1>
<p>Selecione a que tiver mais com </p>

<div class="row">
    @foreach($modules as $module)
        <div class="col-12 col-md-3">
            <div class="card mb-3">
                <img src="https://github.com/danielhe4rt.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="card-text d-flex justify-content-between flex-row mb-3">
                        <div>
                            <small class="text-body-secondary">
                                <i class="fa-solid fa-user"></i>: {{ $module->users()->count() }}
                            </small>
                            <small class="text-body-secondary">
                                <i class="fa-solid fa-user-check"></i>: 2
                            </small>
                        </div>
                        <small class="text-body-secondary">
                            <i class="fa-solid fa-calendar"></i>: {{ $module->created_at->format('d/m/Y') }}
                        </small>
                    </div>

                    <h5 class="card-title">#{{ $module->id }} - {{ $module->name }}</h5>
                    <p class="card-text">
                        {{ $module->description }}
                    </p>

                    <div>
                        @if($userModule = $userModules->find($module))
                            <a href="{{ route('modules.show', ['module' => $module]) }}"
                               class="btn btn-primary d-grid">
                                Ver Trilha
                            </a>
                        @else
                            <form method="POST" action="{{ route('module.init', ['module' => $module]) }}">
                                @csrf
                                <button type="submit" class="btn btn-info d-grid">Iniciar Trilha</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    @endforeach
</div>
