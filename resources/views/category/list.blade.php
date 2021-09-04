@extends('layout')
@section('content')

<p class="fs-5 fw-bold text-start">Listado Categorias</p>
<div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
        <a href="{{route('categori.form')}}" class="btn btn-primary">Nueva Categoria</a>
    </div>
</div>
@if(Session::has('message'))
<p class="alert alert-success">
    {{Session::get('message')}}
</p>
@endif

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>            
        </tr>
    </thead>
   <tbody>
       @foreach($categories as $categoria)
       <tr>
           <td>{{$categoria->name}}</td>
           <td>{{$categoria->description}}</td> 
           <td>
           <a href="{{route('categori.form',['id'=>$categoria->id])}}" class="btn btn-warning">Editar</a>
               <a href="{{route('categori.delete', ['id'=>$categoria->id])}}" class="btn btn-danger">Borrar</a>
           </td>
       </tr>
   
           @endforeach
   </tbody> 

</table>
@endsection