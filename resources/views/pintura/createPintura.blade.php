@extends('layouts.app')
@section('content')

    
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card"> 
            <div class="alert alert- ">Subir Pintura Nueva</div>
            <div class="card-body"> 
                <form id="pintura-form" enctype="multipart/form-data" action="{{ route('guardar-pintura')}}" method="POST" >
                {!! csrf_field() !!}
                <div class="row justify-content-center">        
                    <div class="card" style="width: 18rem;">
                            @if($errors->any())    
                            <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>

                            @endif
                           
                                <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <label Class="list-group-item flex-center">
                                    <img src="../logo.png" class="card-img-top" alt="Imagen:">
                                       
                                    <input type="file" id="image" name="image"/>
                                    </label>
                                </ul> 

                                <ul class="list-group list-group-flush">
                                    <label Class="list-group-item flex-center">Titulo:
                                        <input type="text" id="title" name="title" value="{{old('title')}}"/>               
                                    </label>
                                </ul>
                                
                                <ul class="list-group list-group-flush">
                                    <label Class="list-group-item flex-center">Descripción:
                                       <textarea type="text" id="description" name="description" >{{old('description')}}</textarea>
                                    </label>
                                </ul>
                                <ul class="list-group list-group-flush">
                                    <label Class="list-group-item flex-center">Precio:
                                        <input type="text" id="price" name="price" value="{{old('price')}}" />
                                    </label>
                                </ul>
                            </div>
                            <div class="card-body">
                            <button  class="btn btn-outline-dark btn-lg btn-block" type="submit">Guardar</button>
                            </div>
                            </div>
                </div>  
                </form> 
            </div>
        
        </div>
    </div>
</div>    
@endsection