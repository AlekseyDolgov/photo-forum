<div class="card mb-3">
    <div class="card-header">
        <div class="level">
            <div class="flex">
                <a href="">
                    {{ $reply->owner->name }}
                </a> написал {{ $reply->created_at->format('d-m-Y') }} в {{ $reply->created_at->format('H:i:s') }}
            </div>
            <div>
                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-light" {{ $reply->isFavorited() ? 'disabled' : '' }}>
                        {{ $reply->favorites_count }}
                        <i class="bi bi-star-fill" style="color: #c9302c"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ $reply->body }}
    </div>
    @can ('update', $reply)
        <div class="card-footer">
            <form method="POST" action="/replies/{{ $reply->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-xs">Удалить</button>
            </form>
        </div>
    @endcan
</div>
