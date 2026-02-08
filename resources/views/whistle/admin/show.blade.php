@extends('app')

@section('content')
    <section class="intro-single">
        <div class="container mt-5">
            <h2>{{ $report->subject }}</h2>

            <p>
                <strong>Estado atual:</strong>
                <span class="badge badge-info">
                    {{ $report->status === 'novo' ? 'Novo' : ($report->status === 'analise' ? 'Em análise' : 'Fechado') }}
                </span>
                <br>
                <strong>Anónimo:</strong> {{ $report->is_anonymous ? 'Sim' : 'Não' }}
            </p>

            {{-- Dados do denunciante (apenas se NÃO for anónimo) --}}
            @if (!$report->is_anonymous)
                <div class="alert alert-secondary">
                    <strong>Dados do denunciante</strong><br>

                    Nome:
                    {{ $report->name ?? 'Não indicado' }}<br>

                    Email:
                    {{ $report->email ?? 'Não indicado' }}
                </div>
            @else
                <div class="alert alert-warning">
                    Esta denúncia foi submetida de forma anónima.
                </div>
            @endif

            <hr>

            @include('whistle.partials.messages', [
                'messages' => $report->messages,
            ])

            <hr>

            <form method="POST" action="{{ url('admin/denuncias/' . $report->id . '/responder') }}">
                @csrf

                <div class="form-group">
                    <label>Mensagem</label>
                    <textarea name="message" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <select name="status" class="form-control" {{ $report->status === 'fechado' ? 'disabled' : '' }}>
                        <option value="novo" {{ $report->status === 'novo' ? 'selected' : '' }}>
                            Novo
                        </option>
                        <option value="analise" {{ $report->status === 'analise' ? 'selected' : '' }}>
                            Em análise
                        </option>
                        <option value="fechado" {{ $report->status === 'fechado' ? 'selected' : '' }}>
                            Fechado
                        </option>
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ url('admin/denuncias') }}" class="btn btn-secondary">
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
