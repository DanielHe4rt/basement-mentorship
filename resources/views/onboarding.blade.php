@extends('layout.app')

@section('content')

    <div class="container mt-5">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Ops!</h4>
                <p>Algo deu errado, por favor, verifique os campos e tente novamente.</p>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-6">
                <h2 class="mb-4">Onboarding Foda</h2>
                <p>
                    Este é o seu onboarding, aqui você pode nos contar um pouco mais sobre você, para que possamos te
                    ajudar
                    melhor.
                </p>
                <p>
                    Este é um formulário simples, mas que nos ajudará a entender melhor o que você busca e o que você
                    precisa.
                </p>
            </div>
            <div class="col">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="{{  $user->image_url }}" width="200"
                                 class="img-fluid rounded-start"
                                 alt="...">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h5 class="card-title">Perfil de {{ $user->name }}</h5>
                                <p class="card-text">
                                    {{ $user->description }}
                                </p>
                            </div>
                            <div class="card-body">
                                <a href="https://github.com/{{ $user->github_username }}" target="_blank"
                                   class="btn btn-primary">
                                    <i class="fa-brands fa-github"></i> Github
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('onboarding.store') }}" method="POST">
                    @csrf
                    <!-- Role -->

                    <div class="mb-3">
                        <label for="role" class="form-label">Área Desejada de estudo</label>
                        <select class="form-select" id="role" name="role" value="{{old('role')}}" required>
                            @foreach(\App\Enums\User\JobRoleEnum::cases() as $case)
                                <option value="{{ $case->value }}">{{ str($case->name)->replace('_', ' ') }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Seniority -->
                    <div class="mb-3">
                        <label for="seniority" class="form-label">Senioridade</label>
                        <select class="form-select" id="seniority" name="seniority" value="{{old('seniority')}}"
                                required>
                            @foreach(\App\Enums\User\SeniorityEnum::cases() as $case)
                                <option value="{{ $case->value }}">{{ str($case->name)->replace('_', ' ') }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Based In -->
                    <div class="mb-3">
                        <label for="based_in" class="form-label">Onde você se encontra hoje?</label>
                        <select class="form-select" id="based_in" name="based_in" value="{{old('based_in')}}" required>
                            @foreach(\App\Enums\User\BasedPlaceEnum::cases() as $base)
                                <option
                                    value="{{ $base->value }}">{{ str($base->name)->replace('_', ' ')->lower()->ucfirst() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pronouns -->
                    <div class="mb-3">
                        <label for="pronouns" class="form-label">Pronomes</label>
                        <select class="form-select" id="pronouns" name="pronouns" value="{{old('pronouns')}}" required>
                            @foreach(\App\Enums\User\PronounEnum::cases() as $base)
                                <option
                                    value="{{ $base->value }}">{{ str($base->name)->replace('_', '/')->lower() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Twitter Handle -->
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="twitter_handle" class="form-label">Perfil no Twitter</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">https://twitter.com/</span>
                                    <input type="text" class="form-control" id="twitter_handle"
                                           placeholder="danielhe4rt" name="twitter_handle"
                                           value="{{old('twitter_handle')}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- Dev.to Handle -->
                            <label for="devto_handle" class="form-label">Perfil no Dev.to</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">https://devto.com/</span>
                                <input type="text" class="form-control" id="devto_handle" placeholder="danielhe4rt"
                                       name="devto_handle" value="{{old('devto_handle')}}">
                            </div>
                        </div>
                    </div>

                    <!-- Comments -->
                    <div class="mb-3">
                        <label for="comments" class="form-label">Comentários</label>
                        <textarea class="form-control" id="comments" name="comments"
                                  rows="3">{{ old('comments') }}</textarea>
                        <i class="form-text text-muted">Nos conte um pouco mais sobre você, o que você busca e o que
                            você
                            precisa.</i>
                    </div>
                    <!-- Company -->
                    <div class="mb-3">
                        <label for="company" class="form-label">Qual empresa você trabalha? (caso trabalhe)</label>
                        <input type="text" class="form-control" id="company" name="company" value="{{old('company')}}"
                               required>
                    </div>

                    <label class="form-label">Você está</label>
                    <!-- Is Employed (Checkbox) -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="is_employed"
                               name="is_employed" @checked(old('is_employed'))>
                        <label class="form-check-label" for="is_employed">Atualmente empregado</label>
                    </div>

                    <!-- Switching Careers? (Checkbox) -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="switching_careers"
                               name="switching_careers" @checked(old('switching_careers'))>
                        <label class="form-check-label" for="switching_careers">Buscando mudar de carreira</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>


        </div>

@endsection
