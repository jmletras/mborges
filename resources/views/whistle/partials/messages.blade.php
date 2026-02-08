@foreach ($messages as $message)
    <div class="card mb-2">
        <div class="card-body">
            <small class="text-muted">
                {{ $message->sender_type === 'admin' ? 'Gestor' : 'Denunciante' }}
                — {{ $message->created_at }}
            </small>
            <p class="mt-2">{{ $message->message }}</p>
        </div>
    </div>
@endforeach
