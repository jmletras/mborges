@extends('app')

@section('content')
    <section class="intro-single">
        <div class="container mt-5">
            <h2>Denúncias</h2>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Assunto</th>
                        <th>Estado</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>
                                <a href="{{ url('admin/denuncias/' . $report->id) }}">
                                    {{ $report->subject }}
                                </a>
                            </td>
                            <td>{{ $report->status }}</td>
                            <td>{{ $report->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $reports->links() }}
        </div>
    </section>
@endsection
