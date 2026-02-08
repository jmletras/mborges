@extends('app')

@section('content')
    <section class="intro-single">
        <div class="container mt-5">
            <h2>Acompanhar denúncia</h2>

            <p class="text-muted">
                Introduza o código fornecido no momento da submissão.
            </p>

            <form method="GET" action="{{ url('/denuncias/acompanhar') }}">
                <div class="form-group">
                    <label>Código da denúncia</label>
                    <input type="text" name="uuid" class="form-control" required>
                </div>

                <button class="btn btn-primary">Acompanhar</button>
            </form>
        </div>
    </section>
@endsection
