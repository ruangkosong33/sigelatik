<div class="col-lg-12">
    <x-card>
        <div class="card-header">
            <h4>{{ $entrance->comments()->count() }} KOMENTAR</h4>
        </div>
        <div class="card-body">
            @php
                $comments = $entrance
                    ->comments()
                    ->with('user')
                    ->paginate(10);
            @endphp
            <div class="timeline timeline-inverse">

                @foreach ($comments as $item)
                    <div>
                        <i class="fas fa-envelope bg-primary"></i>
                        <div class="timeline-item">
                            <span class="time">{{ $item->created_at }}</span>
                            <h3 class="timeline-header">
                                {{ $item->user->name }}
                            </h3>
                            <div class="timeline-body">
                                {!! $item->content !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-3">
                {!! $comments->links() !!}
            </div>
        </div>
        <div class="card-footer">
            <form action="{{ route('entrance.comment', $entrance) }}" method="post">
                @csrf
                @method('post')
                @include('admin.components.textarea', [
                    'title' => 'Balas Komentar',
                    'name' => 'content',
                    'item' => null,
                ])
                <br>
                <button type="submit" class="btn-success btn">Tambah Komentar</button>
            </form>
        </div>
    </x-card>
</div>
