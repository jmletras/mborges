@extends('app')

@section('content')
    <section class="intro-single">
        <div class="container mt-5">
            <h2>Denúncia: {{ $report->subject }}</h2>

            <p><strong>Estado:</strong> {{ ucfirst($report->status) }}</p>

            <hr>

            @include('whistle.partials.messages', [
                'messages' => $messages,
            ])

            <hr>

            <form method="POST" action="{{ url('/denuncias/' . $report->uuid . '/responder') }}">
                @csrf

                <div class="form-group">
                    <label>Nova mensagem</label>
                    <textarea name="message" class="form-control" required></textarea>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ url('/denuncias') }}" class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
