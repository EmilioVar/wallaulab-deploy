<x-layout>
    <x-slot name='title'>Wallaulab - {{ $category->name }}</x-slot>
    <h1>Bienvenido a Wallaulab</h1>

    <section class="container my-3">
        <h1>{{ __('Anuncios por categría') }}: {{ $category->name }}</h1>
        <div class="row">
            @forelse($ads as $ad)
            <x-card-ad :ad="$ad" :loop="$loop"/>
            @empty
                <div class="col-12">
                    <h2>{{ __('Uyy... parece que no hay nada de esta categoría...') }}</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-success">{{ __('Vende tu primer objeto') }}</a>
                    {{ __('o') }} <a href="{{ route('home') }}"
                        class="btn btn-primary">{{ __('Vuelve a la home') }}</a>
                </div>
            @endforelse
            {{ $ads->links() }}
    </section>
</x-layout>
