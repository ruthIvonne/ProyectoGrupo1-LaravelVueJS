<!-- resources/views/Cursos/index.blade.php -->

@extends('layouts.app')

@section('content')

    <div id="app">
        <!-- componente Vue -->
        <cursoslist :cursos="{{ $cursos->toJson() }}">  </cursoslist>
        
      
    </div>
    @vite('resources/js/example.js') <!--  archivo JS -->


@endsection

<script>
    window.rutas = {
      toggleEstado: @json(route('Cursos.toggleEstado', ['id' => ':id'])),
      edit: @json(route('Cursos.edit', ['id' => ':id']))
    };
  </script>
  
