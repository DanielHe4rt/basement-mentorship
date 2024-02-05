@extends('layout.app')

@section('content')

    <section class="hero bg-primary text-white py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('assets/landing-hero.svg') }}" alt="Hero Image" class="img-fluid rounded-circle mt-3">
                </div>
                <div class="col-md-6">
                    <h1 class="display-5">Mentorias para Pessoas Desenvolvedoras</h1>
                    <p class="lead">Vou te ajudar a revisar os fundamentos necessários da programação pra você não vacilar nas entrevistas de emprego :D</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sobre Section -->
    <section class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Sobre Mim</h2>
                    <p>My name is Daniel Reis, a.k.a DanielHe4rt. I currently live in São Paulo, Brazil, and my goal is to help many developers to achieve their goals as soon as possible.</p>
                    <p>I founded He4rt Developers in 2018, a community focused on helping junior developers in their baby-steps. For 5 years I led and learned community management there, and now my next step is to create a global community. (soon)</p>
                    <p>I've also been streaming LiveCoding sessions on Twitch.tv almost daily since 2018 by learning concepts and teaching at the same time, elevating the "Learn in Public" concept to a whole new level. With that, I started to write articles on Dev.to and create videos on YouTube, which was the game-changer action for my Career as a Developer.</p>
                </div>
                <div class="col-lg-6 text-center mt-4">
                    <img src="https://github.com/danielhe4rt.png" alt="About Image" class="img-fluid rounded-circle">
                </div>
            </div>
        </div>
    </section>

    <!-- Depoimentos Section -->
    <section class="testimonials bg-light py-5">
        <div class="container">
            <h2 class="text-center">Depoimentos</h2>
            <p class="lead text-center">Veja o que meus antigos mentorados têm a falar do meu processo de ensino</p>
            <div class="row owl-carousel owl-theme">
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card">
                        <img src="https://github.com/danielhe4rt.png" alt="Testimonial 1" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Daniel Reis</h5>
                            <p><span class="badge bg-success">Mid Back-end - SoftwareFodaINC</span></p>
                            <p class="card-text">"I've been following DanielHe4rt for a long time, and I can say that he is a great mentor. He has helped me a lot in my career as a developer."</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="me-2"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Adicione mais depoimentos conforme necessário -->
            </div>
        </div>
    </section>

    <!-- Métricas Section -->
    <section class="metrics py-5">
        <div class="container text-center">
            <h2>Métricas</h2>
            <p class="lead">Acompanhe o impacto das nossas mentorias através das seguintes métricas:</p>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users"></i> Alunos</h5>
                            <p class="card-text">Quantidade de alunos: 100</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-check-circle"></i> Mentorias Realizadas</h5>
                            <p class="card-text">Quantidade de mentorias realizadas: 500</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-spinner"></i> Mentorias em Andamento</h5>
                            <p class="card-text">Quantidade de mentorias em andamento: 50</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Página de Doação -->
    <section class="donate py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Contribua para nossa causa</h2>
                    <p>Seu apoio é fundamental para continuarmos oferecendo mentorias de qualidade aos desenvolvedores. Escolha uma das opções abaixo para fazer sua doação:</p>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="pix-tab" data-bs-toggle="tab" href="#pix">
                                <i class="fas fa-money-bill-alt"></i> PIX
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="twitch-tab" data-bs-toggle="tab" href="#twitch">
                                <i class="fab fa-twitch"></i> Inscrição na Twitch
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="github-tab" data-bs-toggle="tab" href="#github">
                                <i class="fab fa-github"></i> GitHub Sponsors
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="pix">
                            <p>Utilize a chave PIX abaixo para fazer sua doação:</p>
                            <code>chave-pix@exemplo.com</code>
                        </div>
                        <div class="tab-pane fade" id="twitch">
                            <p>Faça sua doação durante nossas transmissões na Twitch.</p>
                            <p><a href="https://www.twitch.tv/seu-canal" target="_blank">Assista agora</a></p>
                        </div>
                        <div class="tab-pane fade" id="github">
                            <p>Torne-se um patrocinador no GitHub para apoiar nosso trabalho.</p>
                            <p><a href="https://github.com/sponsors/seu-usuario" target="_blank">Patrocinar no GitHub</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contato Section -->
    <section class="contact py-5">
        <div class="container text-center">
            <h2>Entre em Contato</h2>
            <p>Conecte-se comigo nas redes sociais:</p>
            <a href="https://www.linkedin.com/in/seu-nome" target="_blank" class="me-3"><i class="fab fa-linkedin"></i></a>
            <a href="https://twitter.com/seu-usuario" target="_blank" class="me-3"><i class="fab fa-twitter"></i></a>
            <a href="https://github.com/seu-usuario" target="_blank" class="me-3"><i class="fab fa-github"></i></a>
        </div>
    </section>

@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script>
        var slider = tns({
            container: '.owl-carousel',
            items: 3,
            slideBy: 1,
            mode: 'carousel',
            controls: false,
            nav: false,
            autoplay: true
        });
    </script>
@endsection
