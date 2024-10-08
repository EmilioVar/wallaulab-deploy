<x-layout>
    <x-slot name="title">Wallaulab - Register</x-slot>
    <!-- ======= REGISTER ======= -->
    <div class="container-fluid bg-accent">
        <div class="row mb-5 pb-5">
            <div class="col-12">
                <div class="d-flex flex-column align-items-center ">
                    <div class="form-content w-50 justify-content-center mb-5 pb-5">
                        <p class="alert alert-warning my-2"><i class="bi bi-exclamation-triangle-fill"></i> Esta web es
                            una demo, <span class="fw-bold">¡no introducir datos reales!</p>
                        <!--FORM TITLE -->
                        <div class="section-title">
                            <h2 class="form-title space-around">{{ __('Crear tu cuenta') }}r
                            </h2>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <!--FORM FIELDS -->
                        <form action="./register" method="POST" role="form" class="php-email-form" enctype="multipart/form-data">
                            @csrf
                            <!-- userPicture -->
                            <div class="form-field-edit form-field space-around my-2">
                                <label for="avatar">Imagen de perfil</label>
                                <input type="file" name="avatar" id="avatar"
                                    class="form-control forms_field-input">
                            </div>
                            <!--Name -->
                            <div class="form-field-edit form-field space-around my-2">
                                <input type="text" name="name" id="name"
                                    class="form-control forms_field-input" placeholder="{{ __('Tu nombre') }}"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            </div>
                            <!--Email -->
                            <div class="form-field-edit form-field space-around my-2">
                                <input type="email" name="email" id="email"
                                    class="form-control forms_field-input" placeholder="{{ __('Tu correo') }}"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            </div>
                            <!--Password -->
                            <div class="form-field-edit form-field space-around my-2">
                                <input type="password" name="password" id="password"
                                    class="form-control forms_field-input" placeholder="{{ __('Tu contraseña') }}">
                            </div>
                            <!--Password Confirmation -->
                            <div class="form-field-edit form-field space-around my-2">
                                <input type="password" name="password_confirmation" id="password"
                                    class="form-control forms_field-input"
                                    placeholder="{{ __('Confirma Contraseña') }}">
                            </div>
                            <!--Button-Register-->
                            <div class="d-flex justify-content-center">
                                <button type="submit"
                                    class=" btn btn-primary form-button-edit text-center space-around my-2">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </section>
</x-layout>
