@props([
    'tasks',
    'userTasks'
])


<div class="row">
    @foreach($tasks as $task)
        <div class="col-12 col-md-6">
            <div class="card mb-3">
                <div class="row g-0">

                    <img src="{{ $task->thumbnail_url }}"
                         class="col-3 img-fluid object-fit-cover rounded-start"
                         alt="...">

                    <div class="col">
                        <div class="card-body">
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-calendar"></i>: {{ $task->created_at->diffForHumans() }}
                                </small>
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-user"></i>: {{ $task->progress()->count() }}
                                </small>
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-user-check"></i>: {{ $task->progress()->where('status' , 'completed')->count() }}
                                </small>
                            </p>
                            <h5 class="card-title">#{{ $task->id }} - {{ $task->title }}</h5>
                            <p class="card-text">
                                {{ $task->description }}
                            </p>

                            <div class="row">
                                <div class="col-12 col-md-6 text-right mt-2">
                                    @if($userTask = $userTasks->first(fn ($userTask) => $userTask->task_id == $task->id))
                                        @if($userTask->status == 'completed')
                                            <a href="#" class="btn btn-success">Task Completed!</a>
                                        @else
                                            <a href="{{ route('tasks.show', ['taskProgress' => $userTask, 'module' => $task->module_id]) }}"
                                               class="btn btn-primary">Continuar Tarefa</a>
                                        @endif
                                    @else
                                        <form method="POST"
                                              action="{{ route('tasks.init', ['task' => $task->id, 'module' => $task->module_id]) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-dark d-grid">Iniciar Tarefa</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
