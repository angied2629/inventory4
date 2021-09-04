@extends('layout')
@section('title',$categories->id ? 'Actualizar Categoria' : 'Nuevo Categoria')
@section('header',$categories->id ? 'Actualizar Categoria' : 'Nuevo Categoria')
@section('content')


<form action="{{route('categori.save')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$categories->id}}"> 
    <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" value="{{@old('name') ? @old('name'):$categories->name}}">
        </div>
        @error('name')
        <p class="text-danger">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="row mb-3">
        <label for="cost" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="description" value="{{@old('description') ? @old('description'):$categories->description}}">
        </div>
        @error('category')
        <p class="text-danger">
            {{$message}}
        </p>
        @enderror
    </div>
    <

    <div class="row mb-3">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <a href="/category" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>

@endsection