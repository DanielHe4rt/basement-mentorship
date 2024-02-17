@extends('layout.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('module.index') }}">Mentorias</a></li>
        <li class="breadcrumb-item"><a href="{{ route('modules.show', $module) }}">{{'#' . $module->id  }} Mentoria</a>
        </li>
        <li class="breadcrumb-item active">{{'#' . $module->id  }} Tarefa</li>
    </ol>
@endsection

@section('content')

    @if($errors->hasAny())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-3">
        <div class="row g-0">

            <img src="{{ $taskProgress->task->thumbnail_url }}" class="img-fluid col-2 object-fit-cover rounded-start"
                 alt="...">

            <div class="col">
                <div class="card-body">
                    <p class="card-text">
                        <small class="text-body-secondary">
                            <i class="fa-solid fa-calendar"></i>: 4 Feb
                        </small>
                        <small class="text-body-secondary">
                            <i class="fa-solid fa-user"></i>: {{ $taskProgress->attendantsCount() }}
                        </small>
                        <small class="text-body-secondary">
                            <i class="fa-solid fa-user-check"></i>: {{ $taskProgress->where('status' , 'completed')->count() }}
                        </small>
                    </p>
                    <h5 class="card-title">{{ $taskProgress->task->title }}</h5>
                    <p class="card-text">
                        {{ $taskProgress->task->description }}
                    </p>

                    <span class="btn btn-{{ $taskProgress->status->getLabel() }}">
                        {{ $taskProgress->status->getMessage() }}
                    </span>
                </div>

            </div>
        </div>
    </div>
    <form id="taskForm" method="POST">
        @csrf
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="alert alert-warning h-100">
                    <div class="d-flex flex-column">
                        <h3>Lista de Tarefas</h3>
                        <p>Não são necessários, porém marcam aquele progresso.</p>
                    </div>
                    @foreach($taskProgress->task->todos as $todo)
                        <div class="form-check">
                            <input class="form-check-input" name="todos[{{$todo->id}}]" type="checkbox"
                                   id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $todo->description }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="alert alert-info h-100">
                    <h4>Dicas e Utilidades</h4>
                    <p>Aquela lista bacana pra te auxiliar na sua tarefa.</p>
                    <ul>
                        @foreach($taskProgress->task->tips as $tip)
                            <li>{{ $tip }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <hr>
        <h3>Task Resolution</h3>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="tab" href="#edit" aria-selected="true" role="tab">Edição</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="tab" href="#taskPreview" id="previewTrigger" aria-selected="false"
                   tabindex="-1" role="tab">Visualização</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade show active" id="edit" role="tabpanel">
                <label for="codeMirror"></label>
                <textarea name="content" id="codeMirror">{{ $taskProgress->content }}</textarea>
            </div>
            <div class="tab-pane fade" id="taskPreview" role="tabpanel">

            </div>
        </div>

        <br>
        <button id="btnSubmit" class="btn btn-success">Enviar</button>
        <button id="btnDraft" class="btn btn-info">Salvar Rascunho</button>
    </form>
@endsection


@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/darcula.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>


    <script type="module">
        import {marked} from "https://cdn.jsdelivr.net/npm/marked/lib/marked.esm.js";

        const previewTriggerEl = document.getElementById('previewTrigger')
        const taskPreviewEl = document.getElementById('taskPreview')
        const previewContent = document.getElementById('codeMirror');

        previewTriggerEl.addEventListener('click', function (e) {
            console.log(previewContent)
            taskPreviewEl.innerHTML = marked.parse(myCodeMirror.getValue());
        });


    </script>

    <script>
        const btnDraftEl = document.getElementById('btnDraft');
        const btnSubmitEl = document.getElementById('btnSubmit');
        const formEl = document.getElementById('taskForm');
        const taskId = '{{$taskProgress->id}}';
        const moduleId = '{{$module->id}}'

        btnDraftEl.addEventListener('click', function (e) {
            let uri = `{{ route('tasks.action', ['module' => $module->id, 'progress' => $taskProgress->id, 'action' => 'draft']) }}`;
            formEl.setAttribute('action', uri)
            formEl.submit();
        })

        btnSubmitEl.addEventListener('click', function (e) {
            let uri = `{{ route('tasks.action', ['module' => $module->id, 'progress' => $taskProgress->id, 'action' => 'submit']) }}`;
            formEl.setAttribute('action', uri)
            formEl.submit();
        })
    </script>
    <script>
        let codeMirrorEl = document.getElementById('codeMirror');
        const myCodeMirror = CodeMirror.fromTextArea(codeMirrorEl, {
            lineNumbers: true,
            theme: 'darcula'
        });


    </script>

@endsection
