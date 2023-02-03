<x-layout>
    <x-slot name='title'> Wallaulab - Homepage </x-slot>
    <div id="uploadButton">
        <a href="{{ Route('ads.create') }}"><i class="bi bi-plus-lg"></i></a>
    </div>
    <section>
        <img src="/media/bienvenido-a-wallaulab-banner.png" class="img-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 text-right m-text-center">
                    <h1>{{ __('Últimos anuncios añadidos') }}:</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="container my-3">
        <div class="row">
            @forelse($ads as $ad)
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
                            <a href="{{route("ads.show", $ad)}}" class="btn btn-primary">{{ __('Mostrar Más') }}</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <h2>{{ __('Uyy.. parece que no hay nada') }}</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-success">{{ __('Vende tu primer objeto') }}</a>
                {{ __('o') }} <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Vuelve a la home') }}</a>
            </div>
            @endforelse
    </section>
</x-layout>
