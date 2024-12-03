<h1> Crear Usuario </h1>
<form action="{{ route('storeUsuario') }}" method="post">
    @csrf
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}">
    <br>
    <button type="submit">Enviar Formulario</button>
</form>