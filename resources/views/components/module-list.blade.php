@props([
    'modules',
    'userModules'
])

<h1>Trilhas de Mentorias</h1>
<p>
    Se inscreva na que mais te interessar e comece a aprender com a comunidade.
</p>

<div class="row">
    @foreach($modules as $module)
        <div class="col-12 col-md-3">
            <div class="card mb-3">
                <img src="{{ $module->thumbnail_url }}" class="card-img-top object-fit-cover" alt="...">
                <div class="card-body">
                    <div class="card-text d-flex justify-content-between flex-row mb-3">
                        <div>
                            <small class="text-body-secondary">
                                <i class="fa-solid fa-user"></i>: {{ $module->users()->count() }}
                            </small>
                            <small class="text-body-secondary">
                                <i class="fa-solid fa-user-check"></i>: {{ $module->users()->where('status', 'finished')->count() }}
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

                            @if($userModule->pivot->status === \App\Enums\Module\ModuleAttendanceEnum::ACCEPTED)
                                <a href="{{ route('modules.show', ['module' => $module]) }}"
                                   class="btn btn-primary d-grid">
                                    Continuar Trilha
                                </a>
                            @elseif($userModule->pivot->status === \App\Enums\Module\ModuleAttendanceEnum::FINISHED)

                                <a href="{{ route('modules.show', ['module' => $module]) }}"
                                   class="btn btn-success d-grid">
                                    Trilha finalizada!
                                </a>
                            @else
                                <a href="{{ route('modules.show', ['module' => $module]) }}"
                                   class="btn btn-secondary d-grid">
                                    Aguardando Aprovação
                                </a>
                            @endif
                        @else
                            <form method="POST" action="{{ route('module.init', ['module' => $module]) }}">
                                @csrf
                                <button type="submit" class="btn btn-info d-grid w-100">Inscrever na Trilha</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    @endforeach
</div>
