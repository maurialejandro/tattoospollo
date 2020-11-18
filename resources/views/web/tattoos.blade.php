@extends('index')
@section('content')
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row justify-content-center">
                    @foreach($tattoos as $tattoo)
                        <div class="col-md-3">
                            </br> </br>
                            <div class="card mb-3  bg-transparent">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$tattoo->title}}</h5>
                                </div>
                                  <img src="{{$tattoo->img}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">{{$tattoo->description}}</p>
                                    <p class="card-text"><small class="text-muted">$ {{$tattoo->price}}</small></p>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>    
                </div>          
            </div>  
@endsection

