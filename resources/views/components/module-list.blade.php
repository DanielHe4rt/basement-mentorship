@props([
    'modules',
    'userModules'
])

<h1>Task List</h1>
<p>Here's the mentoring roadmap.</p>

@foreach($modules as $module)

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-2">
                <img src="{{ 'https://github.com/danielhe4rt.png' }}" width="200" class="img-fluid rounded-start"
                     alt="...">
            </div>
            <div class="col">
                <div class="card-body">
                    <h5 class="card-title">#{{ $module->id }} - {{ $module->name }}</h5>
                    <p class="card-text">
                        {{ $module->description }}
                    </p>

                    <div class="row">
                        <div class="col">
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-calendar"></i>: {{ $module->created_at->diffForHumans() }}
                                </small>
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-user"></i>: {{ $module->users()->count() }}
                                </small>
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-user-check"></i>: 2
                                </small>
                            </p>
                        </div>
                        <div class="col text-right">
                            @if($userModule = $userModules->find($module))
                                <a href="{{ route('modules.show', ['module' => $module]) }}"
                                   class="btn btn-primary">View Module</a>
                            @else
                                <form method="POST" action="{{ route('module.init', ['module' => $module]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Start Task</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endforeach
