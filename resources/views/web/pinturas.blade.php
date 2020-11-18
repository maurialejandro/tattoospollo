@extends('index')
@section('content')
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row justify-content-center">
                    @foreach($pinturas as $pintura)
                        <div class="col-md-3">
                            </br> </br>
                            <div class="card mb-3 bg-transparent">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$pintura->title}}</h5>
                                </div>
                                  <img src="{{$pintura->img}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">{{$pintura->description}}</p>
                                    <p class="card-text"><small class="text-dark">$ {{$pintura->price}}</small></p>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>    
                </div>          
            </div>  
@endsection


