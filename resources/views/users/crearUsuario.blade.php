<h1> Crear Usuario </h1>
<form action="{{ route('storeUsuario') }}" method="post">
    @csrf
    <label for="descripcion">Descripcion</label>
    <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion') }}">
    <br>
    <button type="submit">Enviar Formulario</button>
</form>