<section id="design">
    <div class="container">
        <div class="row g-4">

            @foreach ($cards as $card)
                <div class="col">
                    <a href="{{ route('canvas.show', $card->id) }}">
                        <div class="card h-100 custom-card">
                            <img src="{{ asset($card->image_path) }}" class="card-img-top" alt="{{ $card->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->title }}</h5>
                                <p class="card-text">{{ $card->description }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-body-secondary">{{ $card->last_updated }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
