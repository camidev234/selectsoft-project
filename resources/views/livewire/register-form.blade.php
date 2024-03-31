<div>
    <link rel="stylesheet" href="{{asset('css/spinner.css')}}">
    <main class="flex">
        @php
        $errors->all()
        @endphp
        <form wire:submit.prevent="storeUser" wire:submit.prevent="storeRequisition">
            @csrf
            <section id="datos_personales">
                <article class="title">
                    <h2>DATOS PERSONALES</h2>
                </article>
                <section class="info">
                    <article>
                        <label for="nombres">Nombres <span class="ast">*</span></label>
                        <input type="text" id="nombres" name="name" value="{{old('name')}}" wire:model.live="name">
                        @error('name')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="apellidos">Apellidos <span class="ast">*</span></label>
                        <input type="text" id="apellidos" name="last_name" value="{{old('last_name')}}" wire:model.live="last_name">
                        @error('last_name')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="fecha_nacimiento">Fecha de nacimiento <span class="ast">*</span></label>
                        <input type="date" id="fecha_nacimiento" name="birthdate" value="{{old('birthdate')}}" wire:model.live="birthdate">
                        @error('birthdate')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="tipo_documento">Tipo de documento <span class="ast">*</span></label>
                        <select id="tipo_documento" name="document_type_id" wire:model.live="document_type_id">
                            @foreach($document_types as $dct)
                            <option value="{{ $dct->id }}" {{ $dct->id == old('document_type_id') ? 'selected' : '' }}>{{ $dct->document_type }}</option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="numero_documento">Numero de documento <span class="ast">*</span></label>
                        <input type="text" id="numero_documento" name="number_document" value="{{old('number_document')}}" wire:model.live="number_document">
                        @error('number_document')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                </section>
            </section>
            <section id="ubicacion">
                <article class="title">
                    <h2>UBICACIÓN</h2>
                </article>
                <section class="info">
                    <article>
                        <label for="pais">Pais</label>
                        <input type="text" value="CO-Colombia" readonly>

                    </article>
                    <article>
                        <label for="departamento">Departamento <span class="ast">*</span></label>
                        <select name="id_department" id="" wire:model.live="id_department" wire:change="handleCityChange($event.target.value)">
                            @foreach($departaments as $dpto)
                            <option value="{{$dpto->id}}" @if($dpto->id == old('id_department')) selected @endif>
                                {{$dpto->departament_name}}
                            </option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="ciudad">Ciudad <span class="ast">*</span></label>
                        <select name="id_city" id="" wire:model.live="id_city">
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">
                                {{$city->city_name}}
                            </option>
                            @endforeach
                        </select>
                    </article>
                    <article>
                        <label for="direccion">Direccion <span class="ast">*</span></label>
                        <input type="text" id="direccion" name="address" value="{{old('address')}}" wire:model.live="address">

                        @error('address')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="telefono">Telefono</label>
                        <input type="text" id="telefono" name="telephone" value="{{old('telephone')}}" wire:model.live="telephone">
                        @error('telephone')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="celular">Celular <span class="ast">*</span></label>
                        <input type="text" id="number" name="phone_number" value="{{old('phone_number')}}" wire:model.live="phone_number">
                        @error('phone_number')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="email">Correo electronico <span class="ast">*</span></label>
                        <input type="email" id="email" name="email" value="{{old('email')}}" wire:model.live="email">
                        @error('email')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                    <article>
                        <label for="email">Contraseña <span class="ast">*</span></label>
                        <input type="password" id="em" name="password" value="{{old('password')}}" wire:model.live="password">
                        @error('password')
                        <span style="color: red;">{{$message}}</span>
                        @enderror
                    </article>
                </section>

            </section>
            <div id="registration-container">
                <button id="register-button" class="sub" onclick="handleRegistration()" wire:clicl="handleClick">Registrarse</button>
                <div id="spinner" class="spinner" style="display: none;">
                    <!-- Aquí colocarías tu spinner -->
                    <div class="loader"></div>
                </div>
            </div>
        </form>
    </main>
    <script>
       function handleRegistration() {
            var errors = @json($errors->all());

            if (errors.length === 0) {
                document.getElementById('register-button').style.display = 'none';
                document.getElementById('spinner').style.display = 'block';
            } else {
                // Si hay errores
            }
        }
    </script>
</div>