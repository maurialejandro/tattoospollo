@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                
                <div class="card-header ">
                    <ul class="nav nav-pills nav-fill">
                      <li class="nav-item">
                        <a class="text-secondary active"><h4>{{ __('Pinturas') }}</h4></a>
                      </li>
                      <li class="nav nav-pills nav-fill" >
                      <a class="text-white" href="{{route('createPintura')}}">  
                      <button type="button" class="btn btn-outline-dark">Subir Pintura</button></a>
                      </li>  
                    </ul>
                </div>
                    
                <div class="card-body">
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                    {{ __('') }}
                    @foreach($pinturas as $pintura)
                    <div class="card mb-3" style="max-width: 540px;">
                      <div class="row no-gutters">
                            <div class="col-md-4">
                                 <img src="{{$pintura->img}}" class="card-img" alt="...">
                             </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title">{{$pintura->title}}</h5>
                            <p class="card-text">{{$pintura->description}}</p>
                            <p class="card-text"><small class="text-muted">$ {{$pintura->price}}</small></p>
                            <a class="text-white" href="{{ route('editar-pintura',[$pintura->id])}}">
                                <button type="button" class="btn btn-outline-success">Actualizar</button>
                            </a>
                                                                
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalPintura{{$pintura->id}}">Eliminar</button>
                        
                                <!-- Modal -->
                                <div class="modal fade" id="modalPintura{{$pintura->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Estas seguro que quieres eliminar la Pintura: </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <h5 class="modal-title" id="exampleModalLabel"> {{$pintura->title}}</h5>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a class="text-white" href="{{ route('eliminar-pintura',[$pintura->id])}}">
                                          <button type="button" class="btn btn-outline-danger">Eliminar</button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                          </div>
                          
                        </div>
                      </div>
                    </div>
                   
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection