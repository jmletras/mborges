@extends('app')

@section('content')
    <section class="intro-single">
        <div class="container mt-5">
            <h2>Denúncia submetida</h2>

            <div class="alert alert-success">
                Guarde este código para acompanhar a denúncia:
                <strong>{{ $uuid }}</strong>
            </div>

            <a href="{{ url('/denuncias/acompanhar?uuid=' . $uuid) }}" class="btn btn-primary">
                Acompanhar denúncia
            </a>
        </div>
    </section>
@endsection
