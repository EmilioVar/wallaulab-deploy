<div class='col-12 col-md-4'>
    <div class='card mb-5'>
        @if ($ad->images()->count() > 0)
        <img src="{{ $ad->images()->first()->getUrl(400,300) }}" class="card-img-top" alt="...">
        @else
        <img src="https://picsum.photos/400/300?{{ $loop->index }}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
            <h5 class="card-title"> {{ $ad->title }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }} €</h6>
                <p class="card-text">{{ $ad->body }}</p>
                <div class="card-subtitle mb-2">
                    <strong><a
                        href="{{route('category.ads',$ad->category)}}">#{{ $ad->category->name }}</a></strong>
                    <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                </div>
                <div class="card-subtitle mb-2">
                    <small>{{ $ad->user->name }}</small>
                </div>
                <div class="row">
                    <div class="col-6">
                        <a href="{{route("ads.show", $ad)}}" class="btn btn-primary">{{ __('Mostrar Más') }}</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <p>visitas: {{ $ad->countViews }}</p>
                    </div>
                </div>
                @if(auth()->check())
                <div class="row">
                    <div class="container">
                        <div class="col-12 d-flex justify-content-center">
                            <livewire:favorites-button :ad="$ad"/>
                        </div>
                    </div>
                </div>
                @endif
        </div>
    </div>
</div>