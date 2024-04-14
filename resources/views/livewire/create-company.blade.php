<div>
    <main class="container">

        <section class="viaCompany">
            <h1>Vincularse a una empresa</h1>
            <br>
            <a href="{{route('company.index')}}">Ver empresas</a>
        </section><br>
        <section class="text">
            <h2>Crear empresa</h2><br>
        </section>
        <form wire:submit.prevent="storeCompany">
            @csrf
            <label for="">Nit:</label><br>
            <input type="text" name="nit" placeholder="nit" value="{{old('nit')}}" wire:model.live="nit"><br>
            @error('nit')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Razon Social: </label><br>
            <input type="text" name="business_name" placeholder="Razon social" value="{{old('business_name')}}" wire:model.live="business_name"><br>
            @error('business_name')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Telefono</label><br>
            <input type="text" placeholder="telefono" name="phone" value="{{old('phone')}}" wire:model.live="phone"><br>
            @error('phone')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Pais</label><br>
            <select name="country_id" id="" wire:model.live="departament_id" wire:change="handleCityChange($event.target.value)">
                @foreach($departaments as $departament)
                <option value="{{$departament->id}}">{{$departament->departament_name}}</option>
                @endforeach
            </select><br>
            <label for="">Ciudad</label><br>
            <select name="city_id" id="" wire:model.live="city_id">
                @foreach($cities as $city)
                <option value="{{$city->id}}">{{$city->city_name}}</option>
                @endforeach
            </select><br>
            <label for="">Correo Electronico: </label><br>
            <input type="email" name="email" id="" placeholder="email" value="{{old('email')}}" wire:model.live="email"><br>
            @error('email')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <label for="">Direccion: </label><br>
            <input type="text" name="address" placeholder="direccion" value="{{old('address')}}" wire:model.live="address"><br>
            @error('address')
            <span style="color: red;">{{$message}}</span><br>
            @enderror
            <input type="submit" value="Crear empresa">
        </form>
    </main>
</div>