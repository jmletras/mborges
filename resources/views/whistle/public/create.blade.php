@extends('app')

@section('content')
    <section class="intro-single">
        <div class="container mt-5">
            <h2>Canal de Denúncias</h2>

            <p class="text-muted">
                Este canal permite a comunicação segura de irregularidades.
            </p>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>Nova denúncia</h5>
                            <p>
                                Submeta uma denúncia de forma anónima ou identificada.
                            </p>
                            <a href="#form-denuncia" class="btn btn-success">
                                Criar denúncia
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>Acompanhar denúncia</h5>
                            <p>
                                Já submeteu uma denúncia? Use o código atribuído.
                            </p>
                            <a href="{{ url('/denuncias/acompanhar-form') }}" class="btn btn-primary">
                                Acompanhar
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <hr id="form-denuncia">

            <p class="text-muted text-warning">
                O uso abusivo deste canal ou a submissão de denúncias falsas
                pode ter consequências legais.
            </p>

            {{-- FORMULÁRIO EXISTENTE --}}
            <form method="POST" action="{{ url('/denuncias') }}" enctype="multipart/form-data">
                @csrf

                @include('whistle.partials.form')

                <p class="text-muted mt-3">
                    Ao submeter a denúncia, declara que leu a
                    <a href="{{ url('/denuncias/politica') }}" target="_blank">
                        Política de Denúncias
                    </a>.
                </p>

                <button type="submit" class="btn btn-success">
                    Submeter denúncia
                </button>
            </form>
        </div>
    </section>
@endsection
