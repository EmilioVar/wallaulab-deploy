<x-layout>
    <x-slot name='title'>Wallaulab - Vende algo</x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar anuncio: {{ $ad->title }}
                    </div>
                    <div class="card-body">
                        <div>
                            @if (session()->has('message'))
                                {{-- <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div> --}}
                                @if (session()->has('message') == 'success')
                                    <script>
                                        console.log('funciona!')
                                        Swal.fire(
                                            '¡Felicidades!',
                                            'Anuncio subido correctamente. <br><br>Para poder mostrarlo al publico el anuncio debe ser aceptado por un revisor. En este demo vamos a simular que fueras revisor. Para que puedas ser revisor, tienes un botón bajo el formulario que pone solicitar ser revisor. Haz click y continua los pasos siguientes 🚀',
                                            'success'
                                        )
                                    </script>
                                @else
                                    <script>
                                        console.log('no funciona!')
                                        Swal.fire(
                                            'Fatal error!',
                                            'El anuncio no se ha podido cargar',
                                            'error'
                                        )
                                    </script>
                                @endif
                            @endif
                            <h1>{{ __('Editar Anuncio') }}</h1>
                            <p class="alert alert-warning"><i class="bi bi-exclamation-triangle-fill"></i> Pagina de
                                muestra, ¡no introducir datos reales!</p>
                            <div>
                                <ul class="alert alert-info">
                                    <p>Características:</p>
                                    <li>Validación de datos dinámica durante la introducción de datos</li>
                                    <li>No refresca la página mediante la tecnología de livewire</li>
                                    <li>Los anuncios subidos no se muestran al público hasta que un revisor los apruebe
                                    </li>
                            </div>
                            <form method="post" action="{{ route('ads.update', $ad) }}" enctype="multipart/form">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('Título') }}</label>
                                    <input name="title" type="text" value="{{ $ad->title }}"
                                        class="form-control 
                                @error('title') is-invalid @enderror">
                                    @error('title')
                                        {{ $message }}
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">{{ __('Categoría') }}</label>
                                    <select name="category" class="form-control">
                                        <option value="{{ $ad->category }}" @error('category') is-invalid @enderror>
                                            {{ $ad->category->name }}
                                        </option>
                                        @error('category')
                                            {{ $message }}
                                        @enderror
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">{{ __('Precio') }}</label>
                                    <input name="price" value="{{ $ad->price }}" type="number"
                                        class="form-control 
                                @error('price') is-invalid @enderror">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="body" class="form-label">{{ __('Descripción') }}</label>
                                    <textarea name="body" cols="30" rows="15"
                                        class="form-control 
                                @error('body') is-invalid @enderror">{{ $ad->body }}</textarea>
                                    @error('body')
                                        {{ $message }}
                                    @enderror
                                    </textarea>
                                </div>
                                <!-- Image Add -->

                                @foreach ($ad->images as $image)
                                    <img src="{{ $image->getUrl(400, 300) }}" class="d-block w-100" alt="...">
                                @endforeach
                        </div>
                        
                        <!-- button -->
                        <div class="container d-flex justify-content-center my-3">
                            <button id="adCreate" type="submit" class="box-icon btn btn-info">{{ __('Actualizar') }}
                                <box-icon type='solid' name='save'></box-icon>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</x-layout>
