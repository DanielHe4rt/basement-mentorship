@props([
    'tasks',
    'userTasks'
])

<h1>Task List</h1>
<p>Here's the mentoring roadmap.</p>

@foreach($tasks as $task)

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-2">
                <img src="{{ 'https://github.com/danielhe4rt.png' }}" width="200" class="img-fluid rounded-start"
                     alt="...">
            </div>
            <div class="col">
                <div class="card-body">
                    <h5 class="card-title">#{{ $task->id }} - {{ $task->title }}</h5>
                    <p class="card-text">
                        Nessa etapa você vai ter que escrever um resumo sobre uma tecnologia bem básica.
                    </p>

                    <div class="row">
                        <div class="col">
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-calendar"></i>: {{ $task->created_at->diffForHumans() }}
                                </small>
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-user"></i>: 10
                                </small>
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-user-check"></i>: 2
                                </small>
                            </p>
                        </div>
                        <div class="col text-right">
                            @if($userTask = $userTasks->find($task))

                                @if($userTask->status == 'completed')
                                    <a href="#" class="btn btn-success">Task Completed!</a>
                                @else
                                    <a href="{{ route('tasks.show', ['taskProgress' => $userTask]) }}"
                                       class="btn btn-primary">View Task</a>
                                @endif

                            @else
                                <form method="POST" action="{{ route('tasks.init', ['task' => $task->id]) }}">
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
