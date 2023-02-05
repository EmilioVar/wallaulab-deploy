<x-layout>
    <h1 class="p-4">¡Bienvenido {{ Auth::user()->name }}!</h1>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Tienes subidos {{ $adsCount }} anuncios 🎉</h2>
            </div>
            @forelse($ads as $ad)
                <div class='col-12 col-md-4'>
                    <div class='card mb-5'>
                        @if ($ad->images()->count() > 0)
                            <img src="{{ $ad->images()->first()->getUrl(400, 300) }}" class="card-img-top" alt="...">
                        @else
                            <img src="https://picsum.photos/400/300?{{ $loop->index }}" class="card-img-top"
                                alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title"> {{ $ad->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $ad->price }} €</h6>
                            <p class="card-text">{{ $ad->body }}</p>
                            <div class="card-subtitle mb-2">
                                <strong><a
                                        href="{{ route('category.ads', $ad->category) }}">#{{ $ad->category->name }}</a></strong>
                                <i>{{ $ad->created_at->format('d/m/Y') }}</i>
                            </div>
                            <div class="card-subtitle mb-2">
                                <small>{{ $ad->user->name }}</small>
                            </div>
                            <a href="{{ route('ads.show', $ad) }}" class="btn btn-primary">{{ __('Mostrar Más') }}
                            </a>
                            <a href="{{ route('ads.edit', $ad) }}" class="btn btn-primary">{{ __('Editar') }}
                            </a>
                            <button onclick="swal()" class="btn btn-danger" type="submit">borrar</button>
                            <form id="adDestroy" action="{{ route('ad.destroy', $ad) }}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h2>{{ __('Uyy.. parece que no hay nada') }}</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-success">{{ __('Vende tu primer objeto') }}</a>
                    {{ __('o') }} <a href="{{ route('home') }}"
                        class="btn btn-primary">{{ __('Vuelve a la home') }}</a>
                </div>
            @endforelse
            {{ $ads->links() }}
        </div>
    </div>
    </div>
    <x-slot:script>
        <script>
            console.log('funciona!')

            function swal() {
                Swal.fire({
                    title: '¿Seguro que quieres eliminarlo?',
                    showDenyButton: true,
                    /* showCancelButton: true, */
                    confirmButtonText: 'borrar',
                    denyButtonText: `cancelar`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        let form = document.querySelector('#adDestroy');
                        form.submit();
                    } else if (result.isDenied) {
                        Swal.fire('anuncio no eliminado, no ha pasado ná', '', 'info')
                    }
                })
            }
        </script>
        </x-slot>
</x-layout>
