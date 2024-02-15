@extends('layout.app')


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

    <h1>Your Task</h1>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-2">
                <img src="{{ 'https://github.com/danielhe4rt.png' }}" width="200" class="img-fluid rounded-start"
                     alt="...">
            </div>
            <div class="col">
                <div class="card-body">
                    <h5 class="card-title">#1 - Redação ENEM Tech</h5>
                    <p class="card-text">
                        Nessa etapa você vai ter que escrever um resumo sobre uma tecnologia bem básica.
                    </p>

                    <div class="row">
                        <div class="col">
                            <p class="card-text">
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-calendar"></i>: 4 Feb
                                </small>
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-user"></i>: 10
                                </small>
                                <small class="text-body-secondary">
                                    <i class="fa-solid fa-user-check"></i>: 2
                                </small>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <form id="taskForm" method="POST" action="">
        @csrf
        <div class="row">
            <div class="col">
                <div class="alert alert-light">
                <h3>Task Checklist</h3>
                @foreach($taskProgress->task->todos as $todo)
                    <div class="form-check">
                        <input class="form-check-input" name="todos[{{$todo->id}}]" type="checkbox"  id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $todo->description }}
                        </label>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="col">
                <div class="alert alert-info">
                    <h4>Tips</h4>
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
        <label for="codeMirror"></label>
        <textarea name="content" id="codeMirror"></textarea>

        <button id="btnSubmit" class="btn btn-success">Enviar</button>
        <button id="btnDraft" class="btn btn-info">Salvar Rascunho</button>
    </form>
@endsection


@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/theme/darcula.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/6.65.7/codemirror.min.js"></script>

    <script>
        const btnDraftEl = document.getElementById('btnDraft');
        const btnSubmitEl = document.getElementById('btnSubmit');
        const formEl = document.getElementById('taskForm');
        const taskId = '{{$taskProgress->id}}';


        btnDraftEl.addEventListener('click', function (e) {
            let uri = `/tasks/${taskId}/draft`;
            formEl.setAttribute('action', uri)
            formEl.submit();
        })

        btnSubmitEl.addEventListener('click', function (e) {
            let uri = `/tasks/${taskId}/submit`;
            formEl.setAttribute('action', uri)
            formEl.submit();
        })
    </script>
    <script>
        let codeMirrorEl = document.getElementById('codeMirror');
        var myCodeMirror = CodeMirror.fromTextArea(codeMirrorEl, {
            lineNumbers: true,
            theme: 'darcula'
        });
    </script>

@endsection
